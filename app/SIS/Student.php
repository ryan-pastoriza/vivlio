<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";
    protected $primaryKey = "stud_id";

    public function studentPersonalInfo()
    {
    	return $this->belongsTo(StudentPersonalInfo::class, 'spi_id');
    }
}
