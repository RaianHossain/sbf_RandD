<?php

use App\Http\Controllers\IssueController;
use App\Http\Controllers\IssueControllerBack;
use App\Http\Controllers\WinnerController;
use App\Models\Issue;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function(){
    return view('backend.home');
})->name('dashboard');

Route::get('/pendingIssues', [IssueControllerBack::class, 'pendingIssues'])->name('issues.pending');
Route::get('/runningIssues', [IssueControllerBack::class, 'runningIssues'])->name('issues.running');
Route::get('/doneIssues', [IssueControllerBack::class, 'doneIssues'])->name('issues.done');
Route::get('/issues/{issue}', [IssueControllerBack::class, 'assign'])->name('issues.assign');
Route::get('/winners', [WinnerController::class, 'index'])->name('winners.index');
Route::get('/winners/{id}', [WinnerController::class, 'complete'])->name('winners.complete');