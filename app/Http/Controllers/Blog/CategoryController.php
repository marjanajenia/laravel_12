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
    public function edit($id){
        $category = BgCategory::findOrFail($id);
        return view('backend.layouts.blog.category.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);

        $category = BgCategory::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('bg_category')->with('success', 'Category Updated');
    }
    public function destroy($id){
        $category = BgCategory::where('id', $id)->delete();
        return back()->with('error', 'category deleted');
    }
    public function status($id){
        $category = BgCategory::findOrFail($id);
        $category->status = $category->status == 'active' ? 'inactive' : 'active';
        $category->save();
        return back()->with('success', 'Status updated');
    }
}
