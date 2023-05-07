<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniqueIP extends Model
{
    protected $fillable = [
        'elan_id', 'ip', 'view', 'status'
    ];
}
