<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('admin.signin');
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

        if (!Auth::guard('admin')->attempt($attr)) {
            return redirect()->route('admin.login.page')
                ->withErrors(['errors' => 'The password is incorrect.']);
        }
        return redirect()->route('admin.home');
    }

    public function logout()
    {

        auth()->guard('admin')->logout();
        return redirect()->route('admin.login.page');

    }
}
