<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BgTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index(){
        return view('backend.layouts.blog.tag.index', [
            'tags' => BgTag::orderBy('id', 'desc')->get()
        ]);
    }
    public function create(){
        return view('backend.layouts.blog.tag.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        BgTag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('bg_tag.index')->with('success', 'Tag created');
    }
    public function edit($id){
        $tag = BgTag::findOrFail($id);
        return view('backend.layouts.blog.tag.edit', compact('tag'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);

        $tag = BgTag::findOrFail($id);

        $tag->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('bg_tag.index')->with('success', 'Tag Updated');
    }
    public function destroy($id){
        $tag = BgTag::where('id', $id)->delete();
        return back()->with('error', 'Tag deleted');
    }
    public function status($id){
        $tag = BgTag::findOrFail($id);
        $tag->status = $tag->status == 'active' ? 'inactive' : 'active';
        $tag->save();
        return back()->with('success', 'Status updated');
    }
}
