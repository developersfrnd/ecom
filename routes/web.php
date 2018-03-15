<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//set language
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'AuthController@switchLang']);
//End set language

Route::get('uploads/{filename}', function ($filename)
{
    $path = storage_path() . '/app/uploads/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::group(['middleware'=>['locale']], function(){

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/search','SearchController@index');
	
	Route::get('/', function () {
	    return view('home');
	});
	Route::get('/about', function () {
	    return view('about');
	});

	Route::get('/login', 'AuthController@getlogin')->name('login');
	Route::post('/login', 'AuthController@postlogin');

	Route::group(['middleware'=>['auth']], function(){
		Route::resource('/projects','ProjectsController',['only'=>['index','show']]);
		Route::get('/projects/products/{project_id}','ProjectsController@getProjectProducts');
		Route::resource('/products','ProductsController',['only'=>['show']]);
		Route::resource('/orders','OrdersController',['only'=>['store']]);
		Route::resource('/users','UsersController',['only'=>['index','edit','update']]);
		Route::get('/logout','AuthController@logout')->name('signout');
	});	

	Route::group(array('prefix'=> config('constants.ADMIN_URL')), function ()	{

		Route::get('/lang/{lang}', ['as'=>'lang.switch', 'uses'=>'Admin\AuthController@switchLang']);
		Route::get('/','Admin\AuthController@getlogin');
		Route::post('/','Admin\AuthController@postLogin');

		Route::group(['middleware'=>['auth','admin']], function(){

		
			Route::get('/logout','Admin\AuthController@logout')->name('logout');
			Route::get('/dashboard','Admin\AuthController@dashboard');
			Route::resource('/products','Admin\ProductsController');

			Route::get('/products/product-suppliers/{product_id}','Admin\ProductsController@getProductSuppliers');
			Route::post('/products/product-suppliers/{product_id}','Admin\ProductsController@postProductSuppliers');

			Route::get('/projects/users/{project_id}','Admin\ProjectsController@getUsers');
			Route::post('/projects/users/{project_id}','Admin\ProjectsController@postUsers');

			Route::get('/images/create/{product_id}','Admin\ImagesController@create');
			Route::post('/images','Admin\ImagesController@store');
			Route::delete('/images/destroy/{product_id}','Admin\ImagesController@destroy');

			Route::resource('/projects','Admin\ProjectsController');
			Route::resource('/suppliers','Admin\SuppliersController');
			Route::resource('/users','Admin\UsersController');
			Route::resource('/categories','Admin\CategoriesController');
			Route::resource('/orders','Admin\OrdersController',['only'=>'index']);
		});	
	});
});	


