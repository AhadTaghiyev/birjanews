<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $fillable = ['name', 'file_id', 'status'];

    public function photo(){
        return $this->belongsTo('App\Files', 'file_id', 'id');
    }


}
