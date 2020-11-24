<?php

namespace App\Http\Controllers\technical;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LibMaterialType;
use App\CatalogueRecord;
use App\marc_tag_structure;
use App\cat_templates;
use App\marc_tag_structure_cat_templates;
use App\marc_subfield_structure;
use App\FieldValue;
use App\Copies;
use App\Reserves;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function fetch(Request $request) {

        $lib_material_type = new LibMaterialType();
        return $lib_material_type::all();   
    }

    public function store(Request $request) {
        $catalogue_record = new CatalogueRecord();
        $marc = new marc_tag_structure();
        $marcSub = new marc_subfield_structure();
        $fieldVal = new FieldValue();
        $catalogue_id = $catalogue_record::create([
            'material_type_id'  =>  $request->input('material_type_id'),
            'call_num'          =>  $request->input('call_num'),
            'remarks'           =>  $request->input('remarks'),
            'price'             =>  $request->input('price')
        ]);

        foreach ($request->input() as $k => $v) {
            if( in_array($k, array('_token','material_type_id','call_num','remarks','price')) ){
                continue;
            }
            // print_r($k);
            // print_r(' = ');
            // print_r($v);

            $id = $marc->get_id_by_tag_field($k);
            $letters = $marcSub::select('tagsubfield')->where('id',$id)->get();
            // print_r($letters);
            $val = '';
            foreach ($letters as $letter) {
                // echo '<pre>';
                // echo $letter;
                // echo '</pre>';
                // echo '<pre>';
                // print_r($v);
                // echo '</pre>';

                $val .= "_".$letter['tagsubfield'];
                $val .= (isset($v[$letter['tagsubfield']])) ? $v[$letter['tagsubfield']] : '';
                // print_r($val);

            }
            // echo $id;
            // echo $catalogue_id['catalogue_id'];
            // echo $val;
            $fieldVal::create([
                'id'                =>  $id,
                'catalogue_id'      =>  $catalogue_id['catalogue_id'],
                'value'             =>  $val
            ]);
        }

        return "success";
        //validate request
        //check for errors
        /* -------------------------- */
        // $templateVals = DB::table('cat_templates') 
        //         ->join('marc_tag_structure_cat_templates', 'marc_tag_structure_cat_templates.template_id', '=',  'cat_templates.template_id')
        //         ->join('marc_tag_structure', 'marc_tag_structure_cat_templates.id', '=' , 'marc_tag_structure.id')
        //         ->groupBy('marc_tag_structure.tagfield')
        //         ->get(['marc_tag_structure.tagfield', 'marc_tag_structure.tagname', 'marc_tag_structure_cat_templates.id']);
        // /* -------------------------- */
        // // main record. without marc tags.
        // $catalogue_record = new CatalogueRecord();
        // $marcObj = new marc_tag_structure();
        // /* -------------------------- */
        // // fill in attributes in obj - insert record should follow.
        // $catalogue_id = $catalogue_record->add($request->input());
        // /* -------------------------- */
        // foreach ($templateVals as $key => $value) {
        //     $value->value = null;
        //     $marcObj->fix_tag_value($value->id, $catalogue_id, $request->input($value->tagfield));
        //     // break;
        // }
        /* -------------------------- */
        // return $catalogue_id;
    }
    public function add_copy(Request $request){

        $copy = new Copies();

        // return $request->input();
        $copy->acc_num = $request->input('acc_num');
        $copy->catalogue_id = $request->input('catalogue_id');
        $copy->barcode = $request->input('barcode');
        $copy->source = $request->input('source');
        $copy->status = 'available';
        $copy->note = $request->input('note');
        $copy->issues = $request->input('issues');
        $copy->date_received = $request->input('date_received');
        $copy->copy_number = Copies::where('catalogue_id',$request->input('catalogue_id'))->max('copy_number')+1;
        

        if ( $result = $copy->save() ){
            return 1;
        }

        return 0;
        
    }
    public function get_copies(Request $request){

        $catalogue_id = $request->input('catalogue_id');
        
        $copy = new Copies();
        $copies = $copy->where('catalogue_id', $catalogue_id)->get()->toArray();
        // $catRec = CatalogueRecord::where('catalogue_id', $catalogue_id)->get()->toArray();
        // var_dump($copies);
        // var_dump($catRec);
        return $copies;
    }
    public function populate(){
        /* -------------------------- */
        $records = DB::table('catalogue_record')
                    ->join('lib_material_type', 'catalogue_record.material_type_id', '=', 'lib_material_type.material_type_id')
                    ->get(['lib_material_type.name as material_name',
                            'catalogue_record.catalogue_id',
                            'catalogue_record.material_type_id',
                            'catalogue_record.call_num',
                            'catalogue_record.remarks',
                            'catalogue_record.price'])->toArray();
        /*-------------------------- */
        $marc = new marc_tag_structure();
        $basic = $marc::whereIn('tagfield', ['245', '100', '250', '264'])->get(['id'])->toArray();
        // $title = $marc::where('tagfield', '245')->get(['id'])->first();
        // 245 - title statement, 100 - main entry, 250 - edition statement
        foreach ($records as $key => $value) {
            $fieldValue = new FieldValue();
            // fetch ---- so to speak.. .
            $fields = $fieldValue::where('catalogue_id', $value->catalogue_id)
                                    ->whereIn('id', $basic)
                                    ->get(['id', 'field_id', 'value'])
                                    ->toArray();

            $arr = array( 'author', 'title', 'edition', 'year' );

            # sequence - author, title, edition, publisher
            foreach ($fields as $k => $v) {
                    
                $val = explode('_', $fields[$k]['value']);
                array_splice($val, 0, 1);

                $substr = function($el) {
                    return strtoupper(substr($el, 1, strlen($el)));
                };

                if( $arr[$k] == 'year' ){
                    $newVal = array_map($substr, $val)[2];
                    $value->{$arr[$k]} = $newVal;
                    continue;
                }

                $newVal = array_map($substr, $val)[0];
                $value->{$arr[$k]} = $newVal;
            }
        }
      
        /* -------------------------- */
        return response()->json(['data' => $records]); 
        // return $records;
    }

    public function deleteMarc(Request $request){
        $cat_id = $request->catalogue_id;
        $res = Reserves::where('catalogue_record_id',$cat_id)->count();
        // $res->where('catalogue_record_id',$request->catalogue_id)->count();
        // echo $res;
        if(0==$res){

            $cp = Copies::where('catalogue_id', $cat_id)->delete();
            
            $fv = FieldValue::where('catalogue_id', $cat_id)->delete();
            // echo 'asdasd';
            $cr = CatalogueRecord::where('catalogue_id', $cat_id)->delete();
            
            return $cr;

        }
        // echo $res;
        // echo $request->catalogue_id;
        // return $res;


    }

    public function accession_book(){
        /* -------------------------- */
      	ini_set('max_execution_time',9999999);
        $fv           = new FieldValue();
        $cr           = new CatalogueRecord();
        $ids          = CatalogueRecord::orderBy('catalogue_id', 'ASC')->pluck('catalogue_id')->toArray();
        $copies       = new Copies();


        $records = array();

        // call_number         catalogue_record     ['call_num']
        // author              fv                   [''] tag100 A
        // title               fv                   [''] tag245 A
        // edition             fv                   [''] tag250 A
        // volume              fv                   [''] tag440 V
        // pages               fv                   [''] tag300 A
        // price               catalogue_record     ['price']
        // copies              Copies               count(['copy_id'])
        // publishinghouse     fv                   [''] tag264 B
        // copyright year      fv                   [''] tag264 C
        // isbn                fv                   [''] tag020 A



        foreach ($ids as $id) {
            
            $records[$id] = $cr->get_record_by_id($id);
            $records[$id]['copies'] = $copies::where('catalogue_id', $id)->get()->count();
            $records[$id][] = $fv->accession_by_id($id);

            // echo '<pre>';
            //     var_export($records);
            // echo '</pre>';

            // break;

        }

        // $array        = array('call_number', 'author', 'title', 'edition', 'volume');
        // $records = array();
        
        // if( count($ids) ) {
            
        //     foreach ($ids as $id) {
                
                // $records[$id] = $fv->accession_by_id($id);
                // echo '<pre>';
                // var_export($fv->accessionByCatalogueId($id));
                // echo '</pre>';
                // break;
        //     }
        // }
        // $records            = $fv->accession();
        
        // return response()->json(['data' => $records]);
        // dd($records);
        return view('technical.catalogue.accession_book', compact(['records']));

    }

    public function view_catalog_record(Request $request){

        $record = DB::table('catalogue_record')
                    ->join('lib_material_type', 'catalogue_record.material_type_id', '=', 'lib_material_type.material_type_id')
                    ->where('catalogue_record.catalogue_id', $request->input('id'))
                    ->get(['lib_material_type.name as material_name',
                            'catalogue_record.catalogue_id',
                            'catalogue_record.material_type_id',
                            'catalogue_record.call_num',
                            'catalogue_record.remarks',
                            'catalogue_record.price'])->toArray();

        $lib_material_type = new LibMaterialType();
        $material_types = response()->json($lib_material_type::all()->toArray());

        $records = $this->get_record($request->input('id'));
        $data = [$record, $records, $material_types];
        // $catalogue_record = $this->get_record($request->input('id'));
        // $array = array();
        // $data = [$catalogue_record, $array];
        return view('technical.catalogue.view_catalog', compact('data'));
    }
    private function get_record($id){

        # basic cataloging
        # id - 14, 15, 16, 17, 18, 19, 20
        # tagfield 020, 100, 245, 250, 264, 300, 490
        // $catalogue_record = new CatalogueRecord();
        $marc = new marc_tag_structure(); 
        $basic = $marc::whereIn('tagfield', ['020', '100', '245', '250', '264', '300', '490'])->get(['id'])->toArray();

        $array = array('isbn', 'main_entry', 'title_statement', 'edition_statement', 'publication', 'physical_description', 'series_statement');
        $records = array();

        $arrID = array();
        foreach ($basic as $key => $value) {
            $arrID[$key] = $value['id'];
        }

        $fieldValue = new FieldValue();
        $fields = $fieldValue::where('catalogue_id', $id)
                                    ->whereIn('id', $arrID)
                                    ->get(['id', 'field_id', 'value'])
                                    ->toArray();

        foreach ($fields as $k => $v) {
            
            $val = explode('_', $fields[$k]['value']);
         
            $substr = function($el) {
                $fieldValue = strtoupper(substr($el, 1, strlen($el)));
                $subfield = substr($el, 0, 1);
                $return = array($subfield, $fieldValue);
                return $return;
            };

            $newVal = array_map($substr, $val);
            foreach ($newVal as $k1 => $v1) {
                $records[$array[$k]][$v1[0]] = $v1[1];
            }
          
        }
        return $records;
    }
    public function get_record_by_isbn(Request $request){
        $return = [];

        $isbn = $request->input('isbn');

        $marc = new marc_tag_structure();
        $fv = new FieldValue();
        $msfs = new marc_subfield_structure();
        $cr = new CatalogueRecord();
        $id = $marc->get_id_by_tag_field('020');
        $catalogInfo = null;
        # check if isbn is null;
        // echo $id;
        $values = $fv->get_isbn($id, $isbn);
        $catalogue_id = null;

        // echo '<pre>';
        // echo var_dump($values);
        // echo '</pre>';

        if($values == 0){
            return json_encode(['catInfo'=>null]);
        }
        
        foreach ($values as $val) {
            // print_r(explode('_',$val['value']));
            // print_r('a'.$isbn);
            // print_r(explode('_',$val['value'])[1]=='a'.$isbn);
            if(explode('_',$val['value'])[1]=='a'.$isbn){
                $catalogue_id = $val['catalogue_id'];
                $catalogInfo = $cr->get_record_by_id($catalogue_id);
                // print_r($catalogInfo);
                $marcId = $val['id'];
                $tagValues = $fv->retrieve($catalogue_id);
                // print_r($tagValues);
                foreach ($tagValues as $val2) {
                    // print_r($val2);
                    $temp = $marc->where('id',$val2['id'])->get()->toArray();
                    // print_r($return);
                    $tempsubfield = [];
                    foreach (explode('_',$val2['value']) as $val3) {
                        if(strlen($val3) >0){
                            // echo '<br>';
                            // print_r($val2['id']);
                            // echo '<br>';
                            // print_r(substr($val3,0,1));
                            // echo '<br>';
                            // print_r($msfs->getTagsubfieldnameBytagSubfieldID($val2['id'],substr($val3,0,1)));   
                            $tempsub = $msfs->getTagsubfieldnameBytagSubfieldID($val2['id'],substr($val3,0,1));
                            $tempsub[0]['tagsubfieldvalue'] = substr($val3,1);
                            // echo '<pre>';
                            // print_r($val3);
                            // print_r(substr($val3,0,1));
                            // print_r(substr($val3,1));
                            // var_dump($tempsub);
                            // echo '</pre><br><br>';
                            array_push($tempsubfield,$tempsub[0]);
                        }   

                    }
                    $temp[0]['field_id'] = $val2['field_id'];
                    $temp[0]['subfield'] =  $tempsubfield;
                    array_push($return,$temp[0]);
                }
            }
        }
        // return $return;
        // return $return;
        return  json_encode(['view' => view('technical.catalogue.template_records', [ 'data' => $return])->render(), 'catInfo' => $catalogInfo] );
        // if( $values ){

        //     // $catalogue_id = $values['catalogue_id'];
        //     // var_dump($fv->retrieve($catalogue_id));
        //     // return $catalogue_id;
        // }
        // return 0;
    }

    public function add_marc_record(Request $request) {

        // $c_data = $request->input('form');
        $catalogue_record = new CatalogueRecord();
        // $catalogue_id = $catalogue_record->add($request->input());
        // $catalogue_id = $catalogue_record->addKeyValuePairs($c_data);
        
        // create catalogue_record.
        // return $request;
        $catalogue_id = $catalogue_record->add($hasValue=true, $array = $request->input('form'));
        // return $catalogue_id;
        if( $catalogue_id > 0 ){

            $m_data = (array)json_decode($request->input('marc_records'));
            $arr = array();

            foreach ($m_data as $key => $value) { 
                $values = null;
                $records = explode('_', $value->records);
                $tag_id = $records[0];
                // $tagfield = $records[1];
                // $subfield_id = $records[2];
                $subfield = substr($records[count($records) - 1], 0, 1);
                $subfieldValue = substr($records[count($records) - 1], 1, strlen($records[count($records) - 1]));
                // $values .= '_'.$subfield.$subfieldValue;
                // $fieldObj->add($tag_id, $catalogue_id,)
                if( array_key_exists($tag_id, $arr) ){
                    $arr[$tag_id][] = '_'.$subfield.$subfieldValue;
                }else{
                    $arr[$tag_id][] = '_'.$subfield.$subfieldValue;
                }
            }

            foreach ($arr as $key => $value) {
                $fieldObj = new FieldValue();
                $fieldObj->add($key, $catalogue_id, implode('', $value));
            }
            return $catalogue_id;
        }
        return 0;
    }

    public function update_marc_record(Request $request) {

        $catalogue_record = new CatalogueRecord();

        $fieldObj = new FieldValue();
        $arr = array();
        $retData = (array)json_decode($request->input('marc_records'));
        $toRet = 0;
        $catalogue_id = null;
        // print_r($retData);
        foreach ($retData as $key => $value) {
            // print_r($value);
            // print_r($key);
            $records = explode('_', $value->records);
            // print_r($records);
            $fv_id = $records[0];
            $catalogue_id = $fieldObj->get_catalogue_id($fv_id)[0]['catalogue_id'];
            // return $catalogue_id;

            // $subfield = substr($records[count($records) - 1], 0, 1);
            // $subfieldValue = substr($records[count($records) - 1], 1, strlen($records[count($records) - 1]));
            if( array_key_exists($fv_id, $arr) ){
                // print_r('_'.$records[4]);
                $arr[$fv_id] .= '_'.$records[4];
            }else{
                // print_r('_'.$records[4]);
                $arr[$fv_id] = '_'.$records[4];
            }
        }
        foreach ($arr as $key => $value) {
            $toRet += $fieldObj->updateWithID($key,$value);
        }
        $toRet += $catalogue_record->editById($catalogue_id, $array = $request->input('form'));
        return $toRet;

    }

    public function getQuickEditInfo(Request $request){
        $cr = CatalogueRecord::find($request->input('catID'));
        // return $cr;
        // return $cr->catalogue_id;

        $fvs = FieldValue::where('catalogue_id',$cr->catalogue_id)->get();
        $cr->fieldValues = $fvs;
        return $cr;
    }

    public function editQuick(Request $request){
        $catID =$request->input('catalogue_id');
        $values = $request->input('val');
        // echo $request->input('call_num');
        // echo $request->input('material_type_id');
        // echo $request->input('price');
        // echo $request->input('remarks');
        $cr = CatalogueRecord::find($catID)->update(
            ['call_num'=>$request->input('call_num'),
            'material_type_id'=>$request->input('material_type_id'),
            'price'=>$request->input('price'),
            'remarks'=>$request->input('remarks')]
        );
        // echo $cr;

        foreach ($values as $key => $value) {
            $fvs = FieldValue::where('catalogue_id',$catID)
            ->where('id', $key)->first();
            $valueToUpdate = explode('_',$fvs->value);
            foreach ($value as $k => $v) {
                for ($i = 0; $i < sizeOf($valueToUpdate); $i++) {
                    if($k == substr($valueToUpdate[$i],0,1)){
                        $valueToUpdate[$i] = $k.$v;
                    }                    

                }
            }
            $newVal = implode("_", $valueToUpdate);
            $fv = FieldValue::find($fvs->field_id)->update(['value'=> $newVal]);
            // echo $fv;
        }
        return 'success';

    }

}
