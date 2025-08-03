<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BgCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return view('backend.layouts.blog.category.index',[
            'categories' => BgCategory::orderBy('id', 'desc')->get(),
        ]);
    }
    public function create(){
        return view('backend.layouts.blog.category.create');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        BgCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('bg_category')->with('success', 'Category created');
    }
}
