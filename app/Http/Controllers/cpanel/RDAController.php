<?php

namespace App\Http\Controllers\cpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\marc_tag_structure;
use App\marc_subfield_structure;
use App\cat_templates;
use Exception;

class RDAController extends Controller
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
        //
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
    public function store(Request $request) {   

        $obj = null;
        //validate request
        //check for errors
      
        if( !empty($request->input())){

            /*var_export($request->input());*/
            switch ($request->input('_type')) {
                case 'marc_tag_structure':
                    $obj = new marc_tag_structure();
                    break;
                case 'marc_subfield_structure':
                    $obj = new marc_subfield_structure();
                    break;
                case 'cat_templates':
                    $obj = new cat_templates();

                    break;
            }
        }

        try {
           $obj->add($request->input());
           return $obj;
        } catch (Exception $e) {
            if($e->errorInfo[1] == 1062) {
               return 'unique';
            }
        }

        return 'error';
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
    public function edit(Request $request)
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
    public function update(Request $request)
    {   
        if( !empty($request->input())){
             /*var_export($request->input());*/
            switch ($request->input('_type')) {
                case 'marc_tag_structure':
                    $obj = marc_tag_structure::findOrFail($request->input('id'));
                    break;
                case 'marc_subfield_structure':
                    $obj = marc_subfield_structure::findOrFail($request->input('id'));
                    // $obj = new marc_subfield_structure();
                    break;
            }
        }

        $input = $request->all();
        unset($input['id']);
        // var_dump( $input );
        $obj->fill($input)->save();

        return $obj;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->input('type') == 'main_tag'){
            $obj = new marc_tag_structure;

            try {
                $obj->remove($request->input('id'));
                return 'true';
            } catch (Exception $e) {
                var_export($e->errorInfo[2]);
            }
           
        }else{
            $obj = new marc_subfield_structure;
            try {
                $obj->remove($request->input('id'));
                return 'true';
            } catch (Exception $e) {
                var_export($e->errorInfo[2]);
            }
        }
    }

    public function fetch($id, Request $request) {

        $data = array();
        if( $id == 'marc' ){
            // instantiate MARC related classes
            $marc_tag_structure = new marc_tag_structure();
            // fetch marc tags
            $tags = $marc_tag_structure::all();
            // iterate MARC tags
            foreach ($tags as $key => $value) {
               $data[$key] = array_map('strtoupper', $value['attributes']);
            }
            return response()->json(['data' => $data]);
        }
        // instantiate MARC subfields
        $marc_subfields = new marc_subfield_structure();
        // fetch subfield based on marc tag id
        $tag_id = $request->input('id');
        $subfields = $marc_subfields->fetchByKey('id', $tag_id);
        // iterate subfields
        foreach ($subfields as $key => $value) {
            $data[$key] = array_map('strtoupper', $value['attributes']);
        }
        return response()->json(['data' => $data]);
    }



}
