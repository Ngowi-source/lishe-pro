<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['article_id', 'body', 'user_id'];

    protected $table = 'comments';

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*public function comment()
    {
        return $this->hasMany($this);
    }*/
}
