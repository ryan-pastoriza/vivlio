<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table = "requirements";
    protected $primaryKey = "req_id";
    protected $fillable = ['quantity', 'date'];

    public function studentPersonalInfo()
    {
    	return $this->belongsTo(StudentPersonalInfo::class, 'spi_id');
    }

    public function requirementList()
    {
    	return $this->belongsTo(Requirement_list::class, 'rl_id');
    }
}
