<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patrons;
use App\patron_information;
use App\logs;
use App\Fines;
use App\Loans;
use App\Copies;
use Carbon\Carbon;
class ReportController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = ['title'=> 'Vivlio | Report', 'active' => 'report', 'user_info' => $this->get_user_info()];
        return view('report.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function inventory()
    {
        $data = ['title'=> 'Vivlio | Inventory (Report)', 'active' => 'report', 'user_info' => $this->get_user_info()];
        return view('report.inventory.index', compact('data'));
    }
    public function lmu()
    {
        $data = ['title'=> 'Vivlio | LMU (Report)', 'active' => 'report', 'user_info' => $this->get_user_info()];
        return view('report.lmu.index', compact('data'));
    }
    public function patron()
    {
        $data = ['title'=> 'Vivlio | Patron (Report)', 'active' => 'report', 'user_info' => $this->get_user_info()];
        return view('report.patron.index', compact('data'));
    }
    public function fines()
    {
        $data = ['title'=> 'Vivlio | Fines (Report)', 'active' => 'report', 'user_info' => $this->get_user_info()];
        return view('report.fines.index', compact('data'));
    }
    public function acquisition()
    {
        $data = ['title'=> 'Vivlio | Acquisition (Report)', 'active' => 'report', 'user_info' => $this->get_user_info()];
        return view('report.acquisition.index', compact('data'));
    }
    public function borrow()
    {
        $data = ['title'=> 'Vivlio | Borrow (Report)', 'active' => 'report', 'user_info' => $this->get_user_info()];
        return view('report.borrow.index', compact('data'));
    }
    public function fetch_data_by_date(Request $request){
        $fetch = [];
        if($request->input('category') == 'lmu'){
              if(!empty($request->input('mnt'))){
                  $copy = Copies::whereYear('created_at','=',$request->input('yr'))->whereMonth('created_at','=',$request->input('mnt'))->get();
                }else{
                    $copy = Copies::whereYear('created_at','=',$request->input('yr'))->get();
                }
              foreach ($copy as $key => $value) {
                    $d_info  = self::fetchCopiesByCatalogueID($value->catalogue_id);
                    $fetch[] = ['acc_num'=>$value->acc_num,'barcode'=>$value->barcode,'title'=>$d_info['title'],'totalLoan'=>count(Loans::where(['acc_num'=>$value->acc_num])->get())];
              }
              return json_encode($fetch);
        }else if ($request->input('category') == 'patron'){
            if(!empty($request->input('mnt'))){
                  $patron = Patrons::on()->with(['patron_information'])->whereYear('created_at','=',$request->input('yr'))->whereMonth('created_at','=',$request->input('mnt'))->get();
                }else{
                    $patron = Patrons::on()->with(['patron_information'])->whereYear('created_at','=',$request->input('yr'))->get();
                }
              foreach ($patron as $key => $value) {
                    foreach ($value->patron_information as $key => $value_info) {
                        $fetch[] = ['id'=>$value_info->student_id, 'name'=>strtoupper($value_info->full_name), 'course'=>$value_info->course, 'visit'=>self::count_who_visit(1,$value_info->patron_id), 'borrow' => self::fetchBorrowCount($value_info->patron_id), 'fines' => self::patronTotalFines($value_info->patron_id)];
                    }
              }
              return json_encode($fetch);
        }else if ($request->input('category') == 'fines'){
            if(!empty($request->input('mnt'))){
                  $patrons = Fines::whereYear('created_at','=',$request->input('yr'))->whereMonth('created_at','=',$request->input('mnt'))->get();
                }else{
                    $patrons = Fines::whereYear('created_at','=',$request->input('yr'))->get();
                }
               foreach ($patrons as $value) {
                    foreach (Patrons::on()->with(['patron_information'])->where(['patron_id'=>$value->patron_id])->get() as $p_v) {
                        $fetch[] = ['date'=> ''.date('F j, Y', strtotime($value->updated_at)),'patron'=>strtoupper($p_v['patron_information'][0]->full_name),'amount'=>$value->amount,'status'=>$value->status,'remarks'=>$value->remarks];
                    }
                }
              return json_encode($fetch);
        }else if ($request->input('category') == 'borrow'){
            if(!empty($request->input('mnt'))){
                  $borrows = Loans::whereYear('created_at','=',$request->input('yr'))->whereMonth('created_at','=',$request->input('mnt'))->get();
                }else{
                    $borrows = Loans::whereYear('created_at','=',$request->input('yr'))->get();
                }
              foreach ($borrows as $key => $value) {
                $fetch[] = ['patron_id'=>$value->patron_id,'acc_num'=>$value->acc_num,'due_date'=>date('M-d-Y', strtotime($value->due_date)),'returned'=>date('M-d-Y', strtotime($value->returned_date)),'loaned'=>date('M-d-Y', strtotime($value->loaned_date))];
              }
              return json_encode($fetch);
        }
        
    }
    public function fetch_data_by_range(Request $request){
        $fetch = [];
        if($request->input('category') == 'lmu'){
            $copy = Copies::whereBetween('created_at',[date('Y-m-d H:i:s', strtotime($request->start)),date('Y-m-d H:i:s', strtotime($request->end))])->get();
            foreach ($copy as $key => $value) {
                    $d_info  = self::fetchCopiesByCatalogueID($value->catalogue_id);
                    $fetch[] = ['acc_num'=>$value->acc_num,'barcode'=>$value->barcode,'title'=>$d_info['title'],'totalLoan'=>count(Loans::where(['acc_num'=>$value->acc_num])->get())];
            }
            return json_encode($fetch);
        }else if ($request->input('category') == 'patron'){
              $patron = Patrons::on()->with(['patron_information'])->whereBetween('created_at',[date('Y-m-d H:i:s', strtotime($request->start)),date('Y-m-d H:i:s', strtotime($request->end))])->get();
              foreach ($patron as $key => $value) {
                    foreach ($value->patron_information as $key => $value_info) {
                        $fetch[] = ['id'=>$value_info->student_id, 'name'=>strtoupper($value_info->full_name), 'course'=>$value_info->course, 'visit'=>self::count_who_visit(1,$value_info->patron_id), 'borrow' => self::fetchBorrowCount($value_info->patron_id), 'fines' => self::patronTotalFines($value_info->patron_id)];
                    }
              }
              return json_encode($fetch);
        }else if ($request->input('category') == 'fines'){
              $patrons = Fines::whereBetween('created_at',[date('Y-m-d H:i:s', strtotime($request->start)),date('Y-m-d H:i:s', strtotime($request->end))])->get();
              foreach ($patrons as $value) {
                    foreach (Patrons::on()->with(['patron_information'])->where(['patron_id'=>$value->patron_id])->get() as $p_v) {
                        $fetch[] = ['date'=> ''.date('F j, Y', strtotime($value->updated_at)),'patron'=>strtoupper($p_v['patron_information'][0]->full_name),'amount'=>$value->amount,'status'=>$value->status,'remarks'=>$value->remarks];
                    }
              }
              return json_encode($fetch);
        }
        else if ($request->input('category') == 'borrow'){
              $borrows = Loans::whereBetween('created_at',[date('Y-m-d H:i:s', strtotime($request->start)),date('Y-m-d H:i:s', strtotime($request->end))])->get();
              foreach ($borrows as $key => $value) {
                $fetch[] = ['patron_id'=>$value->patron_id,'acc_num'=>$value->acc_num,'due_date'=>date('M-d-Y', strtotime($value->due_date)),'returned'=>date('M-d-Y', strtotime($value->returned_date)),'loaned'=>date('M-d-Y', strtotime($value->loaned_date))];
              }
              return json_encode($fetch);
        }
    }
    public function fetch(Request $request, $type)
    {
       if($type == 'patron'){
            exit (self::fetch_patron());
       }else if($type == 'lmu'){
            exit(self::fetch_lmu());
       }else if($type == 'fines'){
           exit(self::fetch_fines());
       }else if($type == 'borrow'){
           exit(self::fetch_borrow());
       }
       return 0;
    }
    public function getAverage($totalcount){
      $total = 0;
      foreach (Patrons::on()->with(['logs'])->get() as $key => $value) {
          $total += self::count_who_visit(1,$value->patron_id);
        }
        return ($total);
    }
    public function fetch_lmu(){
       foreach (Copies::get() as $key => $value) {
           $d_info  = self::fetchCopiesByCatalogueID($value->catalogue_id);
           $fetch[] = ['acc_num'=>$value->acc_num,'barcode'=>$value->barcode,'title'=>$d_info['title'],'totalLoan'=>count(Loans::where(['acc_num'=>$value->acc_num])->get())];
       }
       return json_encode($fetch);
    }
    public function fetch_fines(){
        foreach (Fines::get() as $value) {
            foreach (Patrons::on()->with(['patron_information'])->where(['patron_id'=>$value->patron_id])->get() as $p_v) {
                $fetch[] = ['date'=> ''.date('F j, Y', strtotime($value->updated_at)),'patron'=>strtoupper($p_v['patron_information'][0]->full_name),'amount'=>$value->amount,'status'=>$value->status,'remarks'=>$value->remarks];
            }
        }
        return json_encode($fetch);
    }
    public function fetch_patron(){
        foreach (Patrons::on()->with(['patron_information'])->get() as $key => $value) {
            foreach ($value->patron_information as $key => $value_info) {
                $fetch[] = ['id'=>$value_info->student_id, 'name'=>strtoupper($value_info->full_name), 'course'=>$value_info->course, 'visit'=>self::count_who_visit(1,$value_info->patron_id), 'borrow' => self::fetchBorrowCount($value_info->patron_id), 'fines' => self::patronTotalFines($value_info->patron_id)];
            }
        }
        return json_encode($fetch);
    }
    public function fetch_borrow(){
        $fetch = [];
        foreach (Loans::get() as $key => $value) {
           $fetch[] = ['patron_id'=>$value->patron_id,'acc_num'=>$value->acc_num,'due_date'=>date('M-d-Y', strtotime($value->due_date)),'returned'=>date('M-d-Y', strtotime($value->returned_date)),'loaned'=>date('M-d-Y', strtotime($value->loaned_date))];
        }
        return json_encode($fetch);
    }
    public function fetch_inventory(Request $request){
        return 0;
    }
    public function count_who_visit($cat,$id){
        $data = \DB::table('logs')->select('created_at')->where('cat_id','=',$cat)->where('patron_ids','=',$id)->get();
        return count($data).'';
    }
    public function fetchBorrowCount($patron_id){
        $loans = new Loans;
        return $loans->count(['patron_id'=>$patron_id]);
    }
    public function patronTotalFines($patron_id){
        $fines = new Fines;
        return $fines->total($patron_id);   
    }
}
