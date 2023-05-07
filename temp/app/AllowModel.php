<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllowModel extends Model
{
    protected $fillable = [
      'model_name', 'status'
    ];
}
