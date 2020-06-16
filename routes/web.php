<?php
//use App\Http\Middleware\CheckUser;
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
Route::get('/', function () {
    return view('welcome');
});
Route::post('/importUsers','Manager\HomeController@importUsers');

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/addUserForm', 'UserController@addUserForm');
Route::get('/userList', 'UserController@userList'); 
Route::post('/addUser', 'UserController@addUser');


Route::get('/editUserForm/{token}', 'UserController@editUserForm')->name('users.edit');//edit btn
Route::delete('/deleterecord/{token}', 'UserController@deleterecord')->name('users.delete');//delete btn
Route::put('/updaterecord/{token}', 'UserController@updaterecord')->name('users.update');//update user
Route::get('/getStates/{cid}', 'UserController@getStates');
Route::get('/getCities/{cid}', 'UserController@getCities');
//Route::get('/', 'Auth\LoginController@showLoginForm')->name('showLoginForm');
Route::get('/userList1', 'UserController@userList1');//datatable
Route::get('/user-table-data', 'UserController@userDataTable');


//Route::match(['post', 'get'], '/add_update', 'UserController@addUser');
//Route::match(['put', 'get'], '/add_update/{id}', 'UserController@updaterecord');


Route::get('/addCategory', 'CategoryController@categoryView');
Route::post('/addCategory', 'CategoryController@insertCategory');
Route::get('/category-table-data', 'CategoryController@categoryDataTable');
Route::delete('/deleteCategory/{id}', 'CategoryController@delcategory');
//Route::match(['post', 'get'], '/addCategory', 'CategoryController@insertCategory');
Route::post('/categoryList', 'CategoryController@categoryList');

//Route::get('/editCategory/{token}', 'UserController@editUserForm');//edit btn



Route::get('/addProduct', 'CategoryController@productView');
Route::get('/getCategory/{cid}', 'CategoryController@getCategory');
Route::post('/addProduct', 'CategoryController@insertProduct');
Route::get('/categoryList', 'CategoryController@categoryList');
Route::delete('/deleteProduct/{id}', 'CategoryController@delProduct');
//Route::delete('/deleteProduct/{id}', 'CategoryController@deleteproduct')->name('users.delete');
//Route::match(['post', 'get'], '/addProduct', 'CategoryController@insertProduct');
Route::get('/productList', 'CategoryController@productList');
Route::get('/product-table-data', 'CategoryController@productDataTable');


Route::get('/addOrder', 'OrderController@orderView');
Route::get('/getProduct/{cid}', 'OrderController@getProducts');
Route::get('/getPrice/{cid}', 'OrderController@getPrices');
Route::post('/addOrder', 'OrderController@insertOrder');
Route::get('/orderListForm', 'OrderController@orderListView');
Route::get('/order-table-data', 'OrderController@orderDataTable');


//Route::post('/login', function () {
//    return redirect('home');
//})->middleware(CheckUser::class);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'dashboard'], function() {
    
    Route::get('/home', 'HomeController@index')->name('home');   
});
Route::group(['prefix' => 'manager', 'namespace' => 'Manager', 'middleware' => 'dashboard'], function() {
   
    Route::get('/home', 'HomeController@index')->name('home');
//    Route::post('/importUsers','HomeController@importUsers');
    
});


Route::get('export', 'CategoryController@export')->name('export');