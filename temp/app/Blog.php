<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'file_id',
        'main_file_id',
        'category_id',
        'title_az',
        'title_ru',
        'title_en',
        'text_az',
        'text_ru',
        'text_en',
        'short_az',
        'short_ru',
        'short_en',
        'created_by',
        'seo_title_az',
        'seo_title_ru',
        'seo_title_en',
        'seo_keywords_az',
        'seo_keywords_ru',
        'seo_keywords_en',
        'seo_desctioption_az',
        'seo_desctioption_ru',
        'seo_desctioption_en',
        'created_date',
        'view',
        'status'
    ];


    public function photo(){
        return $this->belongsTo('App\Files', 'file_id', 'id');
    }

    public function photo_main(){
        return $this->belongsTo('App\Files', 'main_file_id', 'id');
    }

    public function getCategory(){
        return $this->belongsTo('App\BlogCategory', 'category_id', 'id');
    }

    public function author(){
        return $this->belongsTo('App\Author', 'created_by', 'id');
    }
}
