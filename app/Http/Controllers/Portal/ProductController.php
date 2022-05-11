<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use DB;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index() {
        $products = Product::orderBy('updated_at', 'DESC')->get();

        return view('portal.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('portal.products.create', compact('categories'));
    }

    public function store(StoreRequest $request) 
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $product = Product::create($data);
            if ($request->has('file_content') && $request->file_content) {
                $extension = explode('/', mime_content_type($request->file_content))[1];
                $fileContent = $request->file_content;
                list($baseType, $fileContent) = explode(';', $fileContent);
                list(, $fileContent) = explode(',', $fileContent);
                $fileContent = base64_decode($fileContent);
                $name = 'product_' . $product->id . '_' . Carbon::now()->format('Y_m_d_his') . '.' . $extension;
                $path = config('filesystems.file_upload_path.product_path');
                File::put(public_path($path . $name), $fileContent);
                $product->update(['image' => $path . $name]);
            }
            DB::commit();

            return redirect()->route('products.index');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('products.index');
        }
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('portal.products.edit', compact('categories', 'product'));
    }

    public function update(UpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $data = $request->all();
            if ($request->has('file_content') && $request->file_content) {
                $extension = explode('/', mime_content_type($request->file_content))[1];
                $fileContent = $request->file_content;
                list($baseType, $fileContent) = explode(';', $fileContent);
                list(, $fileContent) = explode(',', $fileContent);
                $fileContent = base64_decode($fileContent);
                $name = 'product_' . $product->id . '_' . Carbon::now()->format('Y_m_d_his') . '.' . $extension;
                $path = config('filesystems.file_upload_path.product_path');
                File::put(public_path($path . $name), $fileContent);
                if (File::exists($product->image)) {
                    File::delete($product->image);
                }
                $data['image'] = $path . $name;
            }
            $product->update($data);
            DB::commit();

            return redirect()->route('products.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            DB::commit();

            return redirect()->route('products.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back();
        }
    }
}
