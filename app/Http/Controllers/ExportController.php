<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\LogActivity;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\SuratsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportSurats()
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return Excel::download(new SuratsExport, 'surats.xlsx');
    }
}
