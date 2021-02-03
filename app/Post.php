<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function post() {
        return $this->belongsTo(Category::class);
    }

    public function postInformation() {
        return $this->hasOne(PostInformation::class);
    }
}
