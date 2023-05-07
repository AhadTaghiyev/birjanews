<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = [
        'file', 'name_az', 'assign', 'status', 'partner_id', 'elan_id'
    ];



    public function categoryGallery(){
        return $this->belongsTo('App\GalleryCategory', 'category_id', 'id');
    }
}
