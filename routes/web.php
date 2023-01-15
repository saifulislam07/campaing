<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessageHistoryController;
use App\Models\Campaign;

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

Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/user-list', [AdminController::class, 'userlist'])->name('user-list');
    Route::get('/updateStatus/{uid}/{status}', [AdminController::class, 'updateStatus'])->name('updateStatus');

    //campaign start
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns');
    Route::get('/addnewcampaigns', [CampaignController::class, 'create'])->name('addcampaigns');
    Route::post('/storecampaigns', [CampaignController::class, 'store'])->name('storecampaigns');


    Route::get('/userSubscription', [CampaignController::class, 'userSubscription'])->name('userSubscription');



    // campaign view for user
    Route::get('/subscribeCamp', [CampaignController::class, 'subscribeCamp'])->name('subscribeCamp');
    Route::get('/subscribestore/{campid}/{uid}', [CampaignController::class, 'subscribestore'])->name('subscribestore');

    //message
    Route::get('/messagelist', [MessageController::class, 'index'])->name('messagelist');
    Route::post('/storemessage', [MessageController::class, 'store'])->name('storemessage');
    Route::get('/cmessage', [MessageController::class, 'create'])->name('cmessage');

    //send message
    Route::get('/sendMessageToUser', [MessageHistoryController::class, 'sendMessageToUser'])->name('sendMessageToUser');
    Route::get('/mymessages', [MessageHistoryController::class, 'mymessages'])->name('mymessages');
    Route::get('/allMessages', [MessageHistoryController::class, 'allMessages'])->name('allMessages');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
