<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComents extends Model
{
    protected $fillable = [
      'blog_id',
      'fullname',
      'email',
      'phone',
      'text',
      'type',
      'lang',
      'approve_status',
      'status'
    ];

}
