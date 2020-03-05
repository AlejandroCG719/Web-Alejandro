<?php
Route::view('/','home')->name('home');
Route::view('/quien-soy','about')->name('about');
Route::view('/auth.register','register')->name('registrar');

Route::group (['middleware' => ['auth']] , function (){
});
Route::resource('portafolio','ProjectController')
    ->parameters(['portafolio' => 'project'])
    ->names('projects');

Route::resource('usuario', 'UserController')
    ->parameters(['usuario' => 'user'])
    ->names('users');

Route::resource('rol', 'RoleController')
    ->parameters(['rol' => 'role'])
    ->names('roles');

Route::view('/contacto','contact')->name('contact');

Route::post('contact', 'MessageController@store')->name('messages.store');

Auth::routes(['register' => true]);



