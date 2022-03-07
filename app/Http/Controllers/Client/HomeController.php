<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('keyword') && $request->keyword) {
            $categoryHeaders = Category::with('childs')->whereNull('parent_id')->get();
            $keyword = $request->keyword;
            $products = Product::where('name', 'LIKE', "%$keyword%")->orderBy('created_at', 'desc')->paginate(12);
            $countProduct = Product::where('name', 'LIKE', "%$keyword%")->count();

            return view('client.products.search', compact('products', 'categoryHeaders', 'countProduct'))->with('keyword', $keyword);
        }
        $categoryHeaders = Category::with('childs')->whereNull('parent_id')->get();
        $newProducts = Product::select(
            'products.*',
            DB::raw('(100 - sale_price / price * 100) as discount')
        )->orderBy('created_at', 'DESC')
        ->paginate(8);
        $saleProducts = Product::select(
            'products.*',
            DB::raw('(100 - sale_price / price * 100) as discount')
        )->whereNotNull('sale_price')
        ->whereRaw('sale_price < price')
        ->orderBy('discount', 'DESC')
        ->paginate(6);

        return view('client.index', compact('categoryHeaders', 'newProducts', 'saleProducts'));
    }
}
