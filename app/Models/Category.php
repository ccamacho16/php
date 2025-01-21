<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name','description','status'];

    public const STATUS = ['Disabled','Enable','Punished'];

    public function fStatus(){
        return self::STATUS[$this->status];
    }

    //relacion uno a muchos
    public function products(){
                    // hasMany: tiene muchos
        return $this->hasMany(Product::class);
    }

}
