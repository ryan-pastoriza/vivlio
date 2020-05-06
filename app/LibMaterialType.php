<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibMaterialType extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lib_material_type';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'material_type_id';
    public $timestamps = false;
    protected $fillable = [
            'name', 'description' ,
    ];
}
