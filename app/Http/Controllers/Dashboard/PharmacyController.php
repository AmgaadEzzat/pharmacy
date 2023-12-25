<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PharmacyRequest;
use App\Models\Pharmacy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;

class PharmacyController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $pharmacies = Pharmacy::orderBy('created_at', 'desc')->get();

        return view('admin.pharmacies.index',
            compact('pharmacies'));
    }

    public function create()
    {
        return view('admin.pharmacies.create');
    }

    public function store(PharmacyRequest $request)
    {
        try {
            DB::beginTransaction();
            $pharmacy = new Pharmacy();
            $pharmacy->name = $request->name;
            $pharmacy->address = $request->address;
            $pharmacy->phone = $request->phone;
            $pharmacy->save();
            DB::commit();

            return successMessage('Stored');
        } catch (\Exception $e) {

            return errorMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $pharmacy = Pharmacy::find($id);
            if($pharmacy) {
                $pharmacy->delete();
            }

            return successMessage('Deleted');
        } catch (\Exception $e) {

            return errorMessage();
        }
    }

    public function edit($id)
    {
        $pharmacy = Pharmacy::find($id);
        if(!$pharmacy) {
            return redirect()->route('admin.products.index')
                ->with(['error' => ('The product not found')]);
        }

        return view('admin.pharmacies.edit', compact('pharmacy'));
    }

    public function update(PharmacyRequest $request, $id)
    {
        try {
            $pharmacy = Pharmacy::find($id);
            if($pharmacy) {
                DB::beginTransaction();
                $pharmacy->name = $request->name;
                $pharmacy->address = $request->address;
                $pharmacy->phone = $request->phone;
                $pharmacy->save();
                DB::commit();
            }

            return successMessage('Updated');
        } catch (\Exception $e) {

            return errorMessage();
        }
    }
}
