<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogVideo extends Model
{
    protected $fillable = [
        'file_id',
        'title_az',
        'title_ru',
        'title_en',
        'created_by',
        'category_id',
        'url',
        'created_date',
        'view',
        'status'
    ];


    public function photo(){
        return $this->belongsTo('App\Files', 'file_id', 'id');
    }

    public function author(){
        return $this->belongsTo('App\Author', 'created_by', 'id');
    }

    public function getCategory(){
        return $this->belongsTo('App\BlogCategory', 'category_id', 'id');
    }
}
