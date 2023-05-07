<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
     protected $fillable = [
        'file_id', 'status'
     ];

    public function photo(){
        return $this->belongsTo('App\Files', 'file_id', 'id');
    }
}
