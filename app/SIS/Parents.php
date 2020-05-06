<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table = "parents";
    protected $primaryKey = "parent_id";
    protected $fillable = ['fname', 'lname', 'mname', 'suffix', 'occupation', 'birthdate', 'deceased'];

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'parent_address', 'parent_id', 'add_id')->withTimestamps();
    }

    public function studentPersonalInfo()
    {
    	return $this->belongsToMany(StudentPersonalInfo::class, 'parents_student', 'parent_id', 'spi_id');
    }


    public function relationship()
    {
    	return $this->belongsTo(Relationship::class, 'rel_id');
    }
}
