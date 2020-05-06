<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class StudentPersonalInfo extends Model
{
    protected $table = "stud_per_info";
    protected $primaryKey = "spi_id";
    protected $fillable = ['fname', 'mname', 'lname', 'suffix', 'birthdate', 'birthplace','gender', 'civ_status', 'blood_type', 'weight', 'height'];


    public function addresses()
    {
        return $this->belongsToMany(Address::class, 's_main_address', 'spi_id', 'add_id')->withTimestamps();
    }

    public function citizenship()
    {
    	return $this->belongsTo(Citizenship::class, 'cit_id');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'language_student', 'spi_id', 'language_id')->withTimestamps();
    }

    public function studentSchoolInfo()
    {
    	return $this->hasOne(StudentSchoolInfo::class, 'spi_id');
    }

   	public function parents()
    {
    	// $this->hasMany(Stud_Per_Info::class);
    	// return $this->belongsToMany(Parents::class);
    	return $this->belongsToMany(Parents::class, 'parents_student', 'spi_id', 'parent_id');
    }

    public function studentImages()
    {
        return $this->hasMany(StudentImage::class, 'spi_id');
    }

    public function siblings()
    {
        return $this->hasMany(Sibling::class, 'spi_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'spi_id');
    }

    public function collegeRecords()
    {
        return $this->hasMany(CollegeRecord::class, 'spi_id');
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class, 'spi_id');
    }

    public function emails()
    {
        return $this->hasMany(Email::class, 'email_id');
    }

    public function phoneNumners()
    {
        return $this->hasMany(PhoneNumber::class, 'phone_id');
    }

}
