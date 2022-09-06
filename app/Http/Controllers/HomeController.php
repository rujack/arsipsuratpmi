<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
        return view('home', [
            'datas' => Surat::all(), 'carbon' => DB::table('log_activities')->get(), 'tgl' => Carbon::now()->addDays(30)
        ]);
    }
}
