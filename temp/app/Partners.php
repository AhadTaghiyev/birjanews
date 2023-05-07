<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $fillable = ['name', 'file_id', 'link', 'status'];

    public function photo(){
        return $this->belongsTo('App\Files', 'file_id', 'id');
    }

    public function statusAllow(){
        return $this->belongsTo('App\AllowModel')->where('model_name', 'Partner');
    }

}
