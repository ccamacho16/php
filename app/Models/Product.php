<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['code','name','tradename','description','brand','quantity_min','quantity_max','barcode','category_id','status'];

    public const STATUS = ['Disabled','Enable'];

    public function fStatus(){
        return self::STATUS[$this->status];
    }

    public function category(){
                    //belongsto: pertenece a 
        return $this->belongsTo(Category::class);

        //cuando nuestros primarykeys se llamen diferente a "id", tenemos que
        //especificar el nombre
        //return $this->belongsTo(Category::class, 'categoria_id');
    }

}
