<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class ProgramList extends Model
{
    protected $table = "program_list";
    protected $primaryKey = "pl_id";

    public function studentPrograms()
    {
        return $this->hasMany(StudentProgram::class, 'pl_id');
    }

    
    public function scopeSearchLevel($query, $level)
	{
	  	$query->whereHas('programList', function ($q) use ($level) {
	    	$q->where('level', '=', "$level");
	  	});
	}
}
