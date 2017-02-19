<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/adminlogin', function(){
    return view('auth.login');
})->name('login.admin');

Route::get('/deletepdf/{id}', [
        'uses' => 'UploadFileController@deletepdf',
        'as' => 'delete.pdf'
    ]);


Route::post('/upload', [
        'uses' => 'UploadFileController@upload',
        'as' => 'upload.file'
    ]);

Route::get('/pdf/{filename}', [
        'uses' => 'UploadFileController@pdf',
        'as' => 'pdf.file'
    ]);
// Home Controllers
Route::get('/', 'HomeController@index')->name('home');
Route::get('myposts/{id}', 'HomeController@myPosts')->name('myposts');
Route::get('accounts', 'HomeController@accounts')->name('accounts')->middleware('superadmin');
Route::patch('update/role/{id}', 'HomeController@updateRole')->name('update.role')->middleware('superadmin');
Route::patch('update/position/{id}', 'HomeController@updatePosition')->name('update.position')->middleware('superadmin');
Route::get('myposts/sortby/{id}', 'HomeController@myPostsSortBy')->name('myposts.sortBy');
Route::get('admin/pendingposts/sortby', 'HomeController@pendingSortBy')->name('pending.sortBy');
Route::get('admin/pendingposts', 'HomeController@pendingPosts')->name('pending.posts')->middleware('superadmin');
Route::get('error', 'HomeController@error')->name('errors.503');
Route::get('about', 'HomeController@about')->name('about');
Route::patch('about/{id}', 'HomeController@aboutUpdate')->name('about.update')->middleware('superadmin');
Route::get('terms', 'HomeController@terms')->name('terms');
Route::patch('terms/{id}', 'HomeController@termsUpdate')->name('terms.update')->middleware('superadmin');
Route::get('privacy', 'HomeController@privacy')->name('privacy');
Route::patch('privacy/{id}', 'HomeController@privacyUpdate')->name('privacy.update')->middleware('superadmin');
// Side panels
Route::patch('weather/{id}', 'HomeController@weatherUpdate')->name('weather.update')->middleware('superadmin');
Route::patch('calendar/{id}', 'HomeController@calendarUpdate')->name('calendar.update')->middleware('superadmin');
Route::patch('selfopinion/{id}', 'HomeController@selfopinionUpdate')->name('selfopinion.update')->middleware('superadmin');
Route::patch('readalso/{id}', 'HomeController@readalsoUpdate')->name('readalso.update')->middleware('superadmin');
Route::patch('fromweb/{id}', 'HomeController@fromwebUpdate')->name('fromweb.update')->middleware('superadmin');
Route::patch('outsidesports/{id}', 'HomeController@outsidesportsUpdate')->name('outsidesports.update')->middleware('superadmin');
// Account Settings
Route::get('settings', 'HomeController@settings')->name('settings');
Route::patch('settings/{id}/change_password', 'HomeController@changePassword')->name('change.password');
Route::patch('settings/{id}/change_name', 'HomeController@changeName')->name('change.name');
Route::patch('settings/{id}/change_username', 'HomeController@changeUsername')->name('change.username');
Route::patch('settings/{id}/change_email', 'HomeController@changeEmail')->name('change.email');
// Announcement
Route::get('create/announcement', 'HomeController@createAnnouncement')->middleware('superadmin');
Route::post('store/announcement', 'HomeController@storeAnnouncement')->name('store.announcement')->middleware('superadmin');
Route::get('edit/announcement/{id}', 'HomeController@editAnnouncement')->name('edit.announcement')->middleware('superadmin');
Route::patch('update/announcement/{id}', 'HomeController@updateAnnouncement')->name('update.announcement')->middleware('superadmin');
Route::delete('delete/announcement/{id}', 'HomeController@deleteAnnouncement')->name('delete.announcement')->middleware('superadmin');
// Search
Route::get('search', 'HomeController@search')->name('search');
Route::any('items', 'HomeController@items')->name('search.items');
// Posts
Route::resource('posts', 'PostsController');
Route::get('news', 'PostsController@newsIndex')->name('index.news');
Route::get('editorial', 'PostsController@editorialIndex')->name('index.editorial');
Route::get('feature', 'PostsController@featureIndex')->name('index.feature');
Route::get('opinion', 'PostsController@opinionIndex')->name('index.opinion');
Route::get('humor', 'PostsController@humorIndex')->name('index.humor');
Route::get('sports', 'PostsController@sportsIndex')->name('index.sports');
Route::post('posts/comment/{id}', 'PostsController@comment')->name('comment');
Route::get('posts/comment/destroy/{id}', 'PostsController@commentDestroy')->name('comment.destroy');
Route::get('posts/featured/{id}', 'PostsController@featured')->name('posts.featured')->middleware('superadmin');
Route::get('posts/unfeatured/{id}', 'PostsController@unfeatured')->name('posts.unfeatured')->middleware('superadmin');
Route::get('posts/approved/{id}', 'PostsController@approved')->name('posts.approved')->middleware('superadmin');
Route::get('posts/disapproved/{id}', 'PostsController@disapproved')->name('posts.disapproved')->middleware('superadmin');
Route::get('sortby/{category}', 'PostsController@sortBy')->name('sortBy');
// Mood
Route::post('mood/store/{id}', 'PostsController@moodStore')->name('mood.store');
// Report
Route::get('reports', 'PostsController@reports')->name('reports')->middleware('superadmin');
Route::post('report/{id}', 'PostsController@reportStore')->name('reports.store');
// Filemanager
$middleware = array_merge(\Config::get('lfm.middlewares'), ['\Unisharp\Laravelfilemanager\middleware\MultiUser']);
$prefix = \Config::get('lfm.prefix', 'laravel-filemanager');
$as = 'unisharp.lfm.';
$namespace = '\Unisharp\Laravelfilemanager\controllers';
// make sure authenticated
Route::group(compact('middleware', 'prefix', 'as', 'namespace'), function () {
    // Show LFM
    Route::get('/', [
        'uses' => 'LfmController@show',
        'as' => 'show'
    ]);
    // upload
    Route::any('/upload', [
        'uses' => 'UploadController@upload',
        'as' => 'upload'
    ]);
    // list images & files
    Route::get('/jsonitems', [
        'uses' => 'ItemsController@getItems',
        'as' => 'getItems'
    ]);
    // folders
    Route::get('/newfolder', [
        'uses' => 'FolderController@getAddfolder',
        'as' => 'getAddfolder'
    ]);
    Route::get('/deletefolder', [
        'uses' => 'FolderController@getDeletefolder',
        'as' => 'getDeletefolder'
    ]);
    Route::get('/folders', [
        'uses' => 'FolderController@getFolders',
        'as' => 'getFolders'
    ]);
    // crop
    Route::get('/crop', [
        'uses' => 'CropController@getCrop',
        'as' => 'getCrop'
    ]);
    Route::get('/cropimage', [
        'uses' => 'CropController@getCropimage',
        'as' => 'getCropimage'
    ]);
    // rename
    Route::get('/rename', [
        'uses' => 'RenameController@getRename',
        'as' => 'getRename'
    ]);
    // scale/resize
    Route::get('/resize', [
        'uses' => 'ResizeController@getResize',
        'as' => 'getResize'
    ]);
    Route::get('/doresize', [
        'uses' => 'ResizeController@performResize',
        'as' => 'performResize'
    ]);
    // download
    Route::get('/download', [
        'uses' => 'DownloadController@getDownload',
        'as' => 'getDownload'
    ]);
    // delete
    Route::get('/delete', [
        'uses' => 'DeleteController@getDelete',
        'as' => 'getDelete'
    ]);
    Route::get('/demo', 'DemoController@index');
});
// Redirect wrong url
Route::get('/{any}', function($any){
    return redirect()->route('errors.503');
})->where('any', '.*');