<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('edit.categories.categories', compact('categories'));
    }
    public function create()
    {
        return view('edit.categories.create');
    }
    public function store(Request $request)
    {
        Category::create($request->all());
        return back()->with('message','Категорія додана');
    }
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return back();
    }
    public function edit($id)
    {
        $category=Category::find($id);
        return view('edit.categories.edit',['category'=>$category]);
    }
    public function update(Request $request,$id)
    {
        $category=Category::find($id);
        $category->update($request->all());
        $category->save();
        return back()->with('message','Категория обновлена');
    }
}
