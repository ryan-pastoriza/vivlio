<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use App\User_profile;
use Auth;

/*fetch data of book ...etc from barcode*/
use App\Copies;
use App\CatalogueRecord;
use App\FieldValue;
use App\marc_subfield_structure;
use App\patrons;
use App\LoanRules;
use App\Loans;
use App\Reserves;

class Controller extends BaseController
{   
    
    public $now;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {   
        $this->now = Carbon::now();
        $this->middleware('patronExpiration');
    }
    public function get_user_info(){
       return User_profile::find(Auth::user()['attributes']['user_id'])->toArray();
    }
    /*CHECK SEMESTER*/
    public function checkSemester()
    {
        return (Carbon::create()->between(Carbon::create(Carbon::now()->year,6,1),Carbon::create(Carbon::now()->year,10,30)) == true)? '1':
               ((Carbon::create()->between(Carbon::create(Carbon::now()->year,10,1),Carbon::create((Carbon::now()->year+1),3,30)) == true)? '2':'3');
    }
    /*GENERATE RANDOM STRING*/
    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return strtoupper($randomString);
    }
    public function getUnavailableItem(){
        $copy = new Copies();
        return $copy->where(['status'=>'unavailable'])->get(['acc_num'])->toArray();
    }
    public function loanRules($patron_id){
        $p = Patrons::find($patron_id);
        $l = LoanRules::find($p->patron_category_id);
        return ['fines'=>$l->fine, 'max_loan_qty'=> $l->max_loan_qty, 'loan_length'=>$l->loan_length];
    }
    public function getFines($patron_id){
        $rules = self::loanRules($patron_id);
        $loans = Loans::where('patron_id',$patron_id)->where('returned',0)->where('due_date','<',Carbon::now())->get(['due_date'])->toArray();
        $finesDiff = Carbon::now();
        $total = 0;
        if(count($loans) > 0){   
          foreach ($loans as $key => $value) {
            $due = Carbon::parse($value['due_date']);
            $total += ($rules['fines'] * ($due->diffInDays(Carbon::now())));
          }
        }
        return number_format($total,2,'.',',');
    }
    public function checkReservedItem(){
        $reserve  = new Reserves();
        dd($reserve->getAllReservedItem());
    }
    public function fetchCopiesByCatalogueID($catalogue_id){
        $data = [];
        $field_value = new FieldValue;
        $counter = 0;
        $field_datas =  $field_value->where('catalogue_id',$catalogue_id)->get()->toArray(); 
        $arr = array('isbn','author','title','edition','place','no-of-page','volume');
        foreach ($field_datas as $key =>  $field_data) {
            $val = explode('_', $field_data['value']);
            $vals = [];
            foreach ($val as $v) {
                $vals[substr($v, 0, 1)] = substr($v, 1);
            }
            // echo($field_data['id']);
            if($field_data['id'] == 14){
                $data['isbn'] = $vals['a'];
            }if($field_data['id'] == 15){
                $data['author'] = $vals['a'];
            }if($field_data['id'] == 16){
                $data['title'] = $vals['a'];
            }if($field_data['id'] == 17){
                $data['edition'] = $vals['a'];
            }if($field_data['id'] == 18){
                $data['place'] = $vals['a'];
            }if($field_data['id'] == 16){
                $data['no-of-page'] = $vals['a'];
            }if($field_data['id'] == 29){
                $data['volume'] = $vals['v'];
            }
            // array_splice($val, 0, 1);

            // $substr = function($el) {
            //     return strtoupper(substr($el, 1, strlen($el)));
            // };
            // $newVal = array_map($substr, $val)[0];
            // $data[$arr[$counter]] = $newVal;
            // $counter++;
       }  
       return $data;
    }
    public function getQueNum($patron_id,$catalogue_id){
        $counter = 0;
        $res = new Reserves;
        foreach ($res->getReserveItemByCatalogueID($patron_id,$catalogue_id) as $value) {
            if($value['patron_id'] == $patron_id){
               return $counter;               
            }else{
                ++$counter;
            }
        }
        return $counter;
    }
    public function checkCatalogueIfAvailable($catalogue_id){
        if(count(Copies::where(['catalogue_id' =>$catalogue_id])->where(['status'=>'available'])->get()) > 0){
            return true;
        }
        return false;
    }
    
    public function fetchCopies($barcode,$list){
        /*$this->fetchCopies(123456711);*/
        if(!empty($barcode)){
            $data = [];
            $copy = new Copies;
            $items = $copy->fetchByKey('barcode',$barcode);
            $field_value = new FieldValue;
            $counter = 0;
            foreach ($items as  $item) {
               $data['acc_num'] = $item->acc_num;
               $data['barcode'] = $item->barcode;
               $data['status'] = $item->status;
               $data['call_num'] = $item->call_num;
               $data['status'] = $item->status;
               $data['in_a_list'] = (empty($list) ? false : (in_array($item->acc_num, $list)) ? true : false);

               $catalogue = CatalogueRecord::find($item->catalogue_id)->toArray();
               $field_datas =  $field_value->where('catalogue_id',$item->catalogue_id)->get()->toArray();  
               foreach ($field_datas as $key =>  $field_data) {
                    $val = explode('_', $field_data['value']);
                    // var_dump($val);
                    
                    $vals = [];
                    foreach ($val as $v) {
                        $vals[substr($v, 0, 1)] = substr($v, 1);
                    }
                    // echo($field_data['id']);
                    if($field_data['id'] == 14){
                        $data['isbn'] = $vals['a'];
                    }if($field_data['id'] == 15){
                        $data['author'] = $vals['a'];
                    }if($field_data['id'] == 16){
                        $data['title'] = $vals['a'];
                    }if($field_data['id'] == 17){
                        $data['edition'] = $vals['a'];
                    }if($field_data['id'] == 18){
                        $data['place'] = $vals['a'];
                    }if($field_data['id'] == 16){
                        $data['no-of-page'] = $vals['a'];
                    }if($field_data['id'] == 29){
                        $data['volume'] = $vals['v'];
                    }

               }
            }
            return $data;
        }
    }
    function ordinal($a) {
        // return English ordinal number
        return $a.substr(date('jS', mktime(0,0,0,1,($a%10==0?9:($a%100>20?$a%10:$a%100)),2000)),-2);
    }
   
}