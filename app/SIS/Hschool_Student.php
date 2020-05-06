<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Hschool_Student extends Model
{
    protected $table = "hschool_student";
    protected $primaryKey = "hss_id";
    protected $fillable = ['sch_name', 'sch_year', 'highest_level','sector', 'status', 'type', 'program'];
}
