<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class CollegeRecord extends Model
{
    protected $table = "college_record";
    protected $primaryKey = "cr_id";

    public function college()
    {
    	return $this->belongsTo(College::class, 'c_id');
    }

    public function studentPersonalInfo()
    {
    	return $this->belongsTo(StudentPersonalInfo::class, 'spi_id');
    }
}
