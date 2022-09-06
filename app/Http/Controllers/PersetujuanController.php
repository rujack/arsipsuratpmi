<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\LogActivity;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    public function index()
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('pengajuan.index');
    }
    public function viewTerima()
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('pengajuan.terima');
    }
    public function viewArsip()
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('pengajuan.arsip');
    }
    public function terima(Surat $surat)
    {
        Surat::where('id', $surat->id)->update(['status'=>'terima']);
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'PUT', 'url' => request()->path()]);
        return redirect('/pengajuan')->with('success', 'Surat Berhasil diupdate');
    }
    public function tolak(Surat $surat)
    {
        Surat::where('id', $surat->id)->update(['status'=>'tolak']);
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'PUT', 'url' => request()->path()]);
        return redirect('/pengajuan')->with('success', 'Surat Berhasil diupdate');
    }
}
