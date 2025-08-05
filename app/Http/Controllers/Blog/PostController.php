<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BgCategory;
use App\Models\BgPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        return view('backend.layouts.blog.post.index',[
            'posts' => BgPost::with('user', 'bgCategory')->orderBy('id', 'desc')->get()
        ]);
    }

    public function create(){
        $categories = BgCategory::where('status', 'active')->get();
        return view('backend.layouts.blog.post.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'title'          => 'required|max:250',
            'post_content'   => 'required',
            'bg_category_id' => 'required|exists:bg_categories,id',
        ]);

        $user_id = Auth::user()->id;

        BgPost::create([
            'title'          => $request->title,
            'slug'           => Str::slug($request->title),
            'content'        => $request->post_content,
            'bg_category_id' => $request->bg_category_id,
            'user_id'        => $user_id,
        ]);
        return redirect()->route('bg_post.index')->with('success', 'Post created successfully');
    }

    public function edit($id){
        $post= BgPost::findOrFail($id);
        $categories = BgCategory::where('status', 'active')->get();
        return view('backend.layouts.blog.post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'          => 'required|max:250',
            'post_content'   => 'required',
            'bg_category_id' => 'required|exists:bg_categories,id',
        ]);

        $post= BgPost::findOrFail($id);

        $post->update([
            'title'          => $request->title,
            'slug'           => Str::slug($request->title),
            'content'        => $request->post_content,
            'bg_category_id' => $request->bg_category_id,
        ]);
        return redirect()->route('bg_post.index')->with('success', 'Post Updated successfully');
    }

    public function destroy($id){
        $post = BgPost::where('id', $id)->delete();
        return back()->with('error', 'Post deleted');
    }

    public function status($id){
        $post= BgPost::findOrFail($id);
        $post->status = $post->status == 'active' ? 'inactive' : 'active';
        $post->save();
        return back()->with('success', 'Status updated');
    }
}
