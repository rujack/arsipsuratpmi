<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\SuratsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportSurats()
    {
        return Excel::download(new SuratsExport, 'surats.xlsx');
    }
}
