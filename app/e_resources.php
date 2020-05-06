<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class E_resources extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'e_resources';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'res_id';
    public $timestamps = true;
    protected $fillable = [
        'name', 'edition', 'type', 'description'
    ];
    public function saveData($data,$ext){
       $this->name = $data['res_name'];
       $this->edition = $data['res_edition'];
       $this->type = $ext;
       $this->description = $data['res_description'];
       if( $this->save() ){
           return true;
       }else{
           return false;
       }
    }
    public function fetchResources(){
        $d = self::orderBy('created_at', 'desc')->get()->toArray();
        if(count($d) > 0){
            return $d;
        }else{
            return 0;
        }
       
    }
}
