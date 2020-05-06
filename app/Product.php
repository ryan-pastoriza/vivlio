<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'product';
    protected $primaryKey = 'p_id';
    public $timestamps = true;
    protected $fillable = [
        'c_id', 'p_name', 'p_description', 'p_creator'
    ];

}

