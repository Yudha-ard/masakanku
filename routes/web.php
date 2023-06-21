<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;




Route::get('test', function() { return view('back.admin.layouts.app'); });

Route::get('logout', function() { return redirect('login'); });

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('about', [FrontController::class, 'about'])->name('front.about'); 
Route::get('recipe', [FrontController::class, 'recipe'])->name('front.recipe');
Route::get('recipe/{recipe}', [FrontController::class, 'showRecipe'])->name('front.recipe.detail'); 
Route::get('contact', [FrontController::class, 'contact'])->name('front.contact');
Route::post('form', [PesanController::class, 'store'])->name('front.form.store'); 


Auth::routes();

Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
   Route::get('/', function() { return redirect('user/dashboard'); });
   Route::get('dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
   Route::get('profile', [ProfileController::class, 'index'])->name('user.profile');
   Route::get('profile/edit', [ProfileController::class, 'edit'])->name('user.profile.edit');
   Route::put('profile/update', [ProfileController::class, 'update'])->name('user.profile.update');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
   Route::get('/', function() { return redirect('admin/dashboard');});
   Route::get('dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

   Route::get('resep', [ResepController::class, 'index'])->name('admin.resep');
   Route::get('resep/create', [ResepController::class, 'create'])->name('admin.resep.create');
   Route::get('resep/{resep}', [ResepController::class, 'show'])->name('admin.resep.show');
   Route::post('resep', [ResepController::class, 'store'])->name('admin.resep.store');
   Route::get('resep/{resep}/edit', [ResepController::class, 'edit'])->name('admin.resep.edit');
   Route::put('resep/{resep}', [ResepController::class, 'update'])->name('admin.resep.update');
   Route::delete('resep/{resep}', [ResepController::class, 'destroy'])->name('admin.resep.destroy');

   Route::get('kategori', [KategoriController::class, 'index'])->name('admin.kategori');
   Route::get('kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
   Route::get('kategori/{kategori}', [KategoriController::class, 'show'])->name('admin.kategori.show');
   Route::post('kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
   Route::get('kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
   Route::put('kategori/{kategori}', [KategoriController::class, 'update'])->name('admin.kategori.update');
   Route::delete('kategori/{kategori}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

   Route::get('pesan', [PesanController::class, 'index'])->name('admin.pesan');
   Route::get('pesan/{kategori}', [PesanController::class, 'show'])->name('admin.pesan.show');
   Route::post('pesan', [PesanController::class, 'store'])->name('admin.pesan.store');
   Route::delete('pesan/{kategori}', [PesanController::class, 'destroy'])->name('admin.pesan.destroy');

   Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
   Route::get('profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
   Route::put('profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');

   Route::get('user', [UserController::class, 'index'])->name('admin.user');
   Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
   Route::get('user/{user}', [UserController::class, 'show'])->name('admin.user.show');
   Route::post('user', [UserController::class, 'store'])->name('admin.user.store');
   Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
   Route::put('user/{user}', [UserController::class, 'update'])->name('admin.user.update');
   Route::delete('user/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
});


