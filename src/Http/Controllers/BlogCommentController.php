<?php

namespace Fraidoon\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function index(){
        return view('blog::comment');
    }
}
