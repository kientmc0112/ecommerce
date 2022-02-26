<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->get();

        return view('portal.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();

        return view('portal.categories.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        Category::create($data);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $categories = Category::whereNull('parent_id')->get();
        $category = Category::with(['parent', 'childs'])->find($id);

        return view('portal.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Category::find($id)->update($data);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('categories.index');
    }
}
