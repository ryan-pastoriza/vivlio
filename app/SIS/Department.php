<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "department";
    protected $primaryKey = "dep_id";
    protected $fillable = ['dep_name', 'dep_desc'];
}
