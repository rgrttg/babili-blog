<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;


// created from Andreas
Route::get('/tags', [TagController::class, 'index']);

Route::post('/sanctum/token', [TokenController::class]);

// Blog per Id
Route::get('/blogs/detail/{id}', [BlogController::class, 'mitOhneAllesScharf']);
// drei neuste
Route::get('/blogs/latest-three', [BlogController::class, 'latestThreeBlogs']);
// alle neuste
Route::get('/blogs/all-latest', [BlogController::class, 'allBlogsByLatest']);
// alle älteste
Route::get('/blogs/all-oldest', [BlogController::class, 'allBlogsByOldest']);
// drei meiste commentare
Route::get('/blogs/most-interactions-three', [BlogController::class, 'mostInteractionsThreeBlogs']);
// alle meiste commentare
Route::get('/blogs/most-interactions-all', [BlogController::class, 'mostInteractionsAllBlogs']);
// alle wenigste commentare
Route::get('/blogs/least-interactions-all', [BlogController::class, 'leastInteractionsAllBlogs']);

// Route zum Abrufen von Blogs anhand von Tags.
// Diese Route akzeptiert entweder einen einzelnen Tag oder ein Array von Tags.
// Beispiel mit einem einzelnen Tag: params: { tags: 'Lorem' }
// Beispiel mit einem einzelnen Tag: /api/blogs/by-tags?tags=Lorem
// Beispiel mit einem Array von Tags: params: { tags: ['Lorem', 'Ipsum'] }
// Beispiel mit einem Array von Tags: /api/blogs/by-tags?tags[]=Tag1&tags[]=Tag2
Route::get('/blogs/by-tags', [BlogController::class, 'getBlogsByTags']);

//Alle Userdaten und Blogs by UserId. Gibt E-mail nur an Authetizierte User.
Route::get('/user/profile/{id}', [UserController::class, 'getUserProfile']);

// API-Route für die Suche
// Diese Route akzeptiert eine Suchanfrage und gibt die entsprechenden Ergebnisse zurück.
// Beispielaufruf: /api/search?input=SuchText
Route::get('/search', [SearchController::class, 'search']);



/**
 * AUTH ROUTES
 */
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users/auth', [UserController::class, 'show']);

    // Gibt nur Name, Profile-Picture & Socials
    Route::get('/user/me', [UserController::class, 'me']);

    // Diese Route ermöglicht das Aktualisieren der Benutzerinformationen.
    // Beispielanfrage: PUT /api/user/store/{id}
    // Der Anfrage-Body sollte die zu aktualisierenden Felder enthalten:
    // {
    //     "profile_picture": "Bild des Benutzers (optional, Dateiupload)",
    //     "about_me": "Informationen über den Benutzer (maximal 500 Zeichen, optional)",
    //     "interests": "Interessen des Benutzers (maximal 500 Zeichen, optional)",
    //     "socials": [
    //         {
    //             "platform": "facebook",
    //             "user_input": "username oder Profil-Link"
    //         },
    //         // Weitere soziale Profile können hinzugefügt werden
    //     ]
    // }
    Route::put('/user/store/{id}', [UserController::class, 'store']);

    // Diese Route ermöglicht das Löschen eines Benutzers.
    // Beispielanfrage: POST /api/user/delete
    // Der Anfrage-Body sollte die ID des zu löschenden Benutzers enthalten:
    // { "user_id": 123 }
    Route::post('/user/delete', [UserController::class, 'deleteUser']);

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
    Route::post('/blogs/store', [BlogController::class, 'store']);
    Route::put('/blogs/store/{id}', [BlogController::class, 'store']);

    // Diese Route ermöglicht das Umschalten (Toggle) des Veröffentlichungsstatus eines Blogs.
    // Beispielanfrage: PUT /api/blogs/publish/{id}
    // Es wird kein Request-Body benötigt. Der Veröffentlichungsstatus wird automatisch umgeschaltet.
    Route::put('/blogs/publish/{id}', [BlogController::class, 'publish']);

    // Diese Route ermöglicht authentifizierten Benutzern das Bewerten eines Blogs mit einer positiven oder negativen Bewertung.
    // Beispielanfrage: POST /api/blogs/{BlogId}/rate
    // Beispiel request body: { "rating": 1 } (für positiv) oder { "rating": 0 } (für negativ)
    Route::post('/blogs/rate/{id}', [BlogController::class, 'rateBlog']);

    // Diese Route ermöglicht authentifizierten Benutzern 
    // einen Kommentar zu einem Blog (id) zu schreiben /ro
    Route::post('/comment/create/{id}', [CommentController::class, 'writeComment']);

    // Diese Route ermöglicht das Löschen eines Blogs.
    // Beispielanfrage: POST /api/blogs/delete-blog
    // Der Anfrage-Body sollte die ID des zu löschenden Blogs enthalten:
    // { "blog_id": 123 }
    Route::post('/blogs/delete-blog', [BlogController::class, 'deleteBlog']);

    // Diese Route ermöglicht das Löschen eines Kommentars.
    // Beispielanfrage: POST /api/blogs/delete-comment
    // Der Anfrage-Body sollte die ID des zu löschenden Kommentars enthalten:
    // { "comment_id": 123 }
    Route::post('/blogs/delete-comment', [BlogController::class, 'deleteComment']);
});
