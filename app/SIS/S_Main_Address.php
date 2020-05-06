<?php

namespace App\SIS;

use Illuminate\Database\Eloquent\Model;

class S_Main_Address extends Model
{
    protected $table = "s_main_address";
    protected $primaryKey = "sma_id";
    protected $fillable = ['spi_id','address_type'];
}
