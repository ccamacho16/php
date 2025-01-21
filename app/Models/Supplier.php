<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = ['tin','name','address','city','phones','email','account','contact','field1','status'];

    public const CITY = ['Santa Cruz','Montero','Warnes','Yapacani','Mineros','Buena Vista'];
    public const STATUS = ['Disabled','Enable','Punished'];

    public function fStatus(){
        return self::STATUS[$this->status];
    }
}
