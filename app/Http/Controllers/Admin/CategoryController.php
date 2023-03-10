<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|max:100|unique:categories',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();

        $category = new Category;
        $category->slug = $data['slug'];
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->save();

        return redirect()
            ->route('admin.categories.show', ['category' => $category])
            ->with('success_created', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->post();

        return view('admin.categories.show', [
            'category' => $category,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'slug' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categories')->ignore($category),
            ],
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();

        $category->slug = $data['slug'];
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->update();

        return redirect()
            ->route('admin.categories.show', ['category' => $category])
            ->with('success_updated', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $defaultCategory = Category::where('slug', 'nessuna')->first();

        foreach ($category->posts as $post) {
            $post->category_id = $defaultCategory->id;
            $post->update();
        }
        $category->delete();

        // ridirezionare
        return redirect()->route('admin.categories.index')->with('success_deleted', $category);
    }
}
