<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\marc_subfield_structure;
use App\FieldValue;

class marc_tag_structure extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marc_tag_structure';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'tagfield', 'tagname', 'repeatable', 'record_type',
    ];

    public function add($request){

        $this->tagfield = $request['tagfield'];
        $this->tagname = $request['tagname'];
        $this->repeatable = $request['repeatable'];
        $this->record_type = $request['record_type'];
        $this->save();

       /* if($this->save()){
            return true;
        }*/
        return $this->id;
    }

    public function fix_tag_value($id, $catalog_record_id, $values){

        $marc_subfield_structure = new marc_subfield_structure();

        $subfields = $marc_subfield_structure::where('id', $id)->get(['tagsubfield']);

        $fieldValue = null;
        foreach ($subfields as $key => $value) {

            if( array_key_exists($value->tagsubfield, $values) ){

                if( is_array($values[$value->tagsubfield])  ){
                    // call method to fix array values
                    continue;
                }
                $fieldValue .= '_'.$value->tagsubfield;
                $fieldValue .= $values[$value->tagsubfield];
            }   
        }

        $fieldObj = new FieldValue();
        return $fieldObj->add($id, $catalog_record_id, $fieldValue);    
    }

    public function remove($id){
       if(self::destroy($id)){
            return true;
       }
       return false;
    }

    public function get_id_by_tag_field($tagfield){
         return $this->select('id')->where('tagfield', $tagfield)->get()->first()['id'];
    }
    public function get_id_by_tag_name($tagname){
         return $this->select('id')->whereIn('tagname', $tagname)->get()->first()['id'];
    }

} 
