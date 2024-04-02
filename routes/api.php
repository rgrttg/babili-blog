<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;


Route::post('/sanctum/token', [TokenController::class]);

Route::get('test', function(){return "test";});
// Blog per Id
Route::get('blogs/detail/{id}', [BlogController::class, 'mitOhneAllesScharf']);
// drei neuste
Route::get('blogs/latest-three', [BlogController::class, 'latestThreeBlogs']);
// alle neuste
Route::get('blogs/all-latest', [BlogController::class, 'allBlogsByLatest']);
// alle älteste
Route::get('blogs/all-oldest', [BlogController::class, 'allBlogsByOldest']);
// drei meiste commentare
Route::get('blogs/most-interactions-three', [BlogController::class, 'mostInteractionsThreeBlogs']);
// alle meiste commentare
Route::get('blogs/most-interactions-all', [BlogController::class, 'mostInteractionsAllBlogs']);
// alle wenigste commentare
Route::get('blogs/least-interactions-all', [BlogController::class, 'leastInteractionsAllBlogs']);

// Route zum Abrufen von Blogs anhand von Tags.
// Diese Route akzeptiert entweder einen einzelnen Tag oder ein Array von Tags.
// Beispiel mit einem einzelnen Tag: /api/blogs/by-tags?tags=ipsum
// Beispiel mit einem Array von Tags: /api/blogs/by-tags?tags[]=ipsum&tags[]=lorem
Route::get('blogs/by-tags', [BlogController::class, 'getBlogsByTags']);

Route::get('/all-users', [UserController::class, 'showUser']);




/**
 * AUTH ROUTES
 */
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users/auth', [UserController::class, 'show']);
    
    // Diese Route ermöglicht authentifizierten Benutzern das Bewerten eines Blogs mit einer positiven oder negativen Bewertung.
    // Beispielanfrage: POST /api/blogs/{BlogId}/rate
    // Beispiel request body: { "rating": 1 } (für positiv) oder { "rating": 0 } (für negativ)
    Route::post('blogs/rate/{id}', [BlogController::class, 'rateBlog']);
});
