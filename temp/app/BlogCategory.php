<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable =[
        'name_az',
        'name_ru',
        'name_en',
        'showStatus',
        'status',
    ];
}
