<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    $posts = Post::all();
    return view('index',compact('posts'));
});

// Admin Routes
Route::group(['middleware' => ['auth','role:Admin','verified']], function () {
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    // Post
    Route::resource('posts', PostController::class)->only(
        'index','create','store','edit','update','destroy'
    );
    // Users
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');

});

// User Routes
Route::group(['middleware' => ['auth','verified']], function () {
    
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

});

Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');


Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::feeds();

require __DIR__.'/auth.php';
