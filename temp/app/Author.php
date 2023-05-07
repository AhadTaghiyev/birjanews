<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable =[
        'name_az',
        'name_ru',
        'name_en',
        'status',
    ];
}
