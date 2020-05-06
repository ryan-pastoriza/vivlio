<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logs';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'log_id';
    public $timestamps = true;
    protected $fillable = [
            'patron_id', 'patron_ids','cat_id',
    ];  
    public function patron_information()
    {
        return $this->hasMany(Patron_information::class, 'patron_id');
    }

    public function patrons()
    {
        return $this->hasMany(Patrons::class, 'patron_id');
    }

}
