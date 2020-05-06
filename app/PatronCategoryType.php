<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatronCategoryType extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patron_category_type';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'category_type_id';
    public $timestamps = false;
    protected $fillable = [
            'category_name', 'description',
    ];
}