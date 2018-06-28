<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body'];

    protected $table = 'articles';

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
