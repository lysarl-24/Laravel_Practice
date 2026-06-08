<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        // Raw SQL
        // $categories = DB::select("SELECT *FROM categories");

        //Query Builder 
        // $categories = DB::table('categories')->get();

        // dd(request()->all());

        //Eloquernt
        // $categories = Category::all();

        // By Order
        $categories = Category::latest()->get();

        // dd ($categoies)
        return view('categories.list', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store()
    {
        // dd(request()->all());
        Category::create(
            [
                'name' => request()->name,
                'dec' => request()->dec,
            ]
        );

        // return view('categories.list'); XXXXXX don't do this 
        return redirect('/categories');
    }
    public function show() {
        return view('categories.show');
    }

    // Edit
    public function edit($id){
        $category = Category::find($id);
        // dd($categories);

        return view('categories.edit', compact('category'));
    }
 
    // Update
    public function update($id)
    {
        // dd(request()->all());
        $category = Category::find($id);
        $category->update(
            [
                'name'=> request()->name,
                'dec'=> request()->dec,
            ]
        );
        return redirect('/categories');
    }

    // Delete
    public function destroy($id) 
    {
         // dd($id);
        $category = Category::find($id);
        $category->delete();
        return redirect('/categories');
    }
}
