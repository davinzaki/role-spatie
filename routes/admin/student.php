<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Audits Routes
|--------------------------------------------------------------------------
|
| Here is where you can register setting related routes for your application.
|
*/


Route::controller(StudentController::class)->middleware('can:view_student')->prefix('student')->name('student.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('get-data', 'getData')->name('getdata');
    Route::post('create', 'createData')->name('create')->middleware('can:create_student');
    Route::post('{id}/update', 'updateData')->name('update')->middleware('can:update_student');
    Route::delete('{id}/delete', 'deleteData')->name('delete')->middleware('can:delete_student');
});
