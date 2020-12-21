<?php

namespace App\Http\Controllers\cpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\cat_templates;
use App\marc_tag_structure_cat_templates;
use App\marc_tag_structure;
use App\marc_subfield_structure;

class TemplateController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function populate(Request $request){

		$obj = new cat_templates();
		$templateModels = $obj::all()->toArray();

		if( $request->input('type') == 'json' ){
			return response()->json(array('data' => $templateModels));
		}

		return response()->json($templateModels);
	}

	public function add_to_template(Request $request) {

		# additional - check if this template is being used in catalog.
		# if it is. do not allow the update. . .
		$tags = $request->input('tags');
		$template_id = $request->input('template_id');

		$marc_tag_structure_cat_templates = new marc_tag_structure_cat_templates();
		$exists = $marc_tag_structure_cat_templates->where('template_id', $template_id)->get()->first();
		
		if( $exists != null ){
			$marc_tag_structure_cat_templates->where('template_id', $template_id)->delete();
		}

		$array = array();
		foreach ($tags as $key => $value) {
			$array[$key]['id'] = $value;
			$array[$key]['template_id'] = $template_id;
		}

		if($marc_tag_structure_cat_templates::insert($array)){
			return 'true';
		}

		return 0;
	}

	public function remove_template(Request $request){
		$template_id = $request->input('template_id');
		if( marc_tag_structure_cat_templates::where(['template_id'=>$template_id])->delete() ){
			if( cat_templates::where(['template_id'=>$template_id])->delete() ){
				return 1;
			}
			return 2;
		}
		return 0;
		
	}

	public function fetch_tags(Request $request){
		
		$template_id = $request->input('template_id');
		$marc_tag_structure_cat_templates = new marc_tag_structure_cat_templates();
		$tags = $marc_tag_structure_cat_templates->where('template_id', $template_id)->get()->toArray();

		if( null !== $request->input('flag') ){
			$templates = $this->fetch_templates($tags);
			// return $templates;
			return view('technical.catalogue.template_records', [ 'data' => $templates]);
			// return $this->fetch_templates($tags);
		}
		
		return response()->json( $tags );
	}

	private function fetch_templates($tags){
		
		$ids = array();
		$marc = new marc_tag_structure();
		// instantiate MARC subfields
        $marc_subfields = new marc_subfield_structure();
		foreach ($tags as $key => $value) {
			$ids[] = $value['id'];
		}

		$templates = $marc::whereIn('id', $ids)->get(['*'])->toArray();

		foreach ($templates as $key => $value) {
			
			$templates[$key]['subfield'] = $marc_subfields->fetchByKey('id', $value['id'])->toArray();
		}

		// $subfields = $marc_subfields->fetchByKey('id', $tag_id);

		return $templates;
		// var_export($templates);

	}

}
