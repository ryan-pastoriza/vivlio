<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_profile extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_profile';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'full_name', 'gender', 'position', 'contact_no'];

   
}