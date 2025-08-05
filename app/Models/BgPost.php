<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BgPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id',
        'bg_category_id',
    ];
    public function bgCategory(){
        return $this->belongsTo(BgCategory::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
