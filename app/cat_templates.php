<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cat_templates extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cat_templates';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'template_id';
    public $timestamps = false;
    protected $fillable = [
            'template_id', 'template_name', 'description',
    ];

    public function add($request){

        $this->template_name = $request['template_name'];
        $this->description = $request['description'];
        $this->save();

        return $this->template_id;
       
    }


    

}
