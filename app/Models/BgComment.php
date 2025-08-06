<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BgComment extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'bg_post_id',
    ];
}
