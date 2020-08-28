<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['title', 'body'];
}
