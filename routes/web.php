<?php

use Illuminate\Support\Facades\Route;


Route::resource('admin/contacts', 'ContactController');

Auth::routes();


