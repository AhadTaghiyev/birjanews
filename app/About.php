<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title_az',
        'text_az',
        'seo_title_az',
        'seo_keywords_az',
        'seo_desctioption_az',
    ];
}
