<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $table = 'ideas';
    protected $primaryKey = 'id';
    protected $cast = [
        'likes' => 'array',
    ];

    protected $guarded = [];
}
