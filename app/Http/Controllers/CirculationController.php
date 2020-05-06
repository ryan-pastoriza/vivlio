<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use App\SIS\StudentPersonalInfo;
use App\SIS\S_Main_Address;
use App\SIS\Address;
use App\SIS\ProgramList;
use App\SIS\Year;
use App\patron_information;
use App\expiration_history;
use App\PatronCategories;
use App\patrons;
use App\logs;
use App\CatalogueRecord;
use App\Loans;
use App\Copies;
use Carbon\Carbon;
use App\Reserves;
use App\Fines;

use Illuminate\Support\Facades\Storage;
class CirculationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
	{
		$this->middleware('auth');
	}
	
    
    public function index()
    {
        /*STATISTICS CIRCULATION*/
        /*START CARBON */
        $now = Carbon::now();
        /*GET THE DATA IN MONTH*/
        $chart_data = self::get_all_data_by_month($now->month,$now->year,' ');

        /*DATA*/
        $data = ['title'=> 'Vivlio | Circulation', 'active' => 'circulation', 'user_info' => $this->get_user_info(), 'data_day'=> json_encode($chart_data['day_list']),
                /*STATISTICS FOR CIRCULATION*/
                 'statistics_data'=>['data_patron'=>['label'=>'Patrons Created',
                                                    'color'=>'#004040',
                                                    'data'=>json_encode($chart_data['total_patron'])],/*
                                    'data_utilization'=>['label'=>'Utilization',
                                                    'color'=>'#8da9a9',
                                                    'data'=>json_encode($chart_data['total_utilization'])],
                                    'data_borrow'=>['label'=>'Borrow',
                                                    'color'=>'#8080e9',
                                                    'data'=>json_encode($chart_data['total_borrow'])]*/],
                /*STATISTICS (ENTRY)*/
                'statistics_data_entry'=>['library_area'=>['label'=>'Library Entry',
                                                    'color'=>'#B20000',
                                                    'data'=>json_encode($chart_data['library_entry'])],
                                    'multimedia_area'=>['label'=>'Multimedia Entry',
                                                    'color'=>'#004040',
                                                    'data'=>json_encode($chart_data['multimedia_entry'])],
                                    'internet_area'=>['label'=>'Internet Entry',
                                                    'color'=>'#fe6e6b',
                                                    'data'=>json_encode($chart_data['internet_entry'])]]];
        /*RETURN TO PAGE*/
        return view('circulation.index', compact('data'));
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
    /*EDIT*/
    public function edit(Request $request)
    {
       /*CHECK OPTION*/
       if($request->input('_option') == 'update_barcode'){
           /*CHECK IF THE BARCODE IS DUPLICATE*/
           $data = Patrons::where('barcode',$request->input('_barcode'))->get();
           /*GET THE COUNT*/
           if(count($data) == 0){
                /*IF NOT EXIST : SAVE THE BARCODE*/
                $patron  = Patrons::find($request->input('_patron_id'));
                $patron->barcode = $request->input('_barcode');
                $patron->save();
                /*EXIT 1 IF SUCCESS*/
                exit('1');
           }else{
                /*IF ERROR EXIT 2*/
                exit('0');
           }
       }else{
            /*CHECK OPTION*/
            if($request->input('_option') == 'edit_each_info'){
                /*X EDITABLE OPTION : */
                /*CHECK TABLE*/
                if($request->input('_entity') == 'patron_information'){
                    /*GET THE PATRON INFO*/
                    $patron_info = Patron_information::find($request->input('_id'));
                    /*CHECK THE FIELD NAME*/
                    if($request->input('name') == 'patron-full-name'){
                        $patron_info->full_name = $request->input('value');
                    }else{
                        /*CHECK THE FIELD NAME*/
                        if($request->input('name') == 'patron-gender'){
                            $patron_info->gender = $request->input('value');
                        }else{
                            /*CHECK THE FIELD NAME*/ 
                           if($request->input('name') == 'patron-dob'){
                                $patron_info->dob = $request->input('value');
                             }else{
                                 /*CHECK THE FIELD NAME*/
                                if($request->input('name') == 'patron-contact'){
                                    $patron_info->contact_no = $request->input('value');
                                }else{
                                     /*CHECK THE FIELD NAME*/
                                    if($request->input('name') == 'patron-address'){
                                        $patron_info->address = $request->input('value');
                                    }
                                }
                             }
                        }
                    }
                    /*SAVE/UPDATE NEW DATA*/
                    $patron_info->save();
                }
            }else{
                /*EDIT EXPIRATION IF THEY WANT TO EXTEND*/
                if($request->input('name') == 'expiration'){
                    /*CREATE CARBON (TIME)*/
                    $carbon = Carbon::now();
                    $expiration = new Expiration_history;
                    /*FIND AND GET THE TARGET PATRON*/
                     $patron  = Patrons::find($request->input('_id'));
                     /*CHECK SEMESTER*/
                     if(self::checkSemester() == '1'){
                        /*SET EXPIRATION IF SEMESTER IS 1ST*/
                        $patron->expiration =  Carbon::create($carbon->year,10,29);
                        $expiration->expiration_date = Carbon::create($carbon->year,10,29);
                        /*SET EXPIRATION IN PATRON ID*/
                        $expiration->patron_id = $patron->patron_id;
                     }else if(self::checkSemester() == '2'){
                        /*SET EXPIRATION IF SEMESTER IS 2ND*/
                        $patron->expiration = Carbon::create(($carbon->year+1),3,29);
                        $expiration->expiration_date = Carbon::create($carbon->year,10,29);
                        /*SET EXPIRATION IN PATRON ID*/
                        $expiration->patron_id = $patron->patron_id;
                     }else{
                        /*SET EXPIRATION IF SEMESTER IS 1ST*/
                        $patron->expiration =  Carbon::create($carbon->year,10,29);
                        $expiration->expiration_date = Carbon::create($carbon->year,10,29);
                        /*SET EXPIRATION IN PATRON ID*/
                        $expiration->patron_id = $patron->patron_id;
                     }
                    /*UPDATE PATRON*/
                    $patron->save();
                    /*UPDATE EXPIRATION*/
                    $expiration->save();
                    /*EXIT WITH THE NEW TIME OF EXPIRATION*/
                    exit("(date('F j, Y', strtotime($patron->expiration)))");
                }else{
                    if($request->input('_option') == 'borrow_return'){
                        $loan = new Loans;
                        $copy = new Copies;
                        $data  = $loan->on()->where('patron_id',$request->input('_patron_id'))->where('acc_num',$request->input('_acc_num'))->where('returned',0)->get(['loan_id','acc_num']);
                        if(count($data) != 0){
                            foreach ($data as $key => $v) {
                                $loan = $loan->find($v['loan_id']);
                                $loan->returned = 1;
                                $loan->returned_date = Carbon::now();
                                $loan->save();
                                if($copy->turnTo($v['acc_num'],'available'))exit("1");
                            }
                        }
                    }
                }
            }
       }
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
    /*HELPER FUNCTION*/
    /*GET THE COUNT BY YEAR*/
    public function get_total_by_group_year($WHERE_VALUE, $TABLE, $YEAR){
        /*IF TABLE IS PATRON*/
        if($TABLE == 'patrons'){
            /*QUERY*/
            $data = \DB::table($TABLE)
            ->select('created_at', \DB::raw('count(*) as total'))
            ->whereYear('created_at', '=', $YEAR)
            ->groupBy('patron_id')
            ->orderBy('total', 'desc')
            ->get();
            /*COUNT*/
            return count($data);
        }else{
            /*IF TABLE IS LOGS*/
            if($TABLE = 'logs'){
                /*QUERY*/
                $data = \DB::table($TABLE)
                ->select('created_at', \DB::raw('count(*) as total'))
                ->where('cat_id','=',$WHERE_VALUE)
                ->whereYear('created_at', '=', $YEAR)
                ->groupBy('log_id')
                ->orderBy('total', 'desc')
                ->get();
                /*COUNT*/
                return count($data);
            }
        }
     /*EXIT*/
    }
    /*GET DATA/COUNT WITH IN THAT RANGE*/
    public function get_data_in_range($RANGES = 4,Request $request){
        /*CREATE CARBON (TIME)*/
        $now = Carbon::now();
        /*CHECK OPTION IF NULL*/
        if($request->input('option') == ''){
            /*RETURN IF ERROR*/
            exit('error');
        }
        /*CHECK OPTION IF YEAR*/
        if($request->input('option') == 'year'){

            $years = [];
            $counter = 0;
            /*LOOP WITH IN THAT RANGES*/
            for ($year = ($now->year-$RANGES); $year <= $now->year; $year++) { 
                /*FETCH DATA WITHIN THAT RANGES*/
                $years[] = [$counter,$year.''];
                $total_patron_created[] = [$counter,self::get_total_by_group_year('','patrons',$year)];
                /*$total_utilization_created[] = [$counter,rand(1,5)];
                $total_borrow_created[] = [$counter,rand(1,5)];*/
                /*STATISTIC DATA FOR ENTRY*/
                $total_entry_library[] = [$counter,self::get_total_by_group_year('1','logs',$year)];
                $total_entry_multimedia[] = [$counter,self::get_total_by_group_year('2','logs',$year)];
                $total_entry_internet[] = [$counter,self::get_total_by_group_year('3','logs',$year)];
                /*INCREAMENT*/
                $counter++;
            }
            /*DATA*/
            $data = ['title'=> 'Vivlio | Logs', 'active' => 'circulation'
            ,'data_day'=> $years,'statistics_data'=>['data_patron'=>['label'=>'Patrons Created',
                                                'color'=>'#004040',
                                                'data'=>json_encode($total_patron_created)],/*
                                    'data_utilization'=>['label'=>'Utilization',
                                                'color'=>'#B20000',
                                                'data'=>json_encode($total_utilization_created)],
                                    'data_borrow'=>['label'=>'Borrow',
                                                'color'=>'orange',
                                                'data'=>json_encode($total_borrow_created)]*/],
                                    /*STATISTIC ENTRY*/
                                    'statistics_data_entry'=>['library_area'=>['label'=>'Library Entry',
                                                'color'=>'#B20000',
                                                'data'=>json_encode($total_entry_library)],
                                    'multimedia_area'=>['label'=>'Multimedia Entry',
                                                'color'=>'#004040',
                                                'data'=>json_encode($total_entry_multimedia)],
                                    'internet_area'=>['label'=>'Internet Entry',
                                                'color'=>'#fe6e6b',
                                                'data'=>json_encode($total_entry_internet)]],'date'=>'Years'];
                /*RETURN DATA*/
                return $data;
        }else{
            /*CHECK OPTION IF DAY*/
            if($request->input('option') == 'day'){
                /*statistics Circulation*/
                /*FETCH DATA*/
                $chart_data = self::get_all_data_by_month($now->month,$now->year,' ');
                /*DATA*/
                $data = ['title'=> 'Vivlio | Circulation', 'active' => 'circulation', 'user_info' => $this->get_user_info(), 'data_day'=> $chart_data['day_list'],
                         'statistics_data'=>['data_patron'=>['label'=>'Patrons Created',
                                                            'color'=>'#004040',
                                                            'data'=>json_encode($chart_data['total_patron'])],/*
                                            'data_utilization'=>['label'=>'Utilization',
                                                            'color'=>'#8da9a9',
                                                            'data'=>json_encode($chart_data['total_utilization'])],
                                            'data_borrow'=>['label'=>'Borrow',
                                                            'color'=>'#8080e9',
                                                            'data'=>json_encode($chart_data['total_borrow'])]*/],
                                    /*STATISTIC ENTRY*/
                                    'statistics_data_entry'=>[
                                                    'library_area'=>['label'=>'Library Entry',
                                                    'color'=>'#B20000',
                                                    'data'=>json_encode($chart_data['library_entry'])],
                                                    'multimedia_area'=>['label'=>'Multimedia Entry',
                                                                    'color'=>'#004040',
                                                                    'data'=>json_encode($chart_data['multimedia_entry'])],
                                                    'internet_area'=>['label'=>'Internet Entry',
                                                                    'color'=>'#fe6e6b',
                                                                    'data'=>json_encode($chart_data['internet_entry'])]],
                                                            'date'=>date('F Y', strtotime(\Carbon\Carbon::now()))];
                /*RETURN DATA*/
                return $data;
            }else{
                /*CHECK OPTION IF MONTH*/
                if($request->input('option') == 'month'){
                    /*FETCH DATA*/
                     $chart_data = self::get_all_data_by_year($now->year);
                     /*INSERT THE DATA*/
                     $data = ['title'=> 'Vivlio | Circulation', 'active' => 'circulation', 'user_info' => $this->get_user_info(), 'data_day'=> $chart_data['day_list'],
                             'statistics_data'=>['data_patron'=>['label'=>'Patrons Created',
                                                                'color'=>'#004040',
                                                                'data'=>json_encode($chart_data['total_patron'])],/*
                                                'data_utilization'=>['label'=>'Utilization',
                                                                'color'=>'#8da9a9',
                                                                'data'=>json_encode($chart_data['total_utilization'])],
                                                'data_borrow'=>['label'=>'Borrow',
                                                                'color'=>'#8080e9',
                                                                'data'=>json_encode($chart_data['total_borrow'])]*/],
                                    /*STATISTIC ENTRY*/
                                    'statistics_data_entry'=>[
                                                    'library_area'=>['label'=>'Library Entry',
                                                    'color'=>'#B20000',
                                                    'data'=>json_encode($chart_data['library_entry'])],
                                                    'multimedia_area'=>['label'=>'Multimedia Entry',
                                                                    'color'=>'#004040',
                                                                    'data'=>json_encode($chart_data['multimedia_entry'])],
                                                    'internet_area'=>['label'=>'Internet Entry',
                                                                    'color'=>'#fe6e6b',
                                                                    'data'=>json_encode($chart_data['internet_entry'])]],'date'=>'YEAR :'.$now->year];
                    /*RETURN DATA*/
                    return $data;
                }else{
                    /*CHECK OPTION IF YEAR IS SPECIFIC*/
                    if($request->input('option') == 'year_choose'){
                         /*FETCH DATA*/
                         $chart_data = self::get_all_data_by_year($request->input('value'));
                         $data = ['title'=> 'Vivlio | Circulation', 'active' => 'circulation', 'user_info' => $this->get_user_info(), 'data_day'=> $chart_data['day_list'],
                                 'statistics_data'=>['data_patron'=>['label'=>'Patrons Created',
                                                                    'color'=>'#004040',
                                                                    'data'=>json_encode($chart_data['total_patron'])],/*
                                                    'data_utilization'=>['label'=>'Utilization',
                                                                    'color'=>'#8da9a9',
                                                                    'data'=>json_encode($chart_data['total_utilization'])],
                                                    'data_borrow'=>['label'=>'Borrow',
                                                                    'color'=>'#8080e9',
                                                                    'data'=>json_encode($chart_data['total_borrow'])]*/],
                                    /*STATISTICS ENTRY*/
                                   'statistics_data_entry'=>[
                                                    'library_area'=>['label'=>'Library Entry',
                                                    'color'=>'#B20000',
                                                    'data'=>json_encode($chart_data['library_entry'])],
                                                    'multimedia_area'=>['label'=>'Multimedia Entry',
                                                                    'color'=>'#004040',
                                                                    'data'=>json_encode($chart_data['multimedia_entry'])],
                                                    'internet_area'=>['label'=>'Internet Entry',
                                                                    'color'=>'#fe6e6b',
                                                                    'data'=>json_encode($chart_data['internet_entry'])]],'date'=>$request->input('value')];
                        /*RETURN DATA*/
                        return $data;
                    }else{
                          /*CHECK OPTION IF PER YEAR  OR EVERY YEAR*/
                          if($request->input('option') == 'per_year'){
                            /*statistics Circulation*/
                            /*FETCH DATA*/
                            $chart_data = self::get_all_data_by_month($request->input('month'),$request->input('year'),' ');
                            $data = ['title'=> 'Vivlio | Circulation', 'active' => 'circulation', 'user_info' => $this->get_user_info(), 'data_day'=> $chart_data['day_list'],
                                     'statistics_data'=>['data_patron'=>['label'=>'Patrons Created',
                                                                        'color'=>'#004040',
                                                                        'data'=>json_encode($chart_data['total_patron'])],/*
                                                        'data_utilization'=>['label'=>'Utilization',
                                                                        'color'=>'#8da9a9',
                                                                        'data'=>json_encode($chart_data['total_utilization'])],
                                                        'data_borrow'=>['label'=>'Borrow',
                                                                        'color'=>'#8080e9',
                                                                        'data'=>json_encode($chart_data['total_borrow'])]*/],
                                                               /*STATISTIC ENTRY*/
                                                'statistics_data_entry'=>[
                                                                'library_area'=>['label'=>'Library Entry',
                                                                'color'=>'#B20000',
                                                                'data'=>json_encode($chart_data['library_entry'])],
                                                                'multimedia_area'=>['label'=>'Multimedia Entry',
                                                                                'color'=>'#004040',
                                                                                'data'=>json_encode($chart_data['multimedia_entry'])],
                                                                'internet_area'=>['label'=>'Internet Entry',
                                                                                'color'=>'#fe6e6b',
                                                                                'data'=>json_encode($chart_data['internet_entry'])]],
                                                                        'date'=>date('F Y', strtotime(\Carbon\Carbon::now()))];
                            /*RETURN DATA*/
                            return $data;
                         }
                    }
                }
            }
        }
        /*EXIT IF ERROR*/
        exit("error");
    }
    /*FETCH ALL DATA TO ALL MONTH WITH THE SPECIFIC YEAR*/
    public function get_all_data_by_year($YEAR){
       /*ALL MONTHS*/
       $months = [ '01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr',
                   '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Aug', 
                   '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec'];
       /*CREATE COUNTER*/           
       $counter = 1;
       /*DAYS IN ARRAY*/
       $days = [];
       /*FOREACH MONTH COUNT THE DATA*/
       foreach ($months as $key => $value) {
           $list[] = [$counter,$value];
           $total_patron_created[] =[$counter,self::get_in_the_month('','patrons',$counter,$YEAR)];

            /*STATISTIC DATA FOR ENTRY*/
            $total_entry_library[] = [$counter,self::get_in_the_month('1','logs', $counter, $YEAR)];
            $total_entry_multimedia[] = [$counter,self::get_in_the_month('2','logs', $counter, $YEAR)];
            $total_entry_internet[] = [$counter,self::get_in_the_month('3','logs', $counter, $YEAR)];
            /*COUNTER INCREAMENT*/
           $counter++;
       }
       /*RETURN DATA*/
       return ['day_list'=>$list, 'total_patron'=>$total_patron_created,
                    'library_entry'=>$total_entry_library, 
                    'multimedia_entry'=>$total_entry_multimedia, 
                    'internet_entry'=>$total_entry_internet];
    }
    /*GET THE DATA WITH IN THE MONTH*/
    public function get_in_the_month($WHERE_VALUE, $TABLE,$MONTH,$YEAR){
        /*CHECK IF TABLE IS PATRON*/
        if($TABLE == 'patrons'){
            /*QUERY*/
            $data = \DB::table($TABLE)
            ->select('created_at', \DB::raw('count(*) as total'))
            ->whereYear('created_at', '=', $YEAR)->whereMonth('created_at', '=', $MONTH)
            ->groupBy('patron_id')
            ->orderBy('total', 'desc')
            ->get();
            /*RETURN*/
            return count($data);
        }else{
            /*CHECK IF TABLE IS LOGS*/
            if($TABLE == 'logs'){
                /*QUERY*/
                $data = \DB::table($TABLE)
                ->select('created_at', \DB::raw('count(*) as total'))
                ->where('cat_id','=',$WHERE_VALUE)
                ->whereYear('created_at', '=', $YEAR)->whereMonth('created_at', '=', $MONTH)
                ->groupBy('log_id')
                ->orderBy('total', 'desc')
                ->get();
                /*RETURN*/
                return count($data);
            }
        }
    }
    /*GET ALL DATA BY MONTH*/
    public function get_all_data_by_month($MONTH,$YEAR,$DELIMITER){
        $start_date = "01-".$MONTH."-".$YEAR;
        $start_time = strtotime($start_date);
        $end_time =  strtotime("+1 month",$start_time);
        /*SET COUNTER INTO 1*/
        $counter = 1;
        /*LOOP*/
        for($i=$start_time; $i<$end_time; $i+=86400)
        {
           /*FETCH LIST*/
           $list[] = [$counter,date('d', $i)];
           $total_patron_created[] = [$counter,count(self::get_total_by_group_days('', 'patrons',date('d',$i), $MONTH, $YEAR))];
           $total_utilization_created[] = [$counter,rand(1,7)];
           $total_borrow_created[] = [$counter,rand(1,5)];

           $total_entry_library[] = [$counter,count(self::get_total_by_group_days('1', 'logs',date('d',$i), $MONTH, $YEAR))];
           $total_entry_multimedia[] = [$counter,count(self::get_total_by_group_days('2', 'logs',date('d',$i), $MONTH, $YEAR))];
           $total_entry_internet[] = [$counter,count(self::get_total_by_group_days('3', 'logs',date('d',$i), $MONTH, $YEAR))];
           /*INCREAMENT*/
           $counter++;
        }
        /*RETURN*/
        return ['day_list'=>$list,'total_patron'=>$total_patron_created,'total_utilization'=>$total_utilization_created,'total_borrow'=>$total_borrow_created,
         /*ENTRY*/ 
        'library_entry'=>$total_entry_library,'multimedia_entry'=>$total_entry_multimedia,'internet_entry'=>$total_entry_internet];
    }
    /*GET TOTAL BY GROUP DAY*/
    public function get_total_by_group_days($WHERE_VALUE, $TABLE, $DAY, $MONTH, $YEAR){
        /*IF TABLE PATRON*/
        if($TABLE == 'patrons'){
            /*FETCH DATA*/
            $data = \DB::table($TABLE)
            ->select('created_at', \DB::raw('count(*) as total'))
            ->whereYear('created_at', '=', $YEAR)->whereMonth('created_at', '=', $MONTH)->whereDay('created_at','=',$DAY)
            ->groupBy('patron_id')
            ->orderBy('total', 'desc')
            ->get();
            /*RETURN DATA*/
            return $data;
        }else{
            /*CHECK IF TABLE IS LOGS*/
            if($TABLE == 'logs'){
                /*FETCH DATA*/
                $data = \DB::table($TABLE)
                ->select('created_at', \DB::raw('count(*) as total'))
                ->where('cat_id','=',$WHERE_VALUE)
                ->whereYear('created_at', '=', $YEAR)->whereMonth('created_at', '=', $MONTH)->whereDay('created_at','=',$DAY)
                ->groupBy('log_id')
                ->orderBy('total', 'desc')
                ->get();
                /*RETURN DATA*/
                return $data;
            }
        }
    }
    /*PAGES:*/
    public function borrow()
    {
        /*SET PAGE*/
        $data = ['title'=> 'Vivlio | Borrow', 'active' => 'circulation', 'user_info' => $this->get_user_info(),'counter'=>1 ,'pages'=>['loan'=>['name'=>'loan'],
                                                                                        'return'=>['name'=>'return'],
                                                                                        'renewal'=>['name'=>'renewal'],
                                                                                        'hold_reserved'=>['name'=>'hold_reserved'],
                                                                                        'fines'=>['name'=>'fines'],
                                                                                        'overdue'=>['name'=>'overdue']]];
       /*RETURN PAGE*/
        return view('circulation.borrow.index', compact('data'));
    }
    /*START PATRON*/
    public function patrons()
    {   
        $program_ = ProgramList::on('sis_database')->get();
        $cat = new PatronCategories;
        /*DATA*/
        $data = ['title'=> 'Vivlio | Patrons', 'active' => 'circulation', 'user_info' => $this->get_user_info(),
                 'data_content'=> /*$data*/[],
                 'data_patrons'=> /*$patrons*/[],
                 'program_list'=> $program_,
                 'patron_type'=> $cat->get_all()];
        /*RETURN VIEW*/
        return view('circulation.patrons.index', compact('data'));
    }
    /*FETCH STUDENTS*/
    public function fetch_students(){
        $patron = new Patrons;
        $patron_already_store = array();
        $patrons = Patrons::on()->with(['patron_information'])->get();
        $patron_data = [];
        foreach ($patrons as $key => $value) {
           if($value->sis_id != 0){
              $patron_already_store[] = $value->sis_id;
           }
        }
        /*CREATE CARBON*/
        $carbon = Carbon::now();
        $year = '';
        $course = '';
        $address = '';
        $contact = '';
        /*CHECK THE SEMESTER*/
        if(self::checkSemester() == '1'){
            /*GET YEAR*/
            /*first CODE :: */
            $year = ($carbon->year - 1).'-'.$carbon->year;
            /*NEW CODE CHANGE IF THERE IS WRONG*/
            /*$year = ($carbon->year).'-'.($carbon->year+1);*/
        }else{
            /*GET YEAR*/
            $year = $carbon->year.'-'.($carbon->year+1);
        }
        /*FETCH THE DATA WITHIN THAT SEMESTER*/
        $data = Year::on('sis_database')->with(['studentSchoolInfo',
                                                'studentSchoolInfo.studentPersonalInfo',
                                                'studentSchoolInfo.studentPrograms.programList',
                                                'studentSchoolInfo.studentPersonalInfo.addresses.province',
                                                'studentSchoolInfo.studentPersonalInfo.addresses.country',
                                                'studentSchoolInfo.studentPersonalInfo.addresses.barangay', 
                                                'studentSchoolInfo.studentPersonalInfo.addresses.city',
                                                'studentSchoolInfo.studentPersonalInfo.addresses.city'])->where('sch_year',$year)->where('semester',(self::checkSemester() == '1') ? '1st' : '2nd')->get();
       
        foreach ($data as $key => $value) {
            /*PATRON INFORMATION*/
            /*GROUP BY ADDRESS*/
            foreach ($value->studentSchoolInfo->studentPersonalInfo->addresses as $address) {
               $address = $address->barangay->brgy_name.' '.$address->city->city_name.' '.$address->province->province_name.' '.$address->country->country_name;
            }
            /*GROUP BY PROGRAM LIST*/
            foreach ($value->studentSchoolInfo->studentPrograms as $programList) {
                $course = $programList->programList->prog_name;
            }
            /*GROUP*/
            $patron_data[] =['full_name' => strtoupper($value->studentSchoolInfo->studentPersonalInfo->fname).' '.strtoupper($value->studentSchoolInfo->studentPersonalInfo->mname).' '.strtoupper($value->studentSchoolInfo->studentPersonalInfo->lname),
                        'student_id' => $value->StudentSchoolInfo->stud_id,
                        'gender' => $value->studentSchoolInfo->studentPersonalInfo->gender,
                        'dob' => $value->studentSchoolInfo->studentPersonalInfo->birthdate,
                        'spi_id'=> $value->studentSchoolInfo->studentPersonalInfo->spi_id,
                        'address' => strtoupper($address),
                        'course' => $course,
                        'contact_no' => ''];
        }
        $newData = [];
        /*FOR EACH DATA IN VALUE*/
        foreach ($patron_data as $value_info) {
           //if data is in a list 
           if(!in_array($value_info['spi_id'], $patron_already_store)){
                //put data on specific field
                $newData[] = ['name'=> '<span style=""><font style="color:#004040; font-size:12px;">'.$value_info['full_name'].'</font><br>
                                    <small>Student ID: '.$value_info['student_id'].'</small></span>',
                         'course' =>  '<span style=""><span style="color:#00acac;">'.strtoupper($value_info['course']).'</span> <br>',
                         'dob'=> '<span style=""><font style="color:#004040;">'.date('F j, Y', strtotime($value_info['dob'])).'<br>
                                    <small style="color:grey;">Age: '.Carbon::parse($value_info['dob'])->age.'</small></font></span>',
                         'action' => ' <td><button type="button" class="btn btn-primary btn-xs btn-warning absorb-student" student-id="'.$value_info['spi_id'].'" student-name="'.$value_info['full_name'].'" student-gender="'.$value_info['gender'].'" student-address="'.$value_info['address'].'" student-contact="'.$value_info['contact_no'].'" student-birthday="'.$value_info['dob'].'" student-stud-id="'.$value_info['student_id'].'" student-course="'.$value_info['course'].'" student-csrf-token="'.csrf_token().'"><i class="fa fa-refresh"></i> Absorb</button>
                                        <span class="text-danger hidden">loading.....</span></td>',
                         'id' => $value->patron_id];
           }
        }
        /*RETURN DATA*/
        return json_encode(['data'=>$newData]);
    }
    /*FETCH PATRON*/
    public function fetch_patrons(Request $request){
        $data = [];
        $patron = new Patrons;
        $where  = [];
        $d = [];
        if($request->input('_type') == 1){
            $d = Patrons::on()->with(['patron_information','expiration_history'])->where(['patron_type'=>'student'])->get() ;
        }else if($request->input('_type') == 2){
            $d = Patrons::on()->with(['patron_information','expiration_history'])->where(['patron_type'=>'faculty'])->get() ;
        }else{
            $d = Patrons::on()->with(['patron_information','expiration_history'])->get() ;
        }
        /*FOR EACH PATRONS IN DATA*/
        foreach ($d as $key => $value) {
            foreach ($value->patron_information as $key => $value_info) {
                /*SET*/
                $data[] = ['name'=> '<span style=""><font style="color:#004040; font-size:12px; font-weight:bold;">'.strtoupper($value_info->full_name).'</font><br>
                                        <small>ID: '.$value_info->student_id.'</small></span>',
                           'course'=>'<span style=""><span style="color:#00acac;">'.strtoupper($value_info->course).'</span> <br>',
                           'barcode' => '<span style="font-size:14px;"><span style="color:#00acac;"><i class="fa fa-barcode text-danger"></i>  '.strtoupper($value->barcode).'</span> <br>',
                           'dob'=> '<span style=""><font style="color:#004040;">'.date('F j, Y', strtotime($value_info->dob)).'<br>
                                    <small style="color:grey;">Age: '.Carbon::parse($value_info->dob)->age.'</small></font></span>',
                           'action' => (empty($value->barcode))? '<h4 class="panel-title" id="barcode_label_'.$value->patron_id.'" style="text-align:left;"><i class="fa fa-list"></i> Add Barcode</h4>
                                       <div class="input-group" id="barcode_input_'.$value->patron_id.'">
                                <input class="form-control barcode_update" patron-id="'.$value->patron_id.'" type="text" >
                                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                            </div>
                             <i class="fa fa-circle-o-notch fa-spin fa-fw text-success hidden" id="barcode_loading_'.$value->patron_id.'" style="font-size:16px;line-height:50%;"></i>
                                                                 <span class="hidden" id="barcode_success_'.$value->patron_id.'"><i class="fa fa-check fa-2x text-success"></i></span>
                            ':'<span><i class="fa fa-check fa-2x text-success"></i></span>',
                           'id' => $value->patron_id];
            }
        }
        /*RETURN DATA*/
        return json_encode(['data' => $data]);  
    }
    /*SAVE STUDENT FROM DB*/
    public function saveStudentFromDB(Request $request)
    {
        /*INITIALIZED CARBON (TIME)*/
        $carbon = Carbon::now();
        $patron  = new Patrons;
        /*CLASS PATRON AND EXPIRATION_HISTORY*/
        $patron_info = new Patron_information;
        $expiration = new Expiration_history;
        $carbon = Carbon::now();
        $patron->barcode = "";
        $patron->card_number = "";
        $patron->patron_category_id = 1;
        $patron->patron_type = ($request->input('_course') == 'FACULTY')? 'faculty' : 'student';
        $patron->status_id = 1;
        $patron->sis_id = $request->input('_id');
        /*CHECK THE SEMESTER*/
        if(self::checkSemester() == '1'){
            $patron->expiration =  Carbon::create($carbon->year,10,29);
            $expiration->expiration_date = Carbon::create($carbon->year,10,29);
        }else if(self::checkSemester() == '2'){
            $patron->expiration = Carbon::create(($carbon->year+1),3,29);
            $expiration->expiration_date = Carbon::create($carbon->year,10,29);
        }
        /*SAVE*/
        $patron->save();
        /*ADD*/
        $patron_info->add($patron->patron_id,$request);
        /*SET EXPIRATION */
        $expiration->patron_id = $patron->patron_id;
        $expiration->save();
    }
    /*FETCH PATRON USING ID*/
    public function getPatronByID(Request $request)
    {
        /*FETCH DATA IN PATRON TABLE WITH PATRON INFORMATION*/
        $data = Patrons::with(['patron_information'])->where('patron_id',$request->input('_id'))->get();
        /*RETURN PAGE*/
        echo view('Circulation.patrons.patron_info')->with(['data' => $data,'semester'=>self::checkSemester()]);
    }
    /*FETCH PATRON USING BARCODE*/
    public function getPatronByBarcode(Request $request)
    {
        if(($request->input('option') == 'borrow')){
            /*FETCH DATA IN PATRON WITH PATRON INFORMATION*/
            $items = [];
            $borrowLimit = 0;
            $count = 0;
            $fines = 0;
            $cat = new PatronCategories;
            $loan = new Loans;
            $loan_rules = 0;
            $data = Patrons::with(['patron_information'])->where('barcode',$request->input('_barcode'))->get();
            foreach ($data as $value) {
                $items = self::getLoanItems($value->patron_id);
                
                $borrowLimitp = $cat->get_all_where(['patron_category_id'=>$value->patron_category_id])->toArray();
                $borrowLimit = $borrowLimitp[0]['loan_rules']['max_loan_qty'];
                $loan_rules = $borrowLimitp[0]['loan_rules']['fine'];
                $count = $loan->count(['patron_id'=>$value->patron_id,'returned'=>0]);
                $fines = self::getFines($value->patron_id);
            }
            /*RETURN PAGE*/
            echo view('Circulation.borrow.templates.patron_borrow_details')->with(['data' => $data, 'semester'=>self::checkSemester(),'code'=> self::generateRandomString(),'category' => $request->input('_category'),
                'items'=> $items, 'renewal' => $loan->whereIn('acc_num',self::getUnavailableItem())->get(), 'borrowLimit'=>$borrowLimit, 'totalUnreturned'=> $count, 'fines'=> $fines, 'fines_rules'=>$loan_rules]);
        }else{
             /*FETCH DATA IN PATRON WITH PATRON INFORMATION*/
            $data = Patrons::with(['patron_information'])->where('barcode',$request->input('_barcode'))->get();
            /*RETURN PAGE*/
            echo view('Circulation.patrons.patron_info')->with(['data' => $data, 'semester'=>self::checkSemester()]);
        }
    }
    /*MANUALY SAVE*/
    public function manual_save(Request $request)
    {
        /*START CARBON*/
        $carbon = Carbon::now();
        /*PATRON TABLE*/
        $patron = new Patrons;
        /*SET EXPIRATION*/
        $patron_info = new Patron_information;
        $expiration = new Expiration_history;
        /*CREATE NEW VARIABLE*/
        $patron->barcode = "";
        $patron->card_number = "";
        $patron->patron_category_id = $request->input('patron-type');
        $patron->patron_type = ($request->input('patron-course') == 'FACULTY')? 'faculty' : 'student';
        $patron->status_id = 1;
        /*CHECK SEMESTER*/
        if(self::checkSemester() == '1'){
            /*SET EXPIRATION*/
            $patron->expiration =  Carbon::create($carbon->year,10,29);
            $expiration->expiration_date = Carbon::create($carbon->year,10,29);
        }else if(self::checkSemester() == '2'){
            /*SET EXPIRATION*/
            $patron->expiration = Carbon::create(($carbon->year+1),3,29);
            $expiration->expiration_date = Carbon::create($carbon->year,10,29);
        }
        /*SET ID*/
        $patron->sis_id = 0;
        /*SAVE*/
        $patron->save();
        /*SET PATRON ID*/
        $patron_info->patron_id =  $patron->patron_id;
        $patron_info->full_name = $request->input('patron-first').' '.$request->input('patron-middle').' '.$request->input('patron-last');
        $patron_info->gender = $request->input('patron-gender');
        $patron_info->dob = $request->input('patron-birthdate');
        $patron_info->student_id = $request->input('patron-student-id');
        $patron_info->course = $request->input('patron-course');
        $patron_info->contact_no = $request->input('patron-contact');
        $patron_info->address = $request->input('patron-address');
        /*SAVE*/
        $patron_info->save();
        $expiration->patron_id = $patron->patron_id;
        /*SAVE*/
        $expiration->save();
        /*EXIT*/
        exit('1');
    }
    /*end */
    /*START UTILIZATION*/
    public function utilization()
    {
        /*SET DATA*/
        $data = ['title'=> 'Vivlio | Utilization', 'active' => 'circulation', 'user_info' => $this->get_user_info()];
        /*RETURN VIEW*/
        return view('circulation.LMU.index', compact('data'));
    }
    /*LOGS*/
    public function logs()
    {   
        /*STATISTICS CIRCULATION*/
        $now = Carbon::now();
        /*FETCH DATA*/
        $chart_data = self::get_all_data_by_month($now->month,$now->year,' ');
        /*DATA FETCH*/
        $data = ['title'=> 'Vivlio | Logs', 'active' => 'circulation', 'user_info' => $this->get_user_info(),'logs_data'=>['patrons'=> Patrons::with(['patron_information'])->orderBy('patron_id','DESC')->get(),'library_entry'=>self::getLogsByCategory(1),'internet_entry'=>self::getLogsByCategory(3),'multimedia_entry'=>self::getLogsByCategory(2),
                                                                                    ]
                ,'data_day'=> json_encode($chart_data['day_list']),
                                       'statistics_data'=>['data_patron'=>['label'=>'Patrons Created',
                                                    'color'=>'#004040',
                                                    'data'=>json_encode($chart_data['total_patron'])],
                                        /*DATA UTILIZATION*/
                                        /*'data_utilization'=>['label'=>'Utilization',
                                                    'color'=>'#B20000',
                                                    'data'=>json_encode($chart_data['total_utilization'])],
                                       'data_borrow'=>['label'=>'Utilization',
                                                    'color'=>'orange',
                                                    'data'=>json_encode($chart_data['total_borrow'])]*/]];
        /*RETURN PAGE*/
        return view('circulation.logs.index', compact('data'));
    }
    /*GET LOGS BY CATEGORY*/
    public function getLogsByCategory($category)
    {
        $log_data = [];
        /*FETCH*/
        $logs = Logs::where('cat_id',$category)->orderBy('log_id','DESC')->get()->take(5);
        foreach ($logs as $key => $value) {
            $log_data[] = ['info'=>Patron_information::where('patron_id',$value->patron_id)->get(),'time'=>$value->created_at];
        }
        /*RETURN DATA*/
        return $log_data;
    }
    //get Item using barcode
    public function getItemByBarcode(Request $request){
        if($request->input('option') == 'borrow'){
            echo view('Circulation.borrow.templates.item_details')->with(['data' => $this->fetchCopies($request->input('_barcode'),$request->input('_list')), 'semester'=>self::checkSemester()]);
        }
    }
    //get the transaction details 
    public function getTransactionDetails(Request $request){
        //view transaction details
        echo view('Circulation.borrow.templates.transaction_details')->with(['category'=> $request->input('_category'), 'data' => ['loan'=> self::getLoanItems($request->input('_patron_id')), 'fines'=> self::getFinesList($request->input('_patron_id')) ,'renewal' => '', 'reserve' => self::getReservationList($request->input('_patron_id'))], 'semester'=>self::checkSemester(), 'patron_id'=>$request->input('_patron_id'),'code'=>self::generateRandomString()]);
    }
    //get loan items using patron_id 
    public function getLoanItems($id){
        $data = Loans::where('patron_id',$id)->get()->toArray();
        $data_info = [];
        foreach ($data as $key => $value_n) {
            $barcode = Copies::where('acc_num',$value_n['acc_num'])->get(['barcode'])->toArray();
            foreach ($barcode as  $value_barcode) {
                $value_n['info']= self::fetchCopies($value_barcode['barcode'],[]);
            }
            $data_info[]  = $value_n;
        };
        //return 
        return $data_info;
    }
    //save Loan items
    public function saveLoanItem(Request $request){
        if($request->input('request') == 'loan'){
            //each items
            foreach ($request->input('_list') as $value) {
                $fetch_copy = Copies::where('acc_num',$value)->get(['copy_id']);
                foreach ($fetch_copy as $key => $value_fetch) {
                    $c = Copies::find($value_fetch->copy_id);
                    $c->status = 'unavailable';
                    $c->save();
                }
                $rule = Self::loanRules($request->input('_patron'));
                $loan = new Loans;
                $loan->patron_id = $request->input('_patron');
                $loan->acc_num = $value;
                $loan->due_date = Carbon::now()->addDays($rule['loan_length']);
                $loan->returned = '0';
                $loan->returned_date = null;
                $loan->loaned_date = Carbon::now();
                //save
                $loan->save();
            }
        }else if($request->input('request') == 'reserve'){
            $value = '';
            $copy_id = '';
            $p_barcode = '';
            $fetch_copy = Copies::where('barcode',$request->input('_barcode'))->get()->toArray();
            foreach($fetch_copy as $v){
               $value = $v['acc_num'];
               $copy_id = $v['copy_id'];
            }
            $c = Copies::find($v['copy_id']);
            $c->status = 'unavailable';

            $rule  = Self::loanRules($request->input('_patron'));
            $loan = new Loans; 
            $loan->patron_id = $request->input('_patron');
            $loan->acc_num = $value;
            $loan->due_date = Carbon::now()->addDays($rule['loan_length']);
            $loan->returned = '0';
            $loan->returned_date = null;
            $loan->loaned_date = Carbon::now();


            $r = Reserves::find($request->input('reserve_id'));
            $r->copy_id = $copy_id;
            $r->status = 'borrowed';
            if($loan->save()){
                if($r->save()){
                    if($c->save()){
                        return $request->input('p_barcode');
                    }
                }
            }
        }
    }
    public function getMaterialReservationDetails(Request $request){
        $info = [];
        $data = Reserves::where(['catalogue_record_id'=>$request->input('catalogue_id')])->whereNull('cancel_date')->get();
        $data_catalogue = CatalogueRecord::where(['catalogue_id' => $request->input('catalogue_id')])->get()->toArray();
        foreach ($data_catalogue as $value) {
            $info = [self::fetchCopiesByCatalogueID($request->input('catalogue_id'))];
        }
        $data = ['available_count' => count(Copies::where(['catalogue_id'=> $request->input('catalogue_id')])->where(['status'=>'available'])->get(['catalogue_id'])->toArray()), 'reserve_count' => count($data), 'patron_id'=>$request->input('patron_id'), 'material_info'=>['catalogue'=>$data_catalogue, 'info'=> $info]];
        echo view('Circulation.borrow.templates.material_transaction_details')->with(['data' => $data]);
    }
    public function getReservationList($id){
        $r = new Reserves();
        $rd = $r->getReserveItemByPatronID($id);
        $data = [];
        foreach ($rd->toArray() as $value) {
            $data[] = ['main' => $value,
                       'info' => self::fetchCopiesByCatalogueID($value['catalogue_record_id']),
                       'available_count'=> count(Copies::where(['catalogue_id'=> $value['catalogue_record_id']])->where(['status'=>'available'])->get(['catalogue_id'])->toArray()),
                       'availability' => self::checkCatalogueIfAvailable($value['catalogue_record_id']),
                       'queue' => ($value['status'] == 'pending') ? self::getQueNum($id,$value['catalogue_record_id']) : 0];
        }
        return $data;
    }
    public function saveRenewItem(Request $request){
        $fetch_copy = Copies::where('acc_num',$request->input('_acc_num'))->get(['copy_id']);
        foreach ($fetch_copy as $key => $value_fetch) {
            $c = Copies::find($value_fetch->copy_id);
            $c->status = 'unavailable';
            $c->save();
        }
        $rule = Self::loanRules($request->input('_patron_id'));
        $loan = new Loans;
        $loan->patron_id = $request->input('_patron_id');
        $loan->acc_num = $request->input('_acc_num');
        $loan->due_date = Carbon::now()->addDays($rule['loan_length']);
        $loan->returned = '0';
        $loan->returned_date = null;
        $loan->loaned_date = Carbon::now();
        //save
        $loan->save();
        exit("1");
    }
    public function saveReserveItem(Request $request){
        $res =  new Reserves;
        return $res->saveReservation($request->input());
    }
    public function getLoan($id,$p_id){
        $loan = new Loans;
        $cat = new PatronCategories;
        $patron = Patrons::where(['patron_id' => $p_id])->get(['patron_category_id'])->toArray();
        $loan_rules = 0;
        $borrowLimitp = [];
        if(count($patron) > 0){
             foreach ($patron as $value) {
                 $borrowLimitp = $cat->get_all_where(['patron_category_id'=>$value['patron_category_id']])->toArray();
            }
            $loan_rules = $borrowLimitp[0]['loan_rules']['fine'];
        }
        $loan_data = $loan->where(['loan_id'=>$id])->get()->toArray();
        $barcode = Copies::where('acc_num',$loan_data[0]['acc_num'])->get(['barcode'])->toArray();
        $value_n = self::fetchCopies($barcode[0]['barcode'],[]);
        return [$loan_data, $value_n, $loan_rules];
    }
    public function getFinesList($id){
       $fines = new Fines;
       $info = [];
       $data = $fines->where(['patron_id'=>$id ])->get()->toArray();
       foreach ($data as $value) {
           $info[] = ['data'=> $value, 'info'=> self::getLoan($value['loan_id'],$id)];
       }
       return $info;
    }
    public function cancelReservedItem(Request $request){
        /*dd($request->input());*/
        $reserve = Reserves::find($request->input('_reserve_id'));
        $reserve->status = 'canceled';
        $reserve->cancel_date = Carbon::now();
        $reserve->save();
    }
    public function checkItem(Request $request){
       return (count(Copies::where(['barcode'=> $request->input('_barcode')])->where(['status'=>'available'])->where(['catalogue_id'=>$request->input('_catalogue_id')])->get()) > 0) ? 1 : 0;
    }
    public function payFines(Request $request){
        foreach ($request->input('primary_data') as $value) {
            $f = new Fines;
            $f->patron_id = $value['patron_id'];
            $f->loan_id = $value['loan_id'];
            $f->amount = $value['amount'];
            $f->remarks = $value['remarks'];
            $f->status = 'PAY';
            $f->type = 'CASH';
            if($f->save()){
                $l = Loans::find($value['loan_id']);
                $l->returned = 1;
                $l->returned_date = Carbon::now();
                if($l->save()){
                    $c = new Copies;
                    $d = $c->where(['acc_num'=>$value['acc_num']])->get();
                    foreach ($d as $vv) {
                        $cc = Copies::find($vv['copy_id']);
                        $cc->status = 'available';
                        $cc->save();
                    }
                   
                }
            }
        }
        exit('1');
    }
    
    public function getUtilItem(Request $request){
        //$c represents the copy $l is the list who loaned of the copies and $d is represents the data to view in the blade 
        $c = []; $l = []; $d = []; $i = []; $g = []; $counter = 0;
        if(count($c = Copies::where(['barcode'=>$request->input('_barcode')])->get()->toArray()) > 0){
            foreach ($c as $v) {
                $l = Loans::where(['acc_num'=> $v['acc_num']])->get()->toArray();
                foreach (Copies::where(['catalogue_id'=>$v['catalogue_id']])->get(['acc_num'])->toArray() as $key => $value) {
                    $ll = Loans::where(['acc_num'=>$value['acc_num']])->get()->toArray();
                    foreach($ll as $value2){
                        foreach (Patrons::on()->where(['patron_id'=>$value2['patron_id']])->with(['patron_information'])->get()->toArray() as $value3) {
                            array_push($g,['loan_id'=>$value2['loan_id'],
                                'due_date'=>(date('F j, Y', strtotime($value2['due_date']))),
                                'returned_date'=> $value2['returned_date'] != NULL ? (date('F j, Y', strtotime($value2['returned_date']))) : 'Not Returned',
                                'loaned_date'=> (date('F j, Y', strtotime($value2['loaned_date']))),
                                'patron_id' => $value3['patron_information'][0]['patron_id'],
                                'patron_name'=> $value3['patron_information'][0]['full_name'],
                                'student_id' => $value3['patron_information'][0]['student_id'],
                                'acc_num' => $value['acc_num'],
                                'course' => $value3['patron_information'][0]['course']]);
                        }
                        $counter++;
                    }    
                }
                foreach ($l as  $vv) {
                    foreach(Patrons::on()->where(['patron_id'=>$vv['patron_id']])->with(['patron_information'])->get()->toArray() as $vvv){
                        $i[] = ['loaned_date'=>$vv['loaned_date'],'returned_date'=>$vv['returned_date'],'info'=>$vvv['patron_information'][0]];
                    }
                }
                $d = ['acc_num'=>$v['acc_num'],
                      'catalogue_id'=>$v['catalogue_id'],
                      'barcode'=>$v['barcode'],
                      'source'=>$v['source'],
                      'status'=>$v['status'],
                      'note'=> $v['note'],
                      'call_num'=>$v['call_num'],
                      'issues' => $v['issues'],
                      'date_received' => $v['date_received'],
                      'count' => count($l),
                      'counter_gen' => $counter,
                      'info' => self::fetchCopies($request->input('_barcode'),[]),
                      'list' => $i,
                      'gen-list'=> $g,
                      'statistics-data' => self::lmu_statistics($v['acc_num'])];
               
            }
            echo view('Circulation.LMU.monitor.layout_head')->with(['data' => $d]);
        }else{
            exit('0');
        }
    }
    public function lmu_statistics($accnum){
         $data = [];
         $counter = 1;
         $months = [ '01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr',
                   '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Aug', 
                   '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec'];
        foreach($months as $key => $val){
            $data[] = [$counter,count(\DB::table('loans')
            ->select('created_at', \DB::raw('count(*) as total'))
            ->where(['acc_num'=>$accnum])
            ->whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at', '=', $key)
            ->groupBy('loan_id')
            ->orderBy('total', 'desc')
            ->get())];
            $counter++;
        }

        return $data;
         
    }
    
}
