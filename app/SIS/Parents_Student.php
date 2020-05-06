<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Parents_Student extends Model
{
    protected $table = "parents_student";
    protected $primaryKey = "ps_id";

    public function stud_per_info()
    {
    	// $this->hasMany(Stud_Per_Info::class);
    	$this->belongsToMany(Stud_Per_Info::class, 'spi_id');
    }
}
