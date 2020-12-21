<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patron_information extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patron_information';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    protected $primaryKey = 'patron_id';
    protected $fillable = [
            'patron_id', 'full_name', 'gender', 'dob', 'student_id', 'department', 'course', 'contact_no', 'address' ,
    ];
    public function add($ID,$request = [])
    {
        if(!empty($request)){
            $this->patron_id = $ID;
            $this->full_name = strtoupper($request['_name']);
            $this->gender = $request['_gender'];
            $this->dob = $request['_birthday'];
            $this->student_id = $request['_student_id'];
            $this->department = $request['_department'];
            $this->course = strtoupper($request['_course']);
            $this->contact_no = $request['_contact'];
            $this->address = $request['_address'];
            $this->save();
        }
    }
}