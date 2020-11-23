<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\E_resources;
class TechnicalController extends Controller
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
        
        $data = ['title'=> 'Vivlio | Technical',  'active' => 'technical', 'user_info' => $this->get_user_info()];
        return view('technical.index', compact('data'));
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
    public function acquisition()
    {
        $data = ['title'=> 'Vivlio | Acquisition', 'active' => 'technical', 'user_info' => $this->get_user_info()];
        
        return view('technical.acquisition.index', compact('data'));
    }
    public function catalogue()
    {
        $data = ['title'=> 'Vivlio | Catalogue', 'active' => 'technical', 'user_info' => $this->get_user_info()];
        return view('technical.catalogue.index', compact('data'));
    }
    public function indexing()
    {
        $data = ['title'=> 'Vivlio | Indexing', 'active' => 'technical', 'user_info' => $this->get_user_info()];
        
        return view('technical.indexing.index', compact('data'));
    }
    public function e_resource()
    {

        $newfilename = "12345";
        
         $data = ['title'=> 'Vivlio | E - resource', 'active' => 'technical', 'user_info' => $this->get_user_info()];
        
        return view('technical.e_resource.index', compact('data'));
    }
    public function fetchResources(Request $request){
        $e = new E_resources;
        return json_encode($e->fetchResources());
    }
    public function saveResources(Request $request){
        if($request->hasFile('res_upload_file')){
            if($request->file('res_upload_file')->isValid()){
                $document = $request->file('res_upload_file');
                $name = $document->getClientOriginalName();
                $extensions = $document->getClientOriginalExtension();
                $data = $request->input();
                $id = '';
                $e = new E_resources;
                if($e->saveData($data,$extensions)){
                    $id = $e->res_id;
                    Storage::disk('e_resources')->putFile($id,$request->file('res_upload_file'));
                    exit("1");
                }else{
                    exit("0");
                }
            }
        }
    }
    public function downloadFile(Request $request){ 
        $dir = base_path()."/public/uploads/e_resources/".$request->input('res_id')."/";
        /* var_export($dir); */
        $files = File::allFiles($dir);
        $headers = array(
                  'Content-Type'=> 'application/pdf'
                );
        foreach ($files as $file){
            return response()->download($file,'<filename>',$headers);
            // return response()->streamDownload($file);

        }
    }
}
