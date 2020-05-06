<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\patrons;
use App\Logs;
class LogController extends Controller
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
    public function index($category)
    {
        if(!empty($category)){
            switch ($category) {
                case 'library':
                    $this->get_page($category,1);  
                    break;
                case 'internet':
                    $this->get_page($category,3);
                    break;
                case 'multimedia':
                    $this->get_page($category,2);
                    break;
                default:
                    return response()->view('404', [], 404);
            }
        }
    }
    public function get_page($category_name,$id)
    {
        $data = ['title'=> 'Vivlio | '.ucfirst($category_name), 'name'=>$category_name, 'category'=>$id];
        exit(view('entry.index', compact('data')));
    }
    public function log_patron(Request $request)
    {
        $data = Patrons::where('barcode',$request->input('_barcode'))->with(['patron_information','expiration_history'])->get();
        if(count($data) > 0){
            foreach ($data as $key => $value) {
                $log = new Logs();
                $log->patron_id = $value->patron_id;
                $log->patron_ids = $value->patron_id;
                $log->cat_id = $request->input('_category');
                $log->save();
            }
            exit(view('entry.patron_layout',compact('data')));
        }else{
            exit('0');
        }
    }
}
