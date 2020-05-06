<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marc_subfield_structure extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marc_subfield_structure';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'sub_id';
    public $timestamps = true;
    protected $fillable = [
        'tagsubfield', 'tagsubfieldname', 'repeatable','id'
    ];

    public function fetchByKey($key, $value){
        return self::where($key, $value)->get();
    }

    public function getTagsubfieldnameBytagSubfieldID($id, $tagsubfield){
        return $this->where('id',$id)->where('tagsubfield',$tagsubfield)->get()->toArray();

    }

    public function add($request){

        $this->tagsubfield = $request['tagsubfield'];
        $this->tagsubfieldname = $request['tagsubfieldname'];
        $this->repeatable = $request['repeatable'];
        $this->id = $request['id'];
        $this->save();
        return $this->sub_id;
    }
    public function remove($id){
       if(self::destroy($id)){
            return true;
       }
       return false;
    }

}
