<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class StudentImage extends Model
{
    protected $table = "stud_image";
    protected $primaryKey = "simg_id";

    public function studentPersonalInfo()
    {
    	return $this->belongsTo(StudentPersonalInfo::class, 'spi_id');
    }
}
