<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatronCategories extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patron_categories';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'patron_category_id';
    public $timestamps = false;
    protected $fillable = [
            'description', 'enrolment_period', 'enrolment_period_date', 'category_type_id',
    ];

    public function patron_category_type()
    {
        return $this->hasOne(PatronCategoryType::class, 'category_type_id','category_type_id');
    }
    public function loanRules()
    {
        return $this->hasOne(LoanRules::class,'patron_category_id','patron_category_id');
    }
    public function get_all()
    {
        return self::with(['patron_category_type','loanRules'])->get();
    }
    public function get_all_where($arry = [])
    {
        return self::with(['loanRules'])->where($arry)->get();
    }
}