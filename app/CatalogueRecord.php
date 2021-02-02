<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Copies;

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
			'material_type_id', 'call_num', 'remarks', 'price','opac_info','accession_info','up_opac','up_acc'
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

    private function getValuebyCatIDTagFieldandCode($catID,$tagfield,$subField){
        $tagFieldID = marc_tag_structure::where('tagfield',$tagfield)->select(['id'])->first()['id'];
        $fv = array_slice(explode('_',FieldValue::where(['id'=>$tagFieldID,'catalogue_id'=>$catID])->first()['value']),1);
        foreach ($fv as $value) {
            if($subField==$value[0]){
                if( strlen($value)>1 ){
                    return substr($value, 1);
                }else{
                    return null;
                }
            }
        }
        return null;
    }

	public function get_record_by_id($catalogue_id) {

		return $this->where('catalogue_id', $catalogue_id)->first()->toArray();

	}

	public function getOPAC($catalogue_id){
		$cat_rec = CatalogueRecord::where('catalogue_id',$catalogue_id)->get(['call_num','material_type_id','opac_info','up_opac'])->first();
		$opac = $cat_rec->opac_info;
		if($cat_rec->up_opac){
			$title 				= $this->getValuebyCatIDTagFieldandCode($catalogue_id,'245','a');
			$call_num			= $cat_rec->call_num;
			$edition 			= $this->getValuebyCatIDTagFieldandCode($catalogue_id,'250','a');
			$isbnIssn			= $this->getValuebyCatIDTagFieldandCode($catalogue_id,'020','a');
			if($isbnIssn == null){
				$isbnIssn		= $this->getValuebyCatIDTagFieldandCode($catalogue_id,'022','a');
			}
			$author 			= $this->getValuebyCatIDTagFieldandCode($catalogue_id,'100','a');
			$datePub 			= $this->getValuebyCatIDTagFieldandCode($catalogue_id,'264','c');
			$publisher 			= $this->getValuebyCatIDTagFieldandCode($catalogue_id,'264','b');
			$physDesc 			= $this->getValuebyCatIDTagFieldandCode($catalogue_id,'300','a');
			$copiesNum 			= Copies::where('status','available')->where('catalogue_id', $catalogue_id)->count();
			$copiesTotal 		= Copies::where('catalogue_id', $catalogue_id)->count();
			// Catalogue ID
			$matType 			= LibMaterialType::where('material_type_id',$cat_rec->material_type_id)->get(['name'])->first();
			$matType 			= sizeof($matType) >0 ? $matType->name:'N/A';
			CatalogueRecord::
			where('catalogue_id',$catalogue_id)
			->update([
				'opac_info' 	=> $title.'_-OPAC-_'.$call_num.'_-OPAC-_'.$edition.'_-OPAC-_'.$isbnIssn.'_-OPAC-_'.$author.'_-OPAC-_'.$datePub.'_-OPAC-_'.$publisher.'_-OPAC-_'.$physDesc.'_-OPAC-_'.$copiesNum.'_-OPAC-_'.$copiesTotal.'_-OPAC-_'.$catalogue_id.'_-OPAC-_'.$matType.'_-OPAC-_'.$matType,
				'up_opac' 		=> 0
			]);
			return [$title,$call_num,$edition,$isbnIssn,$author,$datePub,$publisher,$physDesc,$copiesNum,$copiesTotal,$catalogue_id,$matType,$matType];
			
		}else{
			return explode('_-OPAC-_', $opac);
		}

	}
	public function getAccession($catalogue_id){
		$copies       = new Copies();
		$cat_rec = CatalogueRecord::where('catalogue_id',$catalogue_id)->get(['call_num','material_type_id','accession_info','up_acc'])->first();
		$id = $catalogue_id;
		if($cat_rec->up_acc){
			$record = $this->get_record_by_id($id);

			$isbnIssn			= $this->getValuebyCatIDTagFieldandCode($id,'020','a');
			if($isbnIssn == null){
				$isbnIssn		= $this->getValuebyCatIDTagFieldandCode($id,'022','a');
			}
			$callNum			= $record['call_num'];
			$author				= $this->getValuebyCatIDTagFieldandCode($id,'100','a');
			$title				= $this->getValuebyCatIDTagFieldandCode($id,'245','a');
			$edition			= $this->getValuebyCatIDTagFieldandCode($id,'250','a');
			$volume				= $this->getValuebyCatIDTagFieldandCode($id,'490','v');
			if($volume == null){
				$volume 		= $this->getValuebyCatIDTagFieldandCode($id,'440','v');
			}
			$pages				= $this->getValuebyCatIDTagFieldandCode($id,'300','a');
			$price				= $record['price'];
			$copyAmt			= $copies::where('catalogue_id', $id)->get()->count();
			$publishingHouse	= $this->getValuebyCatIDTagFieldandCode($id,'264','b');
			$copyYear			= $this->getValuebyCatIDTagFieldandCode($id,'264','c');

			CatalogueRecord::
			where('catalogue_id',$id)
				->update([
					'accession_info' 	=> $isbnIssn.'_-ACCINFO-_'.$callNum.'_-ACCINFO-_'.$author.'_-ACCINFO-_'.$title.'_-ACCINFO-_'.$edition.'_-ACCINFO-_'.$volume.'_-ACCINFO-_'.$pages.'_-ACCINFO-_'.$price.'_-ACCINFO-_'.$copyAmt.'_-ACCINFO-_'.$publishingHouse.'_-ACCINFO-_'.$copyYear,
					'up_acc' 		=> 0
				]);

			return [$isbnIssn,$callNum,$author,$title,$edition,$volume,$pages,$price,$copyAmt,$publishingHouse,$copyYear];
		}else{
			return explode('_-ACCINFO-_',$cat_rec->accession_info);
		}
	}

}
