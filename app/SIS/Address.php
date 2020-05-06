<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "address";
    protected $primaryKey = "add_id";
    protected $fillable = ['street'];

    public function students()
    {
        return $this->belongsToMany(StudentPersonalInfo::class, 's_main_address', 'add_id', 'spi_id')->withTimestamps();
    }

    public function parents()
    {
        return $this->belongsToMany(Parent::class, 'parent_address', 'add_id', 'parent_id')->withTimestamps();
    }

    public function country()
    {
    	return $this->belongsTo(Country::class, 'country_id');
    }

    public function province()
    {
    	return $this->belongsTo(Province::class, 'province_id');
    }

    public function city()
    {
    	return $this->belongsTo(City::class, 'city_id');
    }

    public function barangay()
    {
    	return $this->belongsTo(Barangay::class, 'brgy_id');
    }
}
