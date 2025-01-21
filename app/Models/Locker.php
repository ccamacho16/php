<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    protected $table = 'lockers';

    protected $fillable = ['number','name','description','time_access','user_id'];

    public function user(){
        //belongsto: pertenece a 
        return $this->belongsTo(User::class);
    }
}
