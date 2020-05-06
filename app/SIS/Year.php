<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = "year";
    protected $primaryKey = "y_id";

    public function studentSchoolInfo()
    {
    	return $this->belongsTo(StudentSchoolInfo::class, 'ssi_id');
    }

}
