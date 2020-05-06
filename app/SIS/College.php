<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $table = "college";
    protected $primaryKey = "c_id";

    public function collegeRecords()
    {
    	return $this->hasMany(CollegeRecord::class, 'c_id');
    }
}
