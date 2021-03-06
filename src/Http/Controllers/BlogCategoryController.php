<?php

namespace Fraidoon\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Fraidoon\Blog\Http\Requests\CategoryRequest;
use Fraidoon\Blog\Models\BlogCategory;

use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index(){
        // $datas = BlogCategory::latest()->paginate(5);
        // return view('blog::category',compact('datas'))->with('i', (request()->input('page', 1) - 1) * 5);
        return view('blog::category');
    }

    // public function create()
    // {
    //     return view('blog::category');
    // }

    // public function save(CategoryRequest $request){
    //     BlogCategory::create([
    //         'title' => $request->get('title'),
    //       ]);

    //     return back()->with('success', 'You have just created one item');
    // }
    
    // public function show(BlogCategory $blogcategory)
    // {
    //     return view('blogcategory.show', compact('blogcategory'));
    // }

    
    // public function edit(BlogCategory $blogcategory)
    // {
    //     return view('blogcategory.edit', compact('blogcategory'));
    // }
    
    // public function update(Request $request, BlogCategory $blogcategory)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'price' => 'required'
    //     ]);
    //     $blogcategory->update($request->all());

    //     return redirect()->route('blogcategory.index')
    //         ->with('success', 'BlogCategory updated successfully');
    // }
    
    // public function destroy(BlogCategory $blogcategory)
    // {
    //     $blogcategory->delete();

    //     return redirect()->route('blogcategory.index')
    //         ->with('success', 'BlogCategory deleted successfully');
    // }
}
