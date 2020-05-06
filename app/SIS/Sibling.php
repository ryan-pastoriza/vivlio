<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Sibling extends Model
{
    protected $table = "siblings";
    protected $primaryKey = "sib_id";

    public function studentPersonalInfo()
    {
    	return $this->belongsTo(StudentPersonalInfo::class, 'spi_id');
    }
}
