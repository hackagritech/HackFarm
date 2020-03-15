<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/

Route::group(['middleware'=>['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dash');

    Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.'], function () {
        Route::resource('users', 'UserController')->middleware('role:producer');
        Route::resource('fields', 'FieldController')->middleware('role:producer manager');
        Route::resource('operations', 'OperationController');
        Route::get('operations/{id}/fields', 'OperationController@fields')->name('operations.fields');
        Route::post('operations/initialStore', 'OperationController@initialStore')->name('operations.initialStore')->middleware('role:operator');
        Route::get('operations/{id}/finish', 'OperationController@endOperation')->name('operations.endOperation')->middleware('role:operator');
        Route::post('operations/finishStore', 'OperationController@finishStore')->name('operations.finishStore')->middleware('role:operator');
    });
});

