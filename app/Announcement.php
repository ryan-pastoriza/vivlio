<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'announcement';
    protected $primaryKey = 'a_id';
    protected $fillable = [
        'title', 'status', 'description', 'ao_id',
    ];

    public function announcement_opt()
    {
        return $this->hasMany(Announcement_option::class, 'ao_id');
    }

}

