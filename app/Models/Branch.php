<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = ['name','country','city','address','code','phones','status'];

    public const CITY = ['Santa Cruz','Montero','Warnes','Yapacani','Mineros','Buena Vista'];
    public const COUNTRY = ['Bolivia','Argentina','Peru'];
    public const STATUS = ['Disabled','Enable'];

    public function fStatus(){
        return self::STATUS[$this->status];
    }

    public function users(){
                   // hasMany: tiene muchos
        return $this->hasMany(User::class);
    }
}
