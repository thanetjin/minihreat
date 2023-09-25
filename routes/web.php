<?php

use App\Models\User;
use App\Models\Event;
use App\Models\Task;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KanBanController;
use App\Http\Controllers\AuthController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
        return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    // Admin Route
Route::get('/admin', [AdminController::class, 'index'])
->name('admin.index');
Route::post('/admin', [AdminController::class, 'store']) 
    ->name('admin.store');

Route::get('/admin/comfirm/{event}', [AdminController::class, 'confirm'])
->name('admin.confirm');

Route::get('/admin/reject/{event}', [AdminController::class, 'reject'])
->name('admin.reject');

Route::post('/admin/reason/{event}', [AdminController::class, 'reason'])
->name('admin.reason');

Route::post('/admin/accept/{event}',[AdminController::class, 'accept'])
->name('admin.accept');

    // User Route

Route::resource('/user', UserController::class)
    ->missing(function (Request $request){
        return Redirect::route('user.index');
    });

Route::post('/user/{user}/edit', [
    UserController::class, 'updatePassword'
])->name('update-password');

Route::get('/user/{user}/certificate', [
    UserController::class, 'showCertificate'
])->name('user.certificate');

Route::get('/user/{user}/showCreateEvent', [
    UserController::class, 'showCreateEvent'
])->name('user.showCreateEvent');

Route::get('/user/show/event_detail/{event}', [
    UserController::class, 'show_detail_event'
])->name('user.show_detail_event');

Route::get('/user/show/event_detail/{event}/enter', [
    UserController::class, 'enterEvent'
])->name('user.enterEvent');


Route::get('/user/show/event_detail/{event}/kanbans/', [
    KanBanController::class, 'index'
])->name('kanbans.index');

Route::post('/user/show/event_detail/{event}/kanbans/', [
    KanBanController::class, 'store'
])->name('kanbans.store');

Route::post('/user/show/event_detail/{event}/kanbans/changeStatus', [
    KanBanController::class, 'changeStatus'
])->name('kanbans.changeStatus');

Route::post('/user/store/{user}',[
    UserController::class, 'storeEvent'
])->name('user.storeEvent');

    // Kanban Route
Route::resource('/kanbans',KanBanController::class)->only([
    'edit','update'
]);;
    // Auth Route

Route::post('/logout',[UserController::class, 'logout'])
    ->name('user.logout');
});

// Not sure

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// might be useful for debugging
// Route::get('/', function () {
//     $event = Event::first();

//     return view('welcome', compact('event'));
// });




require __DIR__.'/auth.php';
