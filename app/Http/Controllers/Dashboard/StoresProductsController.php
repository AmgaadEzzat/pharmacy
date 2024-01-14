<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoresProductRequest;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;

class StoresProductsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
        $data = [];
        $data['products'] = Product::select(['id'])->get();
        $data['stores'] = Store::select(['id'])->get();

        return view('admin.storesProduct.create', $data);
    }

    public function store(StoresProductRequest $request)
    {
        DB::beginTransaction();
        $product = Product::find($request->product);
        $store = Store::find($request->store);
        $product->stores()->attach($store, [
            'quantity' => $request-> quantity,
            'price' => $request -> price]);
        $product->save();
        DB::commit();

        return successMessage('Stored');
    }

    public function index()
    {
        $data['stores'] = Store::with('products')->select('id')->get();
        $data['products'] = $data['stores']->flatMap->products;

        return view('admin.storesProduct.index', $data);
    }
}
