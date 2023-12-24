<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminProfileRequest;
use App\Models\Admin;

class ProfileController extends Controller
{
    public function editProfile()
    {
        $admin = Admin::find(auth('admin')->user()->id);

        return view('admin.profile.edit', compact('admin'));
    }

    public function updateProfile(AdminProfileRequest $request)
    {
        try {
            $admin = Admin::find(auth('admin')->user()->id);
            if($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }
            $admin->updated(['name' => $request->name, 'email' => $request->email]);

            return redirect()->back()->with(['success' => 'Updated successfully']);
        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => 'Something went wrong']);
        }
    }
}
