<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title_az',
        'file_id',
        'status'
    ];

    public function photo(){
        return $this->belongsTo('App\Files', 'file_id', 'id');
    }

}
