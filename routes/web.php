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
use App\Http\Controllers\ToolController;
use App\Http\Controllers\LoanController;
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

    // ยังนึกไม่ออกแหะว่าจะไปทำไม
Route::post('/admin', [AdminController::class, 'store']) 
    ->name('admin.store');


Route::get('/admin/createStaff', [AdminController::class, 'createStaff']) 
    ->name('admin.createStaff');
    Route::get('/admin/showStaff', [AdminController::class, 'showStaff']) 
    ->name('admin.showStaff');
Route::post('/admin/createStaff', [AdminController::class, 'handleStaffButton']) 
    ->name('admin.handleStaffButton');
Route::get('/admin/createAsset', [AdminController::class, 'createAsset']) 
    ->name('admin.createAsset');
Route::post('/admin/createAsset', [AdminController::class, 'handleAssetButton']) 
    ->name('admin.handleAssetButton');

Route::get('/admin/comfirm/{event}', [AdminController::class, 'confirm'])
->name('admin.confirm');

Route::get('/admin/reject/{event}', [AdminController::class, 'reject'])
->name('admin.reject');

Route::post('/admin/reason/{event}', [AdminController::class, 'reason'])
->name('admin.reason');

Route::post('/admin/accept/{event}',[AdminController::class, 'accept'])
->name('admin.accept');

    // User Route

// Route::resource('/user', UserController::class)
//     ->missing(function (Request $request){
//         return Redirect::route('user.index');
//     });

Route::resources([
    '/user' => UserController::class,    
]);
// Route::get('/user', [
//     UserController::class, 'change_available'
// ])->name('user.change_available');

Route::get('/user/{user}/changeAvaiable', [
    UserController::class, 'change_available'
])->name('user.change_available');
// Route::post('/user/{user}/changeAvaiable', [
//     UserController::class, 'change_available'
// ])->name('user.change_available');

Route::post('/user/{user}/edit', [
    UserController::class, 'updatePassword'
])->name('update-password');


Route::get('/user/{user}/showCreateEvent', [
    UserController::class, 'showCreateEvent'
])->name('user.showCreateEvent');

Route::get('/user/terminate/{user}', [UserController::class, 'terminate'])->name('user.terminate');



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
// Route::get('/user/show/event_detail/{event}/kanbans/edit/{task}', [
//     KanBanController::class, 'change'
// ])->name('kanbans.change');
// Route::put('/user/show/event_detail/{event}/kanbans/edit/{task}', [
//     KanBanController::class, 'change'
// ])->name('kanbans.change');


// Route::get('/user/taskeditor/{task}', [
//     KanBanController::class, 'change'
// ])->name('kanbans.change');
// Route::put('/user/taskeditor/{task}', [
//     KanBanController::class, 'handleChange'
// ])->name('kanbans.handleChange');


Route::post('/user/show/event_detail/{event}/kanbans/create', [
    KanBanController::class, 'create'
])->name('kanbans.create');
Route::get('/user/show/event_detail/{event}/kanbans/create', [
    KanBanController::class, 'create'
])->name('kanbans.create');
Route::get('/user/show/event_detail/{event}/kanbans/taskeditor/{task}', [
    KanBanController::class, 'change'
])->name('kanbans.change');
Route::put('/user/show/event_detail/{event}/kanbans/taskeditor/{task}', [
    KanBanController::class, 'handleChange'
])->name('kanbans.handleChange');
Route::post('/user/show/event_detail/{event}/kanbans/changeStatus', [
    KanBanController::class, 'changeStatus' 
])->name('kanbans.changeStatus');
// storeLeaderDesc
Route::post('/user/show/event_detail/{event}/kanbans/storeLeaderDesc', [
    KanBanController::class, 'storeLeaderDesc' 
])->name('kanbans.storeLeaderDesc');

Route::get('/user/show/event_detail/{event}/kanbans/terminate', [
    KanBanController::class, 'terminate'
])->name('kanbans.terminate');

Route::post('/user/store/{user}',[
    UserController::class, 'storeEvent'
])->name('user.storeEvent');

// Loan and Tool Route


Route::get('/tool', [ToolController::class, 'index'])->name('tools.index');
Route::get('/tool/create', [ToolController::class, 'create'])->name('tools.create');
Route::post('/tool/create', [ToolController::class, 'store'])->name('tools.store');
Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
Route::get('/loans/{tool}', [LoanController::class, 'create'])->name('loans.create');


Route::get('/show', [ToolController::class, 'show'])->name('tools.show');
Route::get('/loans/{tool}/edit', [ToolController::class, 'edit'])->name('tools.edit');
Route::put('/loans/{tool}/edit', [ToolController::class, 'update'])->name('tools.update');

Route::post('/loans/{tool}', [LoanController::class, 'store'])->name('loans.store');
Route::get('/loans/terminate/{loan}', [LoanController::class, 'terminate'])->name('loans.terminate');
// Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
// Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
// Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Kanban Route
Route::resource('/kanbans',KanBanController::class)->only([
    'edit','update'
]);;
// Route::resource('/kanbans',KanBanController::class)->only([
//     'delete'
// ]);;
    // Auth Route

Route::post('/logout',[UserController::class, 'logout'])
    ->name('user.logout');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');





require __DIR__.'/auth.php';
