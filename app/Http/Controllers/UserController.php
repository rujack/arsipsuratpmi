<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'id_anggota' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'role' => 'required'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'POST', 'url' => request()->path()]);
        // return $request->all();
        // $request->session()->flash('success','Regristration Success');

        return redirect('/user')->with('success', 'Regristration Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('user.view', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)

    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'id_anggota' => 'required|unique:users,id_anggota,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role'=>'required|in:admin,pengurus,pegawai'
        ]);

        User::where('id', $user->id)->update($validatedData);
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'PUT', 'url' => request()->path()]);

    //    $password = Hash::make('password123');
    //     User::where('id', $user->id)->update(['password' => $password]);

        return redirect('/user')->with('success', 'User Berhasil diupdate');
    }

    public function reset(User $user)
    {
        $password = Hash::make('password123');
        User::where('id', $user->id)->update(['password' => $password]);
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'PUT', 'url' => request()->path()]);

        return redirect('/user')->with('success', 'Password Berhasil direset');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'DELETE', 'url' => request()->path()]);

        return redirect('/user')->with('success', 'Surat Berhasil dihapus');
    }
}
