<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'seo_title_az',
        'seo_title_ru',
        'seo_title_en',
        'seo_keywords_az',
        'seo_keywords_ru',
        'seo_keywords_en',
        'seo_desctioption_az',
        'seo_desctioption_ru',
        'seo_desctioption_en',
        'title_az',
        'title_ru',
        'title_en',
        'text_az',
        'text_ru',
        'text_en',
        'short_az',
        'short_ru',
        'short_en',
        'youtube',
        'category_id',
        'project_date',
        'client',
        'status',
    ];

    public function categoryProduct(){
        return $this->belongsTo('App\Service', 'category_id', 'id');
    }

    public function photo_photo(){
        return $this->hasMany('App\Files', 'project_id', 'id')->where('status', 1)->where('assign', 'project-photo');
    }

    public function photo_doc(){
        return $this->hasMany('App\Files', 'project_id', 'id')->where('status', 1)->where('assign', 'project-doc');
    }

    public function statusAllow(){
        return $this->belongsTo('App\AllowModel')->where('model_name', 'Projects');
    }
}
