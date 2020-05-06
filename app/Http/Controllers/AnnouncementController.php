<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
class AnnouncementController extends Controller
{

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function __construct()
	{
		$this->middleware('auth');
	}
    public function index()
    {
        $data = ['title'=> 'Vivlio | Dashboard' , 'active'=>'Announcement',
                 'ann' => ['slide' => Announcement::where('ao_id',1)->where('status','active')->get(),
                           'running' => Announcement::where('ao_id',2)->where('status','active')->get()]];
        
        return view('announcement.index', compact('data'));
    }
    public function save(Request $request){
        $a = new Announcement;
        $option_id = ($request->input('option') == 'slide') ? 1: 2;

        $a->title = $request->input('title');
        $a->description = $request->input('description');
        $a->status = 'active';
        $a->ao_id = $option_id;
        if($a->save()){
            exit("1");
        }
        exit("2");
    }
    public function fetch(Request $request){
        $data ='';
        $a = Announcement::where('ao_id',(($request->input('_option') == 'slide') ? 1 : 2))->get();
        if(count($a) == 0){
            $data = 'No Data';
        }else{
            foreach ($a as $key => $value) {
            $status = ($value->status == 'active') ? 'success' : 'danger';
            $status_fa = ($value->status == 'active') ? 'check' : 'times';
            $data .= '<div class="col-md-12" style="padding-bottom:10px;">
                         <div class="media media-sm">
                            <div class="media-body">
                                <h4 class="media-heading">'.$value->title.'
                                <button id="'.$value->a_id.'" class="btn-delete btn btn-flat btn-xs btn-success"><i class="fa fa-trash"></i></button>
                                <button id="'.$value->a_id.'" class="btn-edit btn btn-flat btn-xs btn-'.$status.'" status-active="'.$value->status.'"><i class="fa fa-'.$status_fa.'"></i></button></h4>
                                <p>'.$value->description.'</p>
                            </div>
                        </div>
                    </div>';
            }
        }
        exit($data);
    }
    public function delete(Request $request){
        $a = Announcement::find($request->input('_id'));
        if($a->delete()){
            exit("1");
        }
        exit("2");
    }
    public function edit(Request $request){
        $a = Announcement::find($request->input('_id'));
        if($a->status  == 'active'){
            $a->status  = 'inactive';
        }else{
            $a->status = 'active';
        }
        if($a->save()){
            exit('1');
        }
        exit("2");
    }
}
