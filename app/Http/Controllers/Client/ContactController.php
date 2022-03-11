<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function create()
    {
        $categoryHeaders = Category::with('childs')->whereNull('parent_id')->get();

        return view('client.contact', compact('categoryHeaders'));
    }

    public function store(ContactRequest $request)
    {
        $data = $request->all();
        Contact::create($data);

        return redirect()->back();
    }
}
