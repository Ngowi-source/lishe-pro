<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['article_id', 'body'];

    protected $table = 'comments';

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
