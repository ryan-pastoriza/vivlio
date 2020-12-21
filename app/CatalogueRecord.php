<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogueRecord extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'catalogue_record';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'catalogue_id';
    public $timestamps = true;
    protected $fillable = [
            'material_type_id', 'call_num', 'remarks', 'price','opac_info',
    ];


    public function add($hasValue = false , $array = array()) {
        // return [$request['material_type_id'],$request['call_num'],$request['price']];
    	
        if( ! $hasValue ){
            $this->save();
            return $this->catalogue_id;
        }


        // return $array;
        $data_i = [];
        foreach ($array as $value) {
            // return $value['name'];
            $data_i[$value['name']] = $value['value'];
            // array_push($data_i, [$value['name'] => $value['value']]);
        }
        // return $data_i;
        // $this->insert($data_i);
    	$this->material_type_id = (isset($data_i['material_type_id']))? $data_i['material_type_id'] : '';
        $this->opac_info = isset($data_i['opac_info']) ? $data_i['opac_info'] : '';
        $this->call_num = isset($data_i['call_num']) ? $data_i['call_num'] : '';
		$this->remarks = isset($data_i['remarks']) ? $data_i['remarks'] : '';
		$this->price = isset($data_i['price']) ? $data_i['price'] : '';
		$this->save();

		return $this->catalogue_id;
    }
    public function editById($catalogue_id, $datas){
        $data_i = [];
        foreach ($datas as $value) {
            // return $value['name'];
            $data_i[$value['name']] = $value['value'];
            // array_push($data_i, [$value['name'] => $value['value']]);
        }
        $this->where('catalogue_id', $catalogue_id)->update($data_i);

        return 0;
    }

    public function addKeyValuePairs($array){

        if( count($array) > 0 ){

            foreach ($array as $key => $value) { 
                $this->{$value['name']} = $value['value'];
            }

            $this->save();
            return $this->catalogue_id;
        }

        return false;
    }

    public function get_record_by_id($catalogue_id) {

        return $this->where('catalogue_id', $catalogue_id)->first()->toArray();

    }

}
