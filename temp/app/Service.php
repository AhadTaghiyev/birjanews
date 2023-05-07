<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'file_id',
        'parent',
        'title_az',
        'title_ru',
        'title_en',
        'text_az',
        'text_ru',
        'text_en',
        'short_az',
        'short_ru',
        'short_en',
        'seo_title_az',
        'seo_title_ru',
        'seo_title_en',
        'seo_keywords_az',
        'seo_keywords_ru',
        'seo_keywords_en',
        'seo_desctioption_az',
        'seo_desctioption_ru',
        'seo_desctioption_en',
        'status'
    ];


    public function photo(){
        return $this->belongsTo('App\Files', 'file_id', 'id');
    }

    public function parentDetect(){
        return $this->belongsTo('App\Service', 'parent', 'id');
    }
}
