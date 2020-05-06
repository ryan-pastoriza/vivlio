<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserves extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*table */
    protected $table = 'reserves';
    protected $primaryKey = 'reserve_id';
    public $timestamps = true;
    protected $fillable = [
        'patron_id', 'reserved_date', 'catalogue_record_id', 'copy_id', 'cancel_date', 'remarks', 'priority', 'status'
    ];
    public function getAllReservedItem(){
        $data = [];
        foreach (self::get(['copy_id'])->toArray() as $value) {
            array_push($data, $value['copy_id']);
        }
        return $data;
    }
    public function getReserveItemByCatalogueID($pat_id, $cat_id){
        return self::with(['copies'])->where(['catalogue_record_id'=>$cat_id])->where(['status' => 'pending'])->get();
    }
    public function getReserveItemByPatronID($id){
        return self::with(['copies'])->where('patron_id',$id)->get();
    }
    public function copies() {
        return $this->hasOne(Copies::class, 'copy_id','copy_id');
    }
    public function saveReservation($request){
        $this->patron_id = $request['_patron_id'];
        $this->reserved_date = $request['_reserve_date'];
        $this->catalogue_record_id = $request['_catalogue_id'];
        $this->remarks = $request['_reserve_remarks'];
        $this->status = 'pending';
        $this->priority = $request['_reserve_priority'];
        $this->save();
    }
}

