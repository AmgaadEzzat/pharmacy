<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Models\Store;
use App\Models\StoreTranslation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $stores = Store::orderBy('created_at', 'desc')->get();

        return view('admin.stores.index',
            compact('stores'));
    }

    public function create()
    {
        return view('admin.stores.create');
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $store = new Store();
            $store->name = $request->name;
            $store->address = $request->address;
            $store->save();
            DB::commit();

            return successMessage('Stored');
        } catch (\Exception $e) {

            return errorMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $store = Store::find($id);
            if($store) {
                $translatableStore = StoreTranslation::
                where('store_id', $id)->get();
                if ($translatableStore) {
                    foreach ($translatableStore as $tranStore) {
                        $tranStore->delete();
                    }
                }
                $store->delete();
            }

            return successMessage('Deleted');
        } catch (\Exception $e) {

            return errorMessage();
        }
    }

    public function edit($id)
    {
        $store = Store::find($id);
        if(!$store) {
            return redirect()->route('admin.stores.index')
                ->with(['error' => ('The product not found')]);
        }

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $id)
    {
        try {
            $store = Store::find($id);
            if($store) {
                DB::beginTransaction();
                $store->name = $request->name;
                $store->address = $request->address;
                $store->save();
                DB::commit();
            }

            return successMessage('Updated');
        } catch (\Exception $e) {

            return errorMessage();
        }
    }
}
