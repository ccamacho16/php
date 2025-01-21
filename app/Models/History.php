<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';

    protected $fillable = ['date','check_in','check_out','locker','name','description','user_id'];

    public function user(){
        //belongsto: pertenece a 
        return $this->belongsTo(User::class);
    }    
}
