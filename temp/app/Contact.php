<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'address_az',
        'address_ru',
        'address_en',
        'telefon',
        'mobil',
        'email',
        'linkedin',
        'facebook',
        'instagram',
        'youtube',
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
