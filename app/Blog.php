<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'partner_id',
        'title_az',
        'text_az',
        'short_az',
        'created_by',
        'seo_title_az',
        'seo_keywords_az',
        'seo_desctioption_az',
        'created_date',
        'view',
        'status',
        'type'
    ];


    public function photo(){
        return $this->belongsTo('App\Files', 'id', 'elan_id')->where('assign', 'mainElan');
    }

    public function partner(){
        return $this->belongsTo('App\Partners', 'partner_id', 'id');
    }

    public function photo_main(){
        return $this->hasMany('App\Files', 'elan_id', 'id')->where('assign', 'elan');
    }

}
