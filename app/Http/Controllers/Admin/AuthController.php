<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ImageTrait;
    public function loginPage()
    {
        return view('admin.signin');
    }
    public function profile()
    {
        return view('admin.profile');
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|exists:admins|string|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'The email faild is required.',
            'email.string' => 'The email faild must be string.',
            'email.email' => 'The email faild must be email.',
            'email.exists' => 'The your email is incorrect.',
            'password.required' => 'The password faild is required.',
            'password.string' => 'The password faild must be string.',
            'password.min' => 'The password faild must be at leates 6 letter.',
        ]);

        if (!Auth::guard('admins')->attempt($attr)) {
            return redirect()->route('admin.login.page')
                ->withErrors(['errors' => 'The password is incorrect.']);
        }
        if (Auth::guard('admins')->user()->hasRole('admin')) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('categories.index');
        }
    }

    public function logout()
    {

        auth()->guard('admins')->logout();
        return redirect()->route('admin.login.page');
    }

    public function updateProfile(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'password' => 'confirmed',
            'image'   => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];

        $messages = [
            'name.required'        => 'ادخل الاسم',

            'email.required'        => 'ادخل البريد الالكتروني',
            'email.unique'          => ' هذا البريد يستخدمه شخص اخر',
            'password.confirmed'         => 'كلمة المرور غير متطابقة',
        ];

        $this->validate($request, $rules, $messages);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = $request->except(['password']);
        }

        auth()->guard('admins')->user()->update($input);

        if ($request->file('image')) {
            $path = $this->uploadFile('uploads/admins/', $request->file('image'));
            auth()->guard('admins')->user()->update(['image' => $path]);
        }



        return back()->with('status', 'Added successfully.');
    }
}
