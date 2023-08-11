<?php

use App\Models\User;
use App\Models\Event;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KanBanController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
    $event = Event::find(2);
    return view('welcome', compact('event'));
});

Route::get('/hello', function () {
    return "Hello Laravel";
})->name("hello");

Route::get('/hello/{name}', function ($name) {
    return "Hello {$name}";
})->name("hello.name");

Route::get('/about', [AboutController::class, 'index'])
    ->name('about.index');
// Route::get('/kanbans', function () {
//         return view('kanban');
//     });
Route::resource('/kanbans',KanBanController::class);


Route::get('/songs', [SongController::class, 'index'])
    ->name('songs.index');
    
Route::resource('/user', UserController::class)
    ->missing(function (Request $request){
        return Redirect::route('user.index');
    });
    
Route::get('/user/{Profile}/certificate', [
    UserController::class, 'showCertificate'
])->name('user.certificate');
Route::get('/user/{Profile}/showCreateEvent', [
    UserController::class, 'showCreateEvent'
])->name('user.showCreateEvent');
Route::get('/user/show/event_detail', [
    UserController::class, 'show_detail_event'
])->name('user.show_detail_event');

// Route::get('/detail-event', function () {
//     return view('user.detail_event');
// })->name("detail-event");

Route::get('/admin', [AdminController::class, 'index'])
->name('admin.index');

Route::get('/admin/comfirm', [AdminController::class, 'confirm'])
->name('admin.confirm');

Route::get('/admin/reject', [AdminController::class, 'reject'])
->name('admin.reject');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
