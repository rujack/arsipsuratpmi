<?php

use App\Models\User;
use App\Models\Surat;
use App\Models\LogActivity;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PersetujuanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//

Route::get('/', [HomeController::class, 'index'])->middleware('auth');

//Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware(['checkRole:admin,pengurus,pegawai', 'auth']);
Route::post('/profile', [ProfileController::class, 'updateProfile'])->middleware(['checkRole:admin,pengurus,pegawai', 'auth']);
Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->middleware(['checkRole:admin,pengurus,pegawai', 'auth']);

// Register
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

// Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Surat
Route::resource('surat', SuratController::class)->middleware('auth');
Route::get('/getsurat', function () {
    return Datatables::of(Surat::query())->addColumn('action', 'partials.actionSurat')->make(true);
})->name('getSurat')->middleware(['checkRole:admin,pengurus,pegawai', 'auth']);

// Export
Route::get('/export/surats', [ExportController::class, 'exportSurats'])->middleware(['checkRole:admin,pengurus,pegawai', 'auth']);

// Pengajuan
Route::get('/pengajuan', [PersetujuanController::class, 'index'])->middleware('auth');
Route::get('/getpengajuan', function () {
    return Datatables::of(Surat::where('pengajuan', 1))->addColumn('action', 'partials.actionPengajuan')->make(true);
})->name('getPengajuan')->middleware(['checkRole:admin,pengurus,pegawai', 'auth']);
Route::get('/pengajuan/terima', [PersetujuanController::class, 'viewTerima'])->middleware('auth');
Route::get('/getpengajuanacc', function () {
    return Datatables::of(Surat::where([['pengajuan', 1], ['status', 'terima']]))->addColumn('action', 'partials.actionPengajuan')->make(true);
})->name('getPengajuanAcc')->middleware(['checkRole:admin,pengurus,pegawai', 'auth']);
Route::get('/pengajuan/arsip', [PersetujuanController::class, 'viewArsip'])->middleware('auth');
Route::get('/getpengajuanarsip', function () {
    return Datatables::of(Surat::where([['pengajuan', 1], ['status', 'tolak']]))->addColumn('action', 'partials.actionPengajuan')->make(true);
})->name('getPengajuanArsip')->middleware(['checkRole:admin,pengurus,pegawai', 'auth']);
Route::post('/pengajuan/terima/{surat:id}', [PersetujuanController::class, 'terima'])->middleware(['checkRole:admin,pengurus', 'auth']);
Route::post('/pengajuan/tolak/{surat:id}', [PersetujuanController::class, 'tolak'])->middleware(['checkRole:admin,pengurus', 'auth']);

// User
Route::resource('user', UserController::class)->middleware(['checkRole:admin', 'auth']);
Route::put('user/reset/{user:id}', [UserController::class, 'reset'])->middleware(['checkRole:admin', 'auth']);
Route::get('/getuser', function () {
    return Datatables::of(User::query())->addColumn('action', 'partials.actionUser')->make(true);
})->name('getUser')->middleware(['checkRole:admin', 'auth']);

// Show file
Route::get('/file/surat/{surat}', function ($surat) {
    if (!Auth::check()) {
        abort(403);
    }

    $path = storage_path('app/public/surat/' . $surat);
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    LogActivity::create(['email' => auth()->user()->email, 'method' => 'GET', 'url' => request()->path()]);
    return $response;
})->middleware('auth');

// LOG ACTIVITY
Route::get('/logactivity', function () {
    return view('log', ['logs' => LogActivity::orderBy('created_at', 'desc')->get()]);
})->middleware(['checkRole:admin', 'auth']);

