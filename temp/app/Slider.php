<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'small_title_az',
        'small_title_ru',
        'small_title_en',
        'title_az',
        'title_ru',
        'title_en',
        'text_az',
        'text_ru',
        'text_en',
        'file_id',
        'status'
    ];

    public function photo(){
        return $this->belongsTo('App\Files', 'file_id', 'id');
    }

}
