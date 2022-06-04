<?php

use Illuminate\Http\Request;

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

// NAMESPACES
// \App\Http\Controllers
// \App\Http\Controllers\Auth\
// \App\Http\Controllers\Apis\


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [\App\Http\Controllers\Apis\LoginController::class, 'apiLogin']);
Route::post('/register_talent', [\App\Http\Controllers\Apis\RegisterController::class, 'apiRegisterTalent']);

Route::middleware(['auth.api'])->group(function() {
    Route::prefix('/assistant')->group(function() {
        Route::post('/get_assistant_respond', [\App\Http\Controllers\AssistantController::class, 'getAssistantResponse']);
        Route::post('/get_assistant_respond/via/group', [\App\Http\Controllers\AssistantController::class, 'getAssistantResponseViaGroup']);
        Route::post('/store_user_input', [\App\Http\Controllers\AssistantController::class, 'storeUserInput']);
    });    
    Route::prefix('/skill')->group(function() {
        Route::get('/all', [\App\Http\Controllers\Apis\SkillController::class,'all']);
        Route::post('/get_skill', [\App\Http\Controllers\Apis\SkillController::class,'getSkill']);
    });
});

