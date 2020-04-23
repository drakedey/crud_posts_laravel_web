<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = [
        'body', 'user_id', 'post_id', 'parent_comment_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function post() {
        return $this->belongsTo('App\Post');
    }

    public function comments() {
        return $this->hasMany('Comment', 'parent_comment_id');
    }

    public function parentComment() {
        return $this->belongsTo('Comment', 'parent_comment_id');
    }
}
