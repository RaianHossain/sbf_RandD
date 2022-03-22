<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WinnerController;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/hello', function() { 
    return "Hello world";
});

Route::resource('issues', IssueController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {
    //auth
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/issues', [IssueController::class, 'index'])->name("issues.index");

    Route::get('/pendingIssues', [IssueControllerBack::class, 'pendingIssues'])->name('issues.pending');
    Route::get('/runningIssues', [IssueControllerBack::class, 'runningIssues'])->name('issues.running');
    Route::get('/doneIssues', [IssueControllerBack::class, 'doneIssues'])->name('issues.done');
    
    //issue
    // Route::post('/issues', [IssueController::class, 'store'])->name("issues.store");
    
    
    //bids route
    Route::resource('bids', BidController::class);

    //winners route
    Route::resource('winners', WinnerController::class);

    Route::get('/resolving-now/{user_id}', [WinnerController::class, 'resolvingNow'])->name('winners.resolvingNow');
});


