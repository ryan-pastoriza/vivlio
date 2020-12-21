<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Copies extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'copies';

  	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'copy_id';
    public $timestamps = true;
    protected $fillable = [
       'acc_num', 'catalogue_id', 'barcode', 'source', 'status', 'note', 'date_received', 'issues',
    ];
    public function fetchByKey($key, $value)
    {
        return self::where($key, $value)->get();
    }
    public function fetch_by_accNum($acc_num)
    {
        return self::where('acc_num',$acc_num)->get();
    }
    public function turnTo($acc_num,$status)
    {
        $copy = self::where(['acc_num'=>$acc_num])->get()->toArray();
        foreach ($copy as $v) {
            $c = self::find($v['copy_id']);
            $c->status = $status;
            if($c->save())return true;
        }
        return false;
    }
    public function fetchCopiesByLast($days){
        $data = [];
        foreach (self::on()->where( 'created_at', '>', $days)->limit(15)->get()->toArray() as $key => $value) {
           $data[] = ['copies'=>$value];
        }
        return $data;
    }
    
}
