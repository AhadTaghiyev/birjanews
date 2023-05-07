<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'address_az',
        'telefon',
        'mobil',
        'email',
        'linkedin',
        'facebook',
        'instagram',
        'youtube',
        'seo_title_az',
        'seo_keywords_az',
        'seo_desctioption_az',
    ];
}
