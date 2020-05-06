<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\marc_tag_structure;
use App\marc_subfield_structure;
use App\Company;
use App\product;
class CpanelController extends Controller
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
        $data = ['title'=> 'Vivlio | CPanel', 'active' => 'cpanel', 'user_info' => $this->get_user_info()];
        return view('cpanel.index', compact('data'));
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

 
    public function edit(Request $request)
    {
        // var_export($request->input('value'));
       $a = '';
       if($request->input('_option') == 'company'){
            $a = Company::find($request->input('_id'));
            $i = $request->input('_entity');
            if($i == 'name'){
                $a->c_name = $request->input('value');
            }else if($i == 'description'){
                $a->c_description = $request->input('value');
            }else if($i == 'TIN'){
                $a->c_TIN = $request->input('value');
            }else if($i == 'contact_number'){
                $a->c_contact = $request->input('value');
            }else if($i == 'postal'){
                $a->c_postal = $request->input('value');
            }else if($i == 'email'){
                $a->c_email = $request->input('value');
            }
       }else{
            if($request->input('_option') == 'product'){
                $a = Product::find($request->input('_id'));
                $i = $request->input('_entity');

                if($i == 'name'){
                    $a->p_name = $request->input('value');
                }else if($i == 'description'){
                    $a->p_description = $request->input('value');
                }else if($i == 'creator'){
                    $a->p_creator = $request->input('value');
                }
            }
       }
       
       if($a->save()){
            exit('1');
       }
       exit('2');
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
    public function rda()
    {
        $marc = new marc_tag_structure();
        $data = ['title'=> 'Vivlio | CPanel (RDA)',
                 'active' => 'cpanel', 'user_info' => $this->get_user_info(), 'marc_tags' => $marc::all()->toArray()];
        return view('cpanel.rda.index', compact('data'));
    }

    public function announcement()
    {
        $data = ['title'=> 'Vivlio | Announcement', 'active' => 'cpanel', 'user_info' => $this->get_user_info()];
        return view('cpanel.announcement.index', compact('data'));
    }
    public function company()
    {
        $d = [];
        foreach (Company::on()->with(['products'])->take(1)->get() as $key => $value) {
            $d['company'] = ['c_id'=>$value->c_id, 'c_name' => $value->c_name, 'c_desc' => $value->c_description,'c_TIN'=> $value->c_TIN, 'c_postal' => $value->c_postal,'c_contact'=> $value->c_contact,'c_email' => $value->c_email, 'c_status' => $value->c_status];
            foreach ($value->products as $key_prod => $product) {
               $d['product'] = ['p_id'=>$product->p_id, 'p_creator'=>$product->p_creator, 'p_name' => $product->p_name, 'p_description'=>$product->p_description];
            }
        }
        $data = ['title'=> 'Vivlio | Company', 'active' => 'cpanel', 'user_info' => $this->get_user_info(), 'c_data'=>$d];
        return view('cpanel.company.index', compact('data'));
    }
    public function printing()
    {
        $data = ['title'=> 'Vivlio | Printing', 'active' => 'cpanel', 'user_info' => $this->get_user_info()];
        return view('cpanel.printing.index', compact('data'));
    }
    public function circulation(){
        $data = ['title' => 'Vivilio | Circulation' ,  'active' => 'cpanel', 'user_info' => $this->get_user_info()];
        return view('cpanel.circulation.index', compact('data'));
    }
}
