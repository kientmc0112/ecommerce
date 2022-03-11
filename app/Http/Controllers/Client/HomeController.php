<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Route;
use App\Models\Image;
use App\Enums\DBConstant;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categoryHeaders = Category::with('childs')->whereNull('parent_id')->get();
        if ($request->has('keyword') && $request->keyword) {
            $keyword = $request->keyword;
            $products = Product::where('name', 'LIKE', "%$keyword%")->orderBy('created_at', 'desc')->paginate(12);
            $countProduct = Product::where('name', 'LIKE', "%$keyword%")->count();

            return view('client.products.search', compact('products', 'categoryHeaders', 'countProduct'))->with('keyword', $keyword);
        }

        $sliders = Image::where('type', DBConstant::SLIDER_TYPE)
            ->orderBy('created_at', 'ASC')
            ->get()
            ->map(function ($slider) {
                $slider->image_url = config('filesystems.file_upload_path.system_path') . DBConstant::SYSTEM[DBConstant::SLIDER_TYPE] . '/' . $slider->filename;
                
                return $slider;
            });
        $topBanners = Image::where('type', DBConstant::BANNER_TOP_TYPE)
            ->limit(3)
            ->orderBy('created_at', 'ASC')
            ->get()
            ->map(function ($banner) {
                $banner->image_url = config('filesystems.file_upload_path.system_path') . DBConstant::SYSTEM[DBConstant::BANNER_TOP_TYPE] . '/' . $banner->filename;
                
                return $banner;
            });
        $botBanners = Image::where('type', DBConstant::BANNER_BOT_TYPE)
            ->limit(1)
            ->orderBy('created_at', 'ASC')
            ->get()
            ->map(function ($banner) {
                $banner->image_url = config('filesystems.file_upload_path.system_path') . DBConstant::SYSTEM[DBConstant::BANNER_BOT_TYPE] . '/' . $banner->filename;
                
                return $banner;
            });
        
        $newProducts = Product::select(
            'products.*',
            DB::raw('(100 - sale_price / price * 100) as discount')
        )->limit(8)
        ->orderBy('created_at', 'DESC')
        ->get();
        $saleProducts = Product::select(
            'products.*',
            DB::raw('(100 - sale_price / price * 100) as discount')
        )->whereNotNull('sale_price')
        ->whereRaw('sale_price < price')
        ->limit(6)
        ->orderBy('discount', 'DESC')
        ->get();

        return view('client.index', compact('categoryHeaders', 'newProducts', 'saleProducts', 'sliders', 'topBanners', 'botBanners'));
    }
}
