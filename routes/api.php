<?php

use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\EventController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// only register the routes which are responsible for listing, showing one resource and can adding modifing it without the route of forms

Route::apiResource('user',EventController::class);
/* while attendees  are related to events, we don't need a separate route for that */
Route::apiResource('events.attendees', AttendeeController::class)
    ->scoped(['attendee'=>'event']) // this means that the attendee resource s are always part of an event,
    //also means that if you would use route model binding to get an attendee,
    //Laravel will automatically loaded by looking for the attendees of a parent event
;

/*
We Defining for the first time the routes in the api.php file not web.php, here's why?:
    
    - The api is more focused on data transfer between client and server than presentation.
    So it doesn't really make sense to have views associated with these routes.
    
    - In our case, there are no users who should see or interact with these data, only the system itself.
    This makes it easier to keep everything clean and simple.
    
    - We want to showcase how to structure an API as best as possible.
    
    - In the RouteServiceProvider you can see that each api route is prefixed with 'api'.
    This means that all routes in this file are under that prefix.
    If you wanted to add another set of routes without the prefix, you could do so by adding another instance of Route::prefix()
    You could also add other things like versioning, authentication etc. to the prefix.
    This means that each file has its own middleware groups in the (Kernel) which can then easily be added / removed from the entire api.

*/