<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable =[
        'name_az',
        'name_ru',
        'name_en',
        'status',
    ];

    public function photo(){
        return $this->belongsTo('App\Files', 'category_id', 'id');
    }
}
