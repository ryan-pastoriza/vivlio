<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\patrons;
use App\copies;
use Carbon\Carbon;


class HomeController extends Controller
{   
    public function __construct()
	{
		$this->middleware('auth');
	}
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['title'=> 'Vivlio | Dashboard', 'active'=>'dashboard', 
                 'user_info' => $this->get_user_info()];
        /* return view('dashboard', compact('data'));*/
       /*  return dd(Auth::user()['attributes']);*/
        if(Auth::user()->status_id == 1){
            return view('dashboard', compact('data'));
        }
        Auth::logout();
    }
    public function __initDashBoard(Request $request){
        $category = $request->input('_category');

        switch ($category) {
            case 'patrons':
                self::__initPatrons();
                break;
            case 'items':
                self::__initItems();
                break;
            case 'penalties':
                # code...
                break;
            default:
                # code...
                break;
        }
    }
    public function __initPatrons(){
       $p = new Patrons;
       $d = $p->fetchPatronsByLast(Carbon::now()->subDays(30));
       exit($d);
    }
    public function __initItems(){
       $i = new Copies;
       $d = $i->fetchCopiesByLast(Carbon::now()->subDays(30));
       $data = [];
       foreach ($d as $key => $value) {
           $data[] = ['copies'=>$value, 'info'=> self::fetchCopiesByCatalogueID($value['copies']['catalogue_id'])];
       }
       exit(json_encode($data));
    }
    public function __initPenalties(){

    }
}
