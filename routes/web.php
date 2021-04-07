<?php

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

Route::get('/',\App\Http\Controllers\HomeController::class)->name('home');

//Route::get('/author/{id}',\App\Http\Controllers\PostByAuthorController::class)->name('post-by-author');
//Route::get('/category/{id}',\App\Http\Controllers\PostByCategoryIdController::class)->name('post-by-category');
//Route::get('/tag/{tag}',\App\Http\Controllers\PostByTagController::class)->name('post-by-tag');
//Route::get('/author/{authorId}/category/{categoryId}',\App\Http\Controllers\PostByAuthorAndCategoryController::class)->name('post-by-author-and-category');
//Route::get('/author/{authorID}/category/{categoryId}/tag/{tagId}',\App\Http\Controllers\PostByAuthorAndCategoryAndTagController::class)->name('post-by-author-and-category-and-tag');
//POST
//Route::get('/management/posts/create',[\App\Http\Controllers\post\PostController::class,'create'])->name('post-management.create');
//Route::post('/management/posts/create',[\App\Http\Controllers\post\PostController::class,'store'])->name('post-management.store');
//Route::get('/management/posts/{post}/edit',[\App\Http\Controllers\post\PostController::class,'edit'])->name('post-management.edit');
//Route::post('/management/posts/{post}/edit',[\App\Http\Controllers\post\PostController::class,'update'])->name('post-management.update');
//
//Route::get('/management/posts/{post}/delete',[\App\Http\Controllers\post\PostController::class,'delete'])->name('post-management.delete');
//
//CATEGORY
//Route::get('/management/categories/create',[\App\Http\Controllers\category\CategoryController::class,'create'])->name('category-management.create');
//Route::post('/management/categories/create',[\App\Http\Controllers\category\CategoryController::class,'store'])->name('category-management.store');
//Route::get('/management/categories/{category}/edit',[\App\Http\Controllers\category\CategoryController::class,'edit'])->name('category-management.edit');
//Route::post('/management/categories/{category}/edit',[\App\Http\Controllers\category\CategoryController::class,'update'])->name('category-management.update');
//
//Route::get('/management/categories/{category}/delete',[\App\Http\Controllers\category\CategoryController::class,'delete'])->name('category-management.delete');
//
//TAG
//
//Route::get('/management/tags/create',[\App\Http\Controllers\tag\TagController::class,'create'])->name('tag-management.create');
//Route::post('/management/tags/create',[\App\Http\Controllers\tag\TagController::class,'store'])->name('tag-management.store');
//Route::get('/management/tags/{tag}/edit',[\App\Http\Controllers\tag\TagController::class,'edit'])->name('tag-management.edit');
//Route::post('/management/tags/{tag}/edit',[\App\Http\Controllers\tag\TagController::class,'update'])->name('tag-management.update');
//
//Route::get('/management/tags/{tag}/delete',[\App\Http\Controllers\tag\TagController::class,'delete'])->name('tag-management.delete');

//Authorize
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);
//Route::get('/user/agent', [\App\Http\Controllers\UserAgentController::class, 'create']);
Route::get('/geo', [\App\Http\Controllers\VisitController::class, 'create']);

//Route::get('/geo', function (\App\Service\Geo\UserAgentService $geoService){
//    dd(request()->ip());
//    dd($_SERVER['HTTP_USER_AGENT']);
//    dd($reader->country('85.238.106.27'));
//    dd(request()->ip() !== '127.0.0.1' ?: request()->server->get('SERVER_ADDR')); /*нет HTTP_X_FORWARDED_FOR в массиве $_SERVER*/
//    $ip = '142.44.210.192';
//    $geoService->parse($ip);
//
//
//    \App\Models\Visit::create([
//        'ip' => $ip,
//        'continent_code' => $geoService->continentCode(),
//        'country_code' =>  $geoService->countryCode(),
//
//    ]);
//    dd($reader->country('212.224.118.172')->country->isoCode);
//});
Route::get('/github/callback',\App\Http\Controllers\Oauth\GitHubController::class);
Route::get('/insta/callback',\App\Http\Controllers\Oauth\InstagramController::class);
Route::middleware('guest')->group(function (){
    Route::get('/auth/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::post('/auth/login',[\App\Http\Controllers\AuthController::class,'handleLogin'])->name('auth.handle-login');
});
Route::middleware('auth')->group(function (){
    Route::get('/auth/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('auth.logout');
    Route::get('/management/posts/create',[\App\Http\Controllers\post\PostController::class,'create'])->name('post-management.create');
    Route::post('/management/posts/create',[\App\Http\Controllers\post\PostController::class,'store'])->name('post-management.store');
    Route::get('/management/posts/{post}/edit',[\App\Http\Controllers\post\PostController::class,'edit'])->name('post-management.edit');
    Route::post('/management/posts/{post}/edit',[\App\Http\Controllers\post\PostController::class,'update'])->name('post-management.update');

    Route::get('/management/posts/{post}/delete',[\App\Http\Controllers\post\PostController::class,'delete'])->name('post-management.delete');


    Route::get('/management/tags/create',[\App\Http\Controllers\tag\TagController::class,'create'])->name('tag-management.create');
    Route::post('/management/tags/create',[\App\Http\Controllers\tag\TagController::class,'store'])->name('tag-management.store');
    Route::get('/management/tags/{tag}/edit',[\App\Http\Controllers\tag\TagController::class,'edit'])->name('tag-management.edit');
    Route::post('/management/tags/{tag}/edit',[\App\Http\Controllers\tag\TagController::class,'update'])->name('tag-management.update');

    Route::get('/management/tags/{tag}/delete',[\App\Http\Controllers\tag\TagController::class,'delete'])->name('tag-management.delete');

    Route::get('/management/categories/create',[\App\Http\Controllers\category\CategoryController::class,'create'])->name('category-management.create');
    Route::post('/management/categories/create',[\App\Http\Controllers\category\CategoryController::class,'store'])->name('category-management.store');
    Route::get('/management/categories/{category}/edit',[\App\Http\Controllers\category\CategoryController::class,'edit'])->name('category-management.edit');
    Route::post('/management/categories/{category}/edit',[\App\Http\Controllers\category\CategoryController::class,'update'])->name('category-management.update');

    Route::get('/management/categories/{category}/delete',[\App\Http\Controllers\category\CategoryController::class,'delete'])->name('category-management.delete');

    Route::get('/author/{id}',\App\Http\Controllers\PostByAuthorController::class)->name('post-by-author');
    Route::get('/category/{id}',\App\Http\Controllers\PostByCategoryIdController::class)->name('post-by-category');
    Route::get('/tag/{tag}',\App\Http\Controllers\PostByTagController::class)->name('post-by-tag');
    Route::get('/author/{authorId}/category/{categoryId}',\App\Http\Controllers\PostByAuthorAndCategoryController::class)->name('post-by-author-and-category');
    Route::get('/author/{authorID}/category/{categoryId}/tag/{tagId}',\App\Http\Controllers\PostByAuthorAndCategoryAndTagController::class)->name('post-by-author-and-category-and-tag');


});








