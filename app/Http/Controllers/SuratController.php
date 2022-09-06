<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Surat;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use App\Http\Requests\SuratRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('surat.index', ['surats' => Surat::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('surat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'no_surat' => 'required|string|unique:surats',
            'tipe_surat' => 'required',
            'perihal' => 'required|max:255',
            'tanggal' => 'required|date|max:255',
            'pengirim' => 'required|max:255',
            'penerima' => 'required|max:255',
            'file' => 'required|mimes:pdf|max:3072',
            'pengajuan' => 'boolean'
        ];

        $validateData = $request->validate($rules);
        // return $request;
        if ($request->file('file')) {
            $validateData['file'] = $request->file('file')->store('surat');
        }

        // $request->validated();
        Surat::create($validateData);
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'POST', 'url' => request()->path()]);
        // return $validateData;

        return redirect('/surat')->with('success', 'Berhasil Menambah Surat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('surat.view', ['surat' => $surat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('surat.edit', ['surat' => $surat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuratRequest  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surat $surat)
    {
        $rules = [
            'no_surat' => 'required|string|unique:surats,no_surat,'.$surat->id,
            'tipe_surat' => 'required',
            'perihal' => 'required',
            'tanggal' => 'required',
            'pengirim' => 'required',
            'penerima' => 'required',
            'file' => 'mimes:pdf|max:3072',
            'pengajuan' => 'boolean',
        ];

        $validatedData = $request->validate($rules);
        $file = storage_path('app/public/' . $surat->file);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('surat');
            if (File::exists($file)) {
                File::delete($file);
            }
        }

        Surat::where('id', $surat->id)->update($validatedData);
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'PUT', 'url' => request()->path()]);

        return redirect('/surat')->with('success', 'Surat Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        $file = storage_path('app/public/' . $surat->file);

        if (File::exists($file)) {
            File::delete($file);
        }
        Surat::destroy($surat->id);
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'DELETE', 'url' => request()->path()]);

        return redirect('/surat')->with('success', 'Surat Berhasil dihapus');
    }
}
