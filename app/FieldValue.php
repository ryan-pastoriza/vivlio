<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 
class FieldValue extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'field_value';

  	 /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $primaryKey = 'field_id';
    public $timestamps = true;
    protected $fillable = [
        'id', 'catalogue_id', 'value',
    ];

    public function add($id, $catalogue_id, $value) {

    	$this->id = $id;
    	$this->catalogue_id = $catalogue_id;
    	$this->value = $value;
    	$this->save();
    	return $this->field_id;
    }
    public function get_catalogue_id($id){
        return $this->where('field_id',$id)->get(['catalogue_id']);


    }
    public function get_isbn($id, $isbn){
        
        // $return = $this->where('value', 'LIKE', "%$isbn%")->get()->toArray();
        $return = $this->where('id', $id)->where('lower(value)', 'LIKE', "%_a$isbn"."%")->get()->toArray();

        if( count($return) ){
            return $return;
        }
        return 0;
    }
    public function updateWithID($id, $value){
        
        // $return = $this->where('value', 'LIKE', "%$isbn%")->get()->toArray();
        // $return = $this->where('id', $id)->where('value', 'LIKE', "%_a$isbn"."_%")->get()->toArray();
        return $this->where('field_id', '=', $id)->update(['value' => $value]);
        
    }

    public function retrieve($catalogue_id) {

        return $this->where('catalogue_id', $catalogue_id)->get()->toArray();

    }

    // public function accession() {

    //      $records = DB::table('field_value')
    //                 ->join('catalogue_record', 'field_value.catalogue_id', '=', 'catalogue_record.catalogue_id')
    //                 ->join('marc_tag_structure', 'field_value.id', '=', 'marc_tag_structure.id')
    //                 ->get(['field_value.field_id',
    //                         'field_value.id',
    //                         'field_value.value',
    //                         'catalogue_record.catalogue_id',
    //                         'catalogue_record.material_type_id',
    //                         'catalogue_record.call_num',
    //                         'catalogue_record.remarks',
    //                         'catalogue_record.price',
    //                         'marc_tag_structure.tagfield',
    //                         'marc_tag_structure.tagname'])->toArray();

    //     return $records;

    // }


    public function accession_by_id($catalogue_id){

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


              $data = DB::table('field_value')
                ->join('catalogue_record', 'field_value.catalogue_id', '=', 'catalogue_record.catalogue_id')
                ->join('marc_tag_structure', 'field_value.id', '=', 'marc_tag_structure.id')
                ->where('catalogue_record.catalogue_id', '=', $catalogue_id)
                ->whereIn('marc_tag_structure.tagfield', array('100', '245', '250', '440', '300', '264', '020'))
                ->orderBy('marc_tag_structure.id', 'asc')
                ->get(['marc_tag_structure.id',
                        'marc_tag_structure.tagfield',
                        'marc_tag_structure.tagname',
                        'marc_tag_structure.repeatable',
                        'marc_tag_structure.record_type',
                        'marc_tag_structure.created_at',
                        'marc_tag_structure.updated_at',
                        'field_value.field_id',
                        'field_value.value',
                        'field_value.created_at',
                        'field_value.updated_at'])->toArray();

        return $data;

    }



    
    // public function accession_by_id($catalogue_id){

    //           $data = DB::table('field_value')
    //             ->join('catalogue_record', 'field_value.catalogue_id', '=', 'catalogue_record.catalogue_id')
    //             ->join('marc_tag_structure', 'field_value.id', '=', 'marc_tag_structure.id')
    //             ->where('catalogue_record.catalogue_id', '=', $catalogue_id)
    //             ->get(['marc_tag_structure.id',
    //                     'marc_tag_structure.tagfield',
    //                     'marc_tag_structure.tagname',
    //                     'marc_tag_structure.repeatable',
    //                     'marc_tag_structure.record_type',
    //                     'marc_tag_structure.created_at',
    //                     'marc_tag_structure.updated_at',
    //                     'field_value.field_id',
    //                     'field_value.value',
    //                     'field_value.created_at',
    //                     'field_value.updated_at'])->toArray();

    //     return $data;

    // }

    // public function accession_by_id($catalogue_id) {
        

    //     $data = DB::table('field_value')
    //             ->join('catalogue_record', 'field_value.catalogue_id', '=', 'catalogue_record.catalogue_id')
    //             ->join('marc_tag_structure', 'field_value.id', '=', 'marc_tag_structure.id')
    //             ->where('catalogue_record.catalogue_id', '=', $catalogue_id)
    //             ->get(['marc_tag_structure.id',
    //                     'marc_tag_structure.tagfield',
    //                     'marc_tag_structure.tagname',
    //                     'marc_tag_structure.repeatable',
    //                     'marc_tag_structure.record_type',
    //                     'marc_tag_structure.created_at',
    //                     'marc_tag_structure.updated_at',
    //                     'field_value.field_id',
    //                     'field_value.value',
    //                     'field_value.created_at',
    //                     'field_value.updated_at',
    //                     'catalogue_record.catalogue_id',
    //                     'catalogue_record.material_type_id',
    //                     'catalogue_record.call_num',
    //                     'catalogue_record.remarks',
    //                     'catalogue_record.price',
    //                     'catalogue_record.created_at',
    //                     'catalogue_record.updated_at'])->toArray();

    //     return $data;

    // }

    public function accession_by_tag_and_subLet($tagID, $subLetter) {

        
    }

}
