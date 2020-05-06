<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expiration_history extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expiration_history';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    protected $primaryKey = 'expiration_id';
    protected $fillable = [
            'patron_id', 'expiration_date' ,
    ];
}
