<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Gallery;
use App\Models\System;

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

    public function showSystem()
    {
        $system = System::first();

        return view('portal.system', compact('system'));
    }

    public function saveSystem(Request $request)
    {
        $data = $request->only(['address', 'phone', 'info', 'map', 'email']);
        $system = System::first();
        if ($system) {
            $system->update($data);
        } else {
            System::create($data);
        }

        return redirect()->route('system.show');
    }
}
