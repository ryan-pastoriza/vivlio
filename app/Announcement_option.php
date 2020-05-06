<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement_option extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Announcement_option';
    protected $primaryKey = 'ao_id';
    public $timestamps = true;
    protected $fillable = [
        'ao_name',
    ];

    

}

