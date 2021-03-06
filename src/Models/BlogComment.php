<?php

namespace Fraidoon\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $fillable = ['comment','full_name','email','phone','visiable','blog_post_id'];

    public function blogPost(){
        return $this->belongsTo(BlogPost::class);
    }
}
