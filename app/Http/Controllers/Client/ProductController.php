<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\System;
use DB;
use Exception;

class ProductController extends Controller
{
    public function show($slug)
    {
        try {
            $system = System::first();
            $categoryHeaders = Category::with('childs')->whereNull('parent_id')->get();
            $product = Product::select(
                'products.*',
                DB::raw('(100 - sale_price / price * 100) as discount')
            )->where('slug', $slug)
            ->first();
            $relatedProducts = Product::select(
                'products.*',
                DB::raw('(100 - sale_price / price * 100) as discount')
            )->where('category_id', $product->category_id)
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

            return view('client.products.show', compact('product', 'categoryHeaders', 'relatedProducts', 'system'));
        } catch (Exception $e) {
            return redirect()->route('home');
        }
    }

    public function search(Request $request)
    {
        if ($request->has('keyword') && $request->keyword) {
            $system = System::first();
            $categoryHeaders = Category::with('childs')->whereNull('parent_id')->get();
            $keyword = $request->keyword;
            $products = Product::where('name', 'LIKE', "%$keyword%")->orderBy('created_at', 'desc')->paginate(12);

            return view('client.products.search', compact('products', 'categoryHeaders', 'system'))->with('keyword', $keyword);
        }

        return redirect()->back();
    }
}
