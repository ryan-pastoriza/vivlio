<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'company';
    protected $primaryKey = 'c_id';
    public $timestamps = true;
    protected $fillable = [
        'c_name', 'c_description', 'c_TIN', 'c_postal', 'c_contact', 'c_email', 'c_status'
    ];

    public function Products()
    {
        return $this->hasMany(Product::class, 'c_id');
    }
}

