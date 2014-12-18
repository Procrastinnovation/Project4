<?php

/*
Note there are no before=>csrf filters in here - it's being handled in the BaseController
*/


/**
* Index
*/
Route::get('/', 'IndexController@getIndex');

Route::get('/seed', function() {
	
	$sql = "INSERT INTO doses (dose) VALUES
	(1, '50 mg'),
	(2, '100 mg'),
	(3, '150 mg')
	 ";

	
	echo DB::statement($sql);
	$doses = DB::table('doses')->get();
	echo Paste\Pre::render($doses, '');
});

/**
* User
* (Explicit Routing)
*/
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );

/**
* Enroll
* (Explicit Routing)
*/
Route::get('/enroll', 'EnrollController@getIndex');
Route::get('/enroll/edit/{id}', 'EnrollController@getEdit');
Route::post('/enroll/edit', 'EnrollController@postEdit');
Route::get('/enroll/create', 'EnrollController@getCreate');
Route::post('/enroll/create', 'EnrollController@postCreate');
Route::post('/enroll/delete', 'EnrollController@postDelete');
## Ajax examples
Route::get('/enroll/search', 'EnrollController@getSearch');
Route::post('/enroll/search', 'EnrollController@postSearch');
/**
* Debug
* (Implicit Routing)
*/
Route::controller('debug', 'DebugController');


/**
* Demos
* (Explicit Routing)
*/
Route::get('/demo/csrf-example', 'DemoController@csrf');
Route::get('/demo/collections', 'DemoController@collections');
Route::get('/demo/js-vars', 'DemoController@jsVars');

Route::get('/demo/crud-create', 'DemoController@crudCreate');
Route::get('/demo/crud-read', 'DemoController@crudRead');
Route::get('/demo/crud-update', 'DemoController@crudUpdate');
Route::get('/demo/crud-delete', 'DemoController@crudDelete');

Route::get('/demo/collections', 'DemoController@collections');
Route::get('/demo/query-without-constraints', 'DemoController@queryWithoutConstraints');
Route::get('/demo/query-with-constraints', 'DemoController@queryWithConstraints');
Route::get('/demo/query-responsibility', 'DemoController@queryResponsibility');
Route::get('/demo/query-with-order', 'DemoController@queryWithOrder');

Route::get('/demo/query-relationships-author', 'DemoController@queryRelationshipsAuthor');
Route::get('/demo/query-relationships-tags', 'DemoController@queryRelationshipstags');
Route::get('/demo/query-eager-loading-authors', 'DemoController@queryEagerLoadingAuthors');
Route::get('/demo/query-eager-loading-tags-and-authors', 'DemoController@queryEagerLoadingTagsAndAuthors');

Route::get('/demo/simple-ajax', 'DemoController@getSimpleAjax');
Route::post('/demo/simple-ajax', 'DemoController@postSimpleAjax');




