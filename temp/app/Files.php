<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = [
        'file', 'name_az', 'name_ru', 'name_en','assign', 'status', 'category_id', 'project_id', 'alt_tag'
    ];



    public function categoryGallery(){
        return $this->belongsTo('App\GalleryCategory', 'category_id', 'id');
    }
}
