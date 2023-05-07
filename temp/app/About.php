<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title_az',
        'title_ru',
        'title_en',
        'text_az',
        'text_ru',
        'text_en',
        'seo_title_az',
        'seo_title_ru',
        'seo_title_en',
        'seo_keywords_az',
        'seo_keywords_ru',
        'seo_keywords_en',
        'seo_desctioption_az',
        'seo_desctioption_ru',
        'seo_desctioption_en',
    ];
}
