<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentoController;
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
    return view('welcome');
});

Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-submit', [AuthController::class, 'login_submit'])->name('login-submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register-submit', [AuthController::class, 'register_submit'])->name('register-submit');

Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/dashboard', [AgendamentoController::class, 'dashboard'])->name('dashboard');
Route::get('/profile',[AuthController::class, 'profile'])->name('profile');
Route::get('/create', [AgendamentoController::class, 'create'])->name('create');
Route::post('/agendamento_submit', [AgendamentoController::class, 'agendamento_submit'])->name('agendamento-submit');
Route::get('/edit/{id}', [AgendamentoController::class, 'edit'])->name('edit');
Route::post('/edit_submit/{id}',[AgendamentoController::class,'edit_submit'])->name('edit-submit');
Route::delete('/delete/{id}', [AgendamentoController::class, 'delete'])->name('delete');