<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    public function index()
    {
        return view('pengajuan.index');
    }
    public function viewTerima()
    {
        return view('pengajuan.terima');
    }
    public function viewArsip()
    {
        return view('pengajuan.arsip');
    }
    public function terima(Surat $surat)
    {
        Surat::where('id', $surat->id)->update(['status'=>'terima']);
        return redirect('/pengajuan')->with('success', 'Surat Berhasil diupdate');
    }
    public function tolak(Surat $surat)
    {
        Surat::where('id', $surat->id)->update(['status'=>'tolak']);
        return redirect('/pengajuan')->with('success', 'Surat Berhasil diupdate');
    }
}
