<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::get('locale/{lang}', [LocalizationController::class, 'setLang']);

// multiple file upload 
Route::middleware('auth')->group(function () {
    // Products resource 
    Route::resource('products', ProductController::class)->except('show');

    // delete_all / restore_all
    Route::post('products/action', [ProductController::class, 'action_all'])
        ->name('products.action');

    Route::get('products/bin', [ProductController::class, 'bin'])
        ->name('products.bin');

    Route::post('products/{id}/restore', [ProductController::class, 'restore'])
        ->name('products.restore');

    Route::delete('products/{id}/force_delete', [ProductController::class, 'force_delete'])
        ->name('products.force_delete');
});


Route::controller(AuthController::class)->group(function () {
    // Đăng ký đăng nhập
    Route::post('login',   'login')      ->name('login')    ->middleware('guest');
    Route::post('register', 'register')  ->name('register') ->middleware('guest');
    Route::post('logout', 'destroy')     ->name('logout')   ->middleware('auth');

    // Quên mk
    Route::get('forgot-password',   'show_forgot_password_form')     ->name('password.request');
    Route::post('forgot-password',  'send_reset_link_email')         ->name('password.email');
    Route::get('reset-password/{token}', 'show_reset_password_form') ->name('password.reset');
    Route::post('reset-password',   'reset_password')                ->name('password.update');

    // Đổi mk 
    Route::get('change-password', 'show_change_password_form')->name('password.changeForm')
        ->middleware(['auth']);
    Route::post('change-password', 'change_password')->name('password.change')
        ->middleware(['auth']);
});


// Send mail
Route::controller(MailController::class)->group(function () {
    Route::get('sendmail',  'index')->name('mails')->middleware('auth');
    Route::post('sendmail', 'sendmail')->middleware('auth');
});


// Blog
Route::controller(BlogController::class)->prefix('blog')->group(function() {
    Route::get('/', 'index') -> name('blog.index');
    Route::get('category/{category:slug}', 'showCategory') -> name('blog.categories.show');
    Route::get('post/{post:slug}', 'showPost')             -> name('blog.posts.show');

    Route::middleware('auth') -> group(function() {
        Route::post('posts/{post:slug}/comments', 'storeComment')  -> name('blog.posts.comments.store');
        Route::post('comments/{comment}/replies', 'storeReply')    -> name('blog.comments.replies.store');
    });
});

// test
Route::view('test', 'test');
Route::get('test2', function () {
    // $user = \App\Models\User::where('role', 1)->first();
    // \Filament\Notifications\Notification::make()
    //     ->title('Saved successfully')
    //     ->sendToDatabase($user);

    $user = \App\Models\Post::first();
    dd($user -> author);
});
