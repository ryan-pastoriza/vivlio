<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class StudentSchoolInfo extends Model
{
    protected $table = "stud_sch_info";
    protected $primaryKey = "ssi_id";

    public function studentPersonalInfo()
    {
    	return $this->belongsTo(StudentPersonalInfo::class, 'spi_id');
    }

    public function years()
    {
    	return $this->hasMany(Year::class, 'ssi_id');
    }

    public function studentType()
    {
    	return $this->belongsTo(StudentType::class, 'st_id');
    }

    public function studentPrograms()
    {
    	return $this->hasMany(StudentProgram::class, 'ssi_id');
    }

    public function scholarships()
    {
        return $this->hasMany(Scholarship::class, 'ssi_id');
    }
}
