<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fines extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fines';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'f_id';
    public $timestamps = true;
    protected $fillable = [
            'patron_id', 'loan_id', 'amount', 'type', 'status', 'remarks'
    ];

    public function total($patron_id){
        $total = 0;
        foreach (self::where(['patron_id'=>$patron_id])->get() as $key => $v) {
               $total += floatval($v->amount);
        }
        return number_format($total, 2, '.', '');
    }
}