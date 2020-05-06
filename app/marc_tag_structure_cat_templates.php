<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marc_tag_structure_cat_templates extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marc_tag_structure_cat_templates';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    protected $fillable = [
            'id', 'template_id' ,
    ];


    

}
