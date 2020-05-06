<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Requirement_List extends Model
{
    protected $table = "requirements_list";
    protected $primaryKey = "rl_id";

    public function requirements()
    {
        return $this->hasMany(Requirement::class, 'rl_id');
    }
}
