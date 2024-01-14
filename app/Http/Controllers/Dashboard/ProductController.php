<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->sku = $request->sku;
            $product->save();
            DB::commit();

            return successMessage('Stored');
        } catch (\Exception $e) {

            return errorMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            if($product) {
                $product->delete();
            }

            return successMessage('Deleted');
        } catch (\Exception $e) {

            return errorMessage();
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if(!$product) {
            return redirect()->route('admin.products.index')
                ->with(['error' => ('The product not found')]);
        }

        return view('admin.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            if($product) {
                DB::beginTransaction();
                $product->name = $request->name;
                $product->description = $request->description;
                $product->sku = $request->sku;
                $product->save();
                DB::commit();
            }

            return successMessage('Updated');
        } catch (\Exception $e) {

            return errorMessage();
        }
    }
}
