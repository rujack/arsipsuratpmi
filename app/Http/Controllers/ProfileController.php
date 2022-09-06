<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('profile.index', ['user' => User::find(auth()->user()->id)]);
    }
    public function indexPassword()
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('profile.password');
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'id_anggota' => 'required|unique:users,id_anggota,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:5'
        ]);


        if (!empty($request->input('password'))) {

            $validatedData['password'] = Hash::make($request['password']);
        };

        User::where('id', auth()->user()->id)->update($validatedData);
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'PUT', 'url' => request()->path()]);

        return redirect('/profile')->with('success', 'profile Success update');
    }
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:5|max:255',
            'password_confirm' => 'required|same:password',
        ]);

        if (Hash::check($request['old_password'], auth()->user()->password)) {
            if ($request['password'] === $request['password_confirm']) {
                $validatedData['password'] = Hash::make($request['password']);
                User::where('id', auth()->user()->id)->update(['password' => $validatedData['password']]);
                LogActivity::create(['email' => auth()->user()->email, 'method' => 'PUT', 'url' => request()->path()]);
            };
        };

        return redirect('/profile')->with('success', 'Password Success update');
    }
}
