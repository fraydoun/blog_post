<?php

namespace Fraidoon\Blog\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    public function index(){
        return view('blog::post');
    }
}
