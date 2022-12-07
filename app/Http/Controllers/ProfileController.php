<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        return Inertia::render('Profile');
    }
    public function process_update_profile(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name_user' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $user->update([
            'email' => $request->post('email'),
            'name' => $request->post('name_user'),
        ]);

        request()->session()->flash('alert', [[
            'type' => 'success',
            'message' => 'Berhasil memperbarui data'
        ]]);

        return Inertia::location('/profile');
    }
    public function process_update_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        $user = User::find(auth()->user()->id);

        //* cek validasi kebenaran password lama
        $data = $request->all();
        if(!Hash::check($data['old_password'], $user->password)){
            request()->session()->flash('alert', [[
                'type' => 'error',
                'message' => 'Password lama tidak sama!'
            ]]);

            return Inertia::location('/profile');
        }


        $user->update([
            'password' => bcrypt($request->post('password')),
        ]);

        request()->session()->flash('alert', [[
            'type' => 'success',
            'message' => 'Berhasil memperbarui password!'
        ]]);

        return Inertia::location('/profile');
    }
    
    public function logout(Request $request)
    {
        if(auth()->check()){
            auth()->logout();

            return Inertia::location('/');
        }
        
        return Inertia::location('/');
    }
}
