<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanRules extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'loan_rules';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'patron_category_id';
    public $timestamps = false;
    protected $fillable = [
            'patron_category_id', 'fine', 'max_loan_qty', 'loan_length',
    ];
}