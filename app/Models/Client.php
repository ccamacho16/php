<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;

    //use SoftDeletes;

    protected $table = 'clients';

    protected $fillable = ['dni','city','sex','birth_date','name','last_name','home_address','business_address','phones','email','job','status'];

    protected $dates = ['birth_date'];

    //public const CITY = ['SRZ', 'LPZ', 'CBB', 'TJA'];
    public const SEX = ['Masculino', 'Femenino'];
    //public const TYPE = ['Formal', 'Informal'];
    public const STATUS = ['Disabled','Enable','Punished'];

    public function fStatus(){
        return self::STATUS[$this->status];
    }

    public function category(){
        //belongsto: pertenece a 
        return $this->belongsTo(Category::class);
    }

}
