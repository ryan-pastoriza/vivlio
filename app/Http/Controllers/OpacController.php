<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\FieldValue;
use App\CatalogueRecord;
use App\patrons;
use App\Loans;
use App\Copies;
use App\Reserves;
use Carbon\Carbon;

class OpacController extends Controller
{
    public $is_loggin = false;
    public function __construct(Request $request)
	{
       
	}
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ['title'=> 'Vivlio | '.ucfirst("OPAC"), 'name'=> 'Online Public Access Catalog', 'category'=>'Online Public Access Catalog','is_login' => $request->session()->has('studentSession')];
        return view('opac.index', compact('data'));
        
    }
    public function loadItemsList(Request $request){
        $start = microtime(true);
        $q = $request->input('q');
        if($q == null){
            return redirect('opac');
        }
        $data = ['title'=> 'Vivlio | '.ucfirst("OPAC"), 'name'=> 'Online Public Access Catalog', 'category'=>'Online Public Access Catalog', 'q' => $q, 'is_login' => $request->session()->has('studentSession') ];
        return view('opac.itemListView', compact('data'));
    }
    public function loginStudent(Request $request){
        $arr = [];

        $patronInfo = Patrons::join('patron_information','patrons.patron_id','=','patron_information.patron_id')->where('barcode', $request->input('student_barcode'))->get()->first();
        $arr['patronInfo'] = $patronInfo;

        $request->session()->put('studentSession',$arr);
        // $data = ['is_login' => $request->session()->has('studentSession'), 'studentSession' => $request->session()->get('studentSession') ];
        // return view('opac.studentlogin', compact('data'));
        return $request->session()->get('studentSession');
    }
    public function logoutStudent(Request $request){
        $request->session()->forget('studentSession');
        $data = ['is_login' => $request->session()->has('studentSession')];
        return view('opac.studentlogin', compact('data'));
    }
   
    public function viewBorrowsReserves(Request $request){
        $isLogin = $request->session()->has('studentSession');
        $arr = [];
        if($isLogin){
            $patronInfo = $request->session()->get('studentSession')['patronInfo'];
            $arr['patronInfo'] = $patronInfo;

            $patronBorrows = Loans::join('copies','loans.acc_num','=','copies.acc_num')->join('field_value','copies.catalogue_id','=','field_value.catalogue_id')->where('loans.returned',0)->where('loans.patron_id',$request->session()->get('studentSession')['patronInfo']['patron_id'])->get()->toArray();
            $borrows = [];
            foreach ($patronBorrows as $field_value) {
                $vals = [];
                foreach (explode('_', $field_value['value']) as $value) {
                    $vals[substr($value, 0, 1)] = substr($value, 1);
                }
                $borrows[$field_value['acc_num']]['loaned_date'] = $field_value['loaned_date'];
                $borrows[$field_value['acc_num']]['due_date'] = $field_value['due_date'];
                $borrows[$field_value['acc_num']]['catalogue_id'] = $field_value['catalogue_id'];
                if($field_value['id'] == 14){
                    $borrows[$field_value['acc_num']]['isbn'] = $vals['a'];
                }if($field_value['id'] == 15){
                    $borrows[$field_value['acc_num']]['author'] = $vals['a'];
                }if($field_value['id'] == 16){
                    $borrows[$field_value['acc_num']]['title'] = $vals['a'];
                }if($field_value['id'] == 17){
                    $borrows[$field_value['acc_num']]['edition'] = $vals['a'];
                }if($field_value['id'] == 18){
                    $borrows[$field_value['acc_num']]['place'] = $vals['a'];
                }if($field_value['id'] == 16){
                    $borrows[$field_value['acc_num']]['no-of-page'] = $vals['a'];
                }if($field_value['id'] == 29){
                    $borrows[$field_value['acc_num']]['volume'] = $vals['v'];
                }
            }
            $arr['patronBorrows'] = $borrows;

            $patronReserves = Reserves::join('field_value','reserves.catalogue_record_id','=','field_value.catalogue_id')->where('patron_id',$request->session()->get('studentSession')['patronInfo']['patron_id'])->where('status','pending')->where('cancel_date',null)->get()->toArray();
            $reserves = [];
            $catalog_ids = [];
            foreach ($patronReserves as $field_value) {
                $vals = [];
                foreach (explode('_', $field_value['value']) as $value) {
                    $vals[substr($value, 0, 1)] = substr($value, 1);
                }
                $reserves[$field_value['reserve_id']]['catalogue_id'] = $field_value['catalogue_id'];
                $reserves[$field_value['reserve_id']]['copies_available'] = Copies::where('status','available')->where('catalogue_id', $field_value['catalogue_id'])->count();
                if(!in_array($field_value['catalogue_id'], $catalog_ids)){
                    array_push($catalog_ids, $field_value['catalogue_id'] );
                }
                if($field_value['id'] == 14){
                    $reserves[$field_value['reserve_id']]['isbn'] = $vals['a'];
                }if($field_value['id'] == 15){
                    $reserves[$field_value['reserve_id']]['author'] = $vals['a'];
                }if($field_value['id'] == 16){
                    $reserves[$field_value['reserve_id']]['title'] = $vals['a'];
                }if($field_value['id'] == 17){
                    $reserves[$field_value['reserve_id']]['edition'] = $vals['a'];
                }if($field_value['id'] == 18){
                    $reserves[$field_value['reserve_id']]['place'] = $vals['a'];
                // }if($field_value['id'] == 16){
                    // $reserves[$field_value['reserve_id']]['no-of-page'] = $vals['a'];
                }if($field_value['id'] == 29){
                    $reserves[$field_value['reserve_id']]['volume'] = $vals['v'];
                }
                
            }
            $arr['patronReservesCatalogueId'] = $catalog_ids;
            $arr['patronReserves'] = $reserves;

            $request->session()->put('studentSession',$arr);

        }
        $data = ['is_login' => $isLogin, 'studentSession' => $request->session()->get('studentSession') ];
        return view('opac.studentlogin', compact('data'));
    }
    public function reserveBook(Request $request){
        $catID = $request->input('catalogue_id');
        $patID = $request->input('patron_id');
        return $reserves = Reserves::create([
            'patron_id' => $patID,
            'catalogue_record_id' => $catID,
            'remarks' => 'OPAC Reserved',
            'priority' => 2,
            'reserved_date' => Carbon::now(),
            'status' => 'pending'
        ]);
        return 'error';
    }
    public function cancelReserve(Request $request){
        $reserve = Reserves::find($request->input('reserve_id'));
        $reserve->status = 'canceled';
        $reserve->cancel_date = Carbon::now();
        $reserve->save();
        return $reserve;
    }
    public function loadSearches(Request $request){
        $start = microtime(true);
        $q = $request->input('q');
        $search = FieldValue::where("value","REGEXP","_.[\s\S]*".$q."[\s\S]*")->groupBy('catalogue_id')->get(['catalogue_id']);
        $result = [];
        foreach( $search as $catalogue_id){
            $callnum =CatalogueRecord::where('catalogue_id',$catalogue_id->catalogue_id)->get(['call_num'])->first()->call_num;
            $title = substr(explode('_',FieldValue::where('id',16)->where('catalogue_id',$catalogue_id->catalogue_id)->get(['value']))[1],1);
            $edition = substr(explode('_',FieldValue::where('id',17)->where('catalogue_id',$catalogue_id->catalogue_id)->get(['value'])->first()->value)[1],1);
            $isbn = substr(explode('_',FieldValue::where('id',14)->where('catalogue_id',$catalogue_id->catalogue_id)->get(['value'])->first()->value)[1],1);
            $copiesNum = Copies::where('status','available')->where('catalogue_id', $catalogue_id->catalogue_id)->count();
            $copiesTotal = Copies::where('catalogue_id', $catalogue_id->catalogue_id)->count();
            array_push($result,['title' => $title, 'call_num'=> $callnum, 'edition' => $edition, 'isbn' => $isbn, 'copies_available' => $copiesNum, 'copies_total' => $copiesTotal, 'catalogue_id' => $catalogue_id->catalogue_id]);
        }
        $end =  microtime(true);

        $time_taken = $end - $start;
        // var_dump($request->session()->get('studentSession'));
        $data = ['is_login' => $request->session()->has('studentSession'), 'studentSession' => $request->session()->get('studentSession'), 'results' => $result, 'q' => $q, 'time_taken' => $time_taken ];
        return view('opac.searchResult', compact('data'));
    }
}
