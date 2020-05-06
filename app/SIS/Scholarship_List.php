<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class Scholarship_List extends Model
{
    protected $table = "scholarship_list";
    protected $primaryKey = "sl_id";

    public function scholarships()
    {
        return $this->hasMany(Scholarship::class, 'sl_id');
    }
}
