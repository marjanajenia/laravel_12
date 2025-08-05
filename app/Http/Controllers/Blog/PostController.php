<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BgPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('backend.layouts.blog.post.index',[
            'posts' => BgPost::orderBy('id', 'desc')->get()
        ]);
    }
}
