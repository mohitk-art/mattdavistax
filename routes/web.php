<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use App\Http\Controllers\ChatController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('list/users','UsersController')->name('list_users');

Route::get('/add_user/{id}', [UsersController::class, 'create']);
Route::Post('/add_user',[UsersController::class, 'store']);
Route::get('/show_user/{id}', [UsersController::class, 'show']);
Route::Get('blogs_list',[BlogController::class, 'bloglists']);
Route::Get('blog_details/{id}',[BlogController::class, 'blogDetails']);

Route::Post('/update_user/{id}',[UsersController::class, 'edit']);


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('users', UsersController::class);
    Route::resource('blogs', BlogController::class);
});

Route::Get('profile_setting',function(){
    return view('profile.setting_profile');
});

Route::get('tax/{Id}',[UsersController::class, 'tax'])->name('tax');
Route::Post('your_household/{UserId}',[UsersController::class, 'yourHousehold']);
Route::Post('post_address/{UserId}',[UsersController::class, 'postAddress']);

Route::POST('dropzone_store/{DocType}', [UsersController::class, 'deductionDocument'])->name('users.deductionDocument');
Route::Get('Uploaded_document',[UsersController::class, 'UploadedDocument']);
Route::Get('contact_us',[UsersController::class, 'contactUs']);
Route::Get('services',[UsersController::class, 'services']);
Route::Get('guarantee',[UsersController::class, 'guarantee']);

Route::Get('chat',function(){
    return view('chat');
});


Route::Post('/contactus',[UsersController::class,'contactUsMessage']);

Route::Post('update_doc_status',[UsersController::class,'updateDocStatus'])->name('update_doc_status');

Route::Post('/search_customer',[UsersController::class,'searchCustomer']);

