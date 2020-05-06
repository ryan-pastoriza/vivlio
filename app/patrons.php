<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patrons extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patrons';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    protected $primaryKey = 'patron_id';
    protected $fillable = ['patron_id', 'barcode', 'sis_id', 'card_number', 'type', 'created', 'expiration', 'status_id'];

    public function patron_information()
    {
        return $this->hasMany(Patron_information::class, 'patron_id');
    }
    public function expiration_history()
    {
        return $this->hasMany(expiration_history::class,'patron_id');
    }
    public function logs()
    {
        return $this->hasMany(logs::class,'patron_id');
    }
    public function fetchPatronsByLast($days){
        $data = [];
        foreach (self::on()->with(['patron_information'])->where( 'created_at', '>', $days)->get()->toArray() as $value) {
            $data[] = ['patron_id'=>$value['patron_id'],'barcode'=>$value['barcode'],'patron_type'=>$value['patron_type'],
                       'full_name'=>$value['patron_information'][0]['full_name'],'course'=>$value['patron_information'][0]['course']];
        }
        return (json_encode($data));
    }
}