<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use DB;
use Exception;

class CategoryController extends Controller
{
    public function show($id)
    {
        try {
            $categoryHeaders = Category::with('childs')->whereNull('parent_id')->get();
            $category = Category::findOrFail($id);
            $products = Product::select(
                'products.*',
                DB::raw('(100 - sale_price / price * 100) as discount')
            )->where('category_id', $id)
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
            $countProduct = Product::where('category_id', $id)->count();

            return view('client.categories.show', compact('category', 'products', 'categoryHeaders', 'countProduct'));
        } catch (Exception $e) {
            return redirect()->route('home');
        }
    }
}
