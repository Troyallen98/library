<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\RoleController;

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
// Route::get('/test', function(Request $request){
//     return 'Authenticated';
// });


Route::middleware('auth:api')->prefix('v1')->group(function() {
    Route::get('user', function(Request $request){
        return $request->user();
    });
    // Route::get('/author/{author}', [AuthorsController::class, 'show']);
    // Route::get('/author', [AuthorsController::class, 'index']);
    Route::apiResource('/authors', AuthorsController::class);
    Route::apiResource('/books', BooksController::class);
});
Route::apiResource('/roles', RoleController::class);
Route::apiResource('/checkouts', RoleController::class);



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();

// });

//route for one specific author

