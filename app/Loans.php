<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'loans';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'loan_id';
    public $timestamps = true;
    protected $fillable = [
            'patron_id', 'acc_num', 'due_date', 'returned', 'returned_date', 'loaned_date' ,
    ];
    public function count($arry=[])
    {
        return count(self::where($arry)->get());
    }

}
