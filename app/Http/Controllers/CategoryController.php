<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::latest()->get(), 200);
        // Raw SQL
        // $categories = DB::select("SELECT *FROM categories");

        //Query Builder 
        // $categories = DB::table('categories')->get();

        // dd(request()->all());

        //Eloquernt
        // $categories = Category::all();

        // By Order
        // $categories = Category::latest()->get();

        // dd ($categoies)
        // return view('categories.list', compact('categories'));
    }


    public function show($id)
    {
        $category = Category::find($id);

        if (! $category) {
            return response()->json([
                'message' => 'Category not found',
            ], 404);
        }

        return response()->json($category, 200);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // dd(request()->all());
        // Category::create(
        //     [
        //         'name' => request()->name,
        //         'dec' => request()->dec,
        //     ]
        // );

        // return view('categories.list'); XXXXXX don't do this 
        // return redirect('/categories');

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'dec'  => 'nullable|string|max:255',
        ]);

        $exists = Category::where('name', $validated['name'])->exists();

        if ($exists) {
            return response()->json([
                'message' => 'Category already exists. Please use a different name.',
            ], 409);
        }

        $category = Category::create($validated);

        return response()->json([
            'message' => 'Category created successfully',
            'data'    => $category,
        ], 201);
    }

    // Edit
    public function edit(string $id)
    {
        $category = Category::find($id);
        // dd($categories);

        return view('categories.edit', compact('category'));
    }

    // Update
    public function update(Request $request, $id)
    {
        // dd(request()->all());
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'category not found. It may have been deleted.'
            ], 404);
        }

        $validated = $request->validate(
            [
                'name' => 'required|string|max:100|unique:categories,name,' . $id,
                'dec'  => 'nullable|string|max:255',
            ], [
                'name.unique' =>'A category with this name already exists.',
        ]);
        

        $category->update($validated);

        return response()->json([
            'message' => 'category updated successfully',
            'data' => $category
        ], 200);
    }

    // Delete
    public function destroy($id)
    {
        $category = Category::find($id);

        if (! $category) {
            return response()->json([
                'message' => 'Category has already been deleted or was not found.',
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category has been deleted successfully.',
        ], 200);
    }
}
