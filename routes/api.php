<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;


Route::post('/sanctum/token', [TokenController::class]);

Route::get('test', function () {
    return "test";
});
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



/**
 * AUTH ROUTES
 */
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users/auth', [UserController::class, 'show']);

    // Diese Route ermöglicht das Erstellen oder Aktualisieren eines Blog-Beitrags.
    // Beispielanfrage: POST /api/blogs/store (für die Erstellung eines neuen Beitrags)
    // oder PUT /api/blogs/store/{id} (für die Aktualisierung eines bestehenden Beitrags)
    // Der Anfrage-Body sollte die folgenden Felder enthalten:
    // {
    //     "title": "Titel des Blog-Beitrags",
    //     "description": "Beschreibung des Blog-Beitrags (maximal 500 Zeichen)",
    //     "content": [
    //         { "type": "paragraph", "value": "Inhalt des Absatzes" }
    //         // Weitere Inhaltsabschnitte können hinzugefügt werden
    //     ],
    //     "image": "Das Bild für den Blog-Beitrag (optional, Dateiupload)"
    //     "tags": ["Tag1", "Tag2"] // Liste von Tags (optional)
    // }
    // Wenn die Anfrage mit PUT erfolgt, sollte die URL zusätzlich die ID des zu aktualisierenden Blogs enthalten.
    Route::post('/api/blogs/store', [BlogController::class, 'store']);
    Route::put('/api/blogs/store/{id}', [BlogController::class, 'store']);

    // Diese Route ermöglicht das Umschalten (Toggle) des Veröffentlichungsstatus eines Blogs.
    // Beispielanfrage: PUT /api/blogs/publish/{id}
    // Es wird kein Request-Body benötigt. Der Veröffentlichungsstatus wird automatisch umgeschaltet.
    Route::put('/blogs/publish/{id}', [BlogController::class, 'publish']);

    // Diese Route ermöglicht authentifizierten Benutzern das Bewerten eines Blogs mit einer positiven oder negativen Bewertung.
    // Beispielanfrage: POST /api/blogs/{BlogId}/rate
    // Beispiel request body: { "rating": 1 } (für positiv) oder { "rating": 0 } (für negativ)
    Route::post('blogs/rate/{id}', [BlogController::class, 'rateBlog']);

    // Diese Route ermöglicht authentifizierten Benutzern einen Kommentar zu schreiben /ro
    Route::post('blogs/comment/{id}', [BlogController::class, 'writeComment']);
    
});
