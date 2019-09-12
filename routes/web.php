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

Route::get('gg',function(){
return \Illuminate\Support\Facades\Request::url();
});

Route::get('/', 'PageController@home');


Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/module', 'ModuleController@index');

Route::group(['middleware' => 'language'], function () {
    Auth::routes();

    Route::group(['middleware' => 'auth'], function () {

        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
        Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
        Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
        App::setLocale('bn');

        Route::get('/package/buy', 'PackageController@buyPackageIndex');
        Route::post('/package/buy', 'PackageController@buyPackage')->name('buyPackage');
        Route::get('/package/my', 'PackageController@userPackages');
        Route::get('/statements/my', 'StatementController@index')->name('myStatements');

    });

});


Route::group(['middleware' => 'admin'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('/plugins', 'PluginController@index')->name('plugins');
    Route::get('/theme', 'ThemeController@index')->name('themes');
    Route::get('/theme/preview/{name}', 'ThemeController@preview')->name('themePreview');
    Route::get('/theme/settings/{name}', 'ThemeController@settings');
    Route::get('/theme/active/{name}', 'ThemeController@active');
    Route::get('/plugin/{action}/{name}', 'PluginController@action');
    Route::get('/payment', 'PaymentController@index');
    Route::post('/payment', 'PaymentController@pay')->name('payment');
    Route::get('/packages', 'PackageController@show');
    Route::get('/packages/edit/{id}', 'PackageController@edit');
    Route::get('/packages/delete/{id}', 'PackageController@delete');
    Route::get('/packages/add', 'PackageController@index');
    Route::post('/packages/add', 'PackageController@create')->name('createPackage');
    Route::post('/packages/update', 'PackageController@update')->name('updatePackage');
    Route::get('/packages/add/{name}', 'PackageController@addIndex');
    Route::get('/admin/settings', 'SettingsController@home')->name('settings');
    Route::get('/admin/menu', 'SettingsController@menu')->name('menu');
    Route::post('/admin/settings', 'SettingsController@update')->name('updateSettings');
    Route::post('/admin/theme/settings', 'SettingsController@update')->name('updateThemeSettings');
    Route::get('/admin/config', 'SettingsController@env')->name('config');
    Route::get('/widgets', 'WidgetController@index')->name('widgets');
    Route::get('/page/front', 'PageController@frontPage');
    Route::get('/page/dashboard', 'PageController@dashboardPage');
    Route::post('/page/update', 'PageController@updateFront')->name('updateFront');
    Route::get('/translate', 'TranslationController@index');
    Route::get('/backup', 'SettingsController@backup')->name('backup');
    Route::get('/statements/admin', 'StatementController@admin')->name('statements');
});



