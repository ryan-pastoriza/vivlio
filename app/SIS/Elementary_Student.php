<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Elementary_Student extends Model
{
    protected $table = "elementary_student";
    protected $primaryKey = "hss_id";
    protected $fillable = [
    	'elementary_sch_name', 'elementary_sch_year', 'elementary_sector', 'elementary_status', 'elementary_highest_level',
    	'elementary_academic_honor'

    ];
}
