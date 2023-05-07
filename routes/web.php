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

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['middleware'=>'IsAdmin'], function(){


    Route::get('/admin', 'HomeController@mainpage')->name('adminpage');

    Route::resource('admin/users', 'AdminUsersController',['names'=>[
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'
    ]]);

    Route::resource('admin/slider', 'AdminSliderController',['names'=>[
        'index'=>'admin.slider.index',
        'create'=>'admin.slider.create',
        'store'=>'admin.slider.store',
        'edit'=>'admin.slider.edit'
    ]]);

    Route::resource('admin/banner', 'AdminBannerController',['names'=>[
        'index'=>'admin.banner.index',
        'create'=>'admin.banner.create',
        'store'=>'admin.banner.store',
        'edit'=>'admin.banner.edit'
    ]]);

    Route::resource('admin/about', 'AdminAboutController',['names'=>[
        'index'=>'admin.about.index'
    ]]);

    Route::resource('admin/blog/arxiv', 'AdminBlogArxivController',['names'=>[
        'index'=>'admin.blog.arxiv.index',
        'create'=>'admin.blog.arxiv.create',
        'store'=>'admin.blog.arxiv.store',
        'edit'=>'admin.blog.arxiv.edit'
    ]]);


    Route::resource('admin/blog', 'AdminBlogController',['names'=>[
        'index'=>'admin.blog.index',
        'create'=>'admin.blog.create',
        'store'=>'admin.blog.store',
        'edit'=>'admin.blog.edit'
    ]]);


    Route::get('/arxiv_elanlar/', 'PageController@elan')->name('herracElan');

    Route::resource('admin/yenilikler', 'AdminYeniliklerController',['names'=>[
        'index'=>'admin.yenilikler.index',
        'create'=>'admin.yenilikler.create',
        'store'=>'admin.yenilikler.store',
        'edit'=>'admin.yenilikler.edit'
    ]]);

    Route::resource('admin/partners', 'AdminPartnersController',['names'=>[
        'index'=>'admin.partners.index',
        'create'=>'admin.partners.create',
        'store'=>'admin.partners.store',
        'edit'=>'admin.partners.edit'
    ]]);

    Route::get('/deletePicturepicture', 'AdminBlogController@deletePicturepicture');


    Route::resource('admin/contact', 'AdminContactController',['names'=>[
        'index'=>'admin.contact.index'
    ]]);
});



    Route::get('/', 'PageController@index')->name('homepage');
    Route::get('/aboutus', 'PageController@aboutus')->name('about_us');
    Route::get('/contact', 'PageController@contact')->name('contact');
    Route::post('sendMailContact', 'PhpMaillerController@sendMailContact')->name("sendMailContact");
    Route::get('/herrac-elanlar', 'PageController@herracElanlar')->name('herracElanlar');
    Route::get('/herrac-teshkilatlari', 'PageController@herracTeshkilatlari')->name('herracTeshkilatlari');
    Route::get('/birja-yenilikler', 'PageController@birjaYenilikler')->name('birjaYenilikler');
    Route::get('/herrac-elanlar/{id}', 'PageController@elan')->name('herracElan');
    Route::get('/birja-yenilikler/{id}', 'PageController@elan')->name('birjaYenilik');
    Route::get('/herrac-elanlar/{herrac}/{id}', 'PageController@elanlar_by_herrac')->name('elanlarByHerrac');
    Route::get('/notfound', 'PageController@notfound')->name('notfound');

    Auth::routes();
