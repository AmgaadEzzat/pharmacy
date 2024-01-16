<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoresPharmacyController extends Controller
{
    public function create()
    {
        $data = [];
        $data['pharmacies'] = Pharmacy::select(['id'])->get();
        $data['stores'] = Store::select(['id'])->get();

        return view('admin.storesPharmacy.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $store = Store::find($request->store);
        $product = Product::find($request->product);
        $pharmacy = Pharmacy::find($request->pharmacy);
        $storeQuantity = $this->getQuantity($product->id, $store->id);

        if($storeQuantity != null && $storeQuantity > $request-> quantity) {
            $store->products()->updateExistingPivot($product,
                ['quantity' => ($storeQuantity-$request-> quantity)]);

            $pharmacy->stores()->attach($store, [
                'product_id' => $product->id,
                'quantity' => $request-> quantity,
                'price' => $request -> price]);
            $pharmacy->save();
            $message = successMessage('Stored');
        } else {
            $message = errorMessage();
        }
        DB::commit();

        return $message;
    }

    public function index()
    {
        $data['pharmacies'] = Pharmacy::with('stores')->select('id')->get();
        $data['stores'] = $data['pharmacies']->flatMap->stores;

        return view('admin.storesPharmacy.index', $data);
    }

    public function getProducts(Request $request)
    {
        $storeId = $request->storeId;
        $store = Store::find($storeId);
        $products = $store->products()->get();

        return response()->json(['products' => $products]);
    }

    public function getQuantity($productId, $storeId)
    {
        $store = Store::find($storeId);
        $products = $store->products()->where('product_id', $productId)->get();
        foreach ($products as $product) {
            $quantity = $product->pivot->quantity;
        }

        return $quantity;
    }
}
