<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $numberCategory = Category::get()->count();
        $numberProduct = Product::get()->count();
        $numberUser = User::get()->count();
        $numberContact = 0;

        return view('portal.dashboard', compact('numberCategory', 'numberProduct', 'numberUser', 'numberContact'));
    }
}
