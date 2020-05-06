<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class StudentProgram extends Model
{
    protected $table = "stud_program";
    protected $primaryKey = "sp_id";

    public function studentSchoolInfo()
    {
    	return $this->belongsTo(StudentSchoolInfo::class, 'ssi_id');
    }

    public function programList()
    {
    	return $this->belongsTo(ProgramList::class, 'pl_id');
    }
}
