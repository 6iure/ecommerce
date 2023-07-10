<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class)
	->except(['show']);

/* 
	HTTP Verb	Path (URL)			Action (Method)		Route Name
	GET			/sharks				index				sharks.index
	GET			/sharks/create		create				sharks.create
	POST		/sharks				store				sharks.store
	GET			/sharks/{id}		show				sharks.show
	GET			/sharks/{id}/edit	edit				sharks.edit
	PUT/PATCH	/sharks/{id}		update				sharks.update
	DELETE		/sharks/{id}		destroy				sharks.destroy
*/