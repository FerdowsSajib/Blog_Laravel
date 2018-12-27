<?php

/*
Route::get('/', function () {
    return view('welcome');
});
*/
// --- ERROR ROUTES ---
Route::get('/404',[
    'uses'  =>  'ErrorController@error404',
    'as'    =>  '404'
]);

Route::get('/405',[
    'uses'  =>  'ErrorController@error405',
    'as'    =>  '405'
]);


// --- FRONT-END ROUTES ---
Route::get('/', [
    'uses'  =>  'BlogProjectController@index',
    'as'    =>  '/'
]);

Route::get('/category-blog/{id}-{name}', [
    'uses'  =>  'BlogProjectController@categoryBlog',
    'as'    =>  'category-blog'
]);

Route::get('/blog/blog-details/{id}', [
    'uses'  =>  'BlogProjectController@blogDetails',
    'as'    =>  'blog-details'
]);

Route::get('/visitor-sign-up', [
    'uses'  =>  'VisitorController@visitorSignUp',
    'as'    =>  'visitor-sign-up'
]);

Route::post('/add-new-visitor', [
    'uses'  =>  'VisitorController@addNewVisitor',
    'as'    =>  'add-new-visitor'
]);

Route::post('/visitor-logout', [
    'uses'  =>  'VisitorController@visitorLogout',
    'as'    =>  'visitor-logout'
]);

Route::get('/visitor-login', [
    'uses'  =>  'VisitorController@visitorLogin',
    'as'    =>  'visitor-login'
]);

Route::post('/visitor-login-check', [
    'uses'  =>  'VisitorController@visitorLoginCheck',
    'as'    =>  'visitor-login-check'
]);

Route::get('/email-check/{email}', [
    'uses'  =>  'VisitorController@emailCheck',
    'as'    =>  'email-check'
]);

Route::post('/add-new-comment', [
    'uses'  =>  'CommentController@addNewComment',
    'as'    =>  'add-new-comment'
]);


//==============================================//
// --- AUTH ROUTES ---
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//==============================================//
// --- ADMIN ROUTES ---

Route::group(['middleware' => ['super-admin']], function () {
    //CATEGORY ROUTES
    Route::get('/category/add-category', [
        'uses'  => 'CategoryController@addCategory',
        'as'    => 'add-category'
    ]);

    Route::post('/category/add-new-category', [
        'uses'  => 'CategoryController@addNewCategory',
        'as'    => 'add-new-category'
    ]);

    Route::get('/category/manage-category', [
        'uses'  => 'CategoryController@manageCategory',
        'as'    => 'manage-category'
    ]);

    Route::get('/category/edit-category/{id}', [
        'uses'  => 'CategoryController@editCategory',
        'as'    => 'edit-category'
    ]);

    Route::post('/category/update-category', [
        'uses'  => 'CategoryController@updateCategory',
        'as'    => 'update-category'
    ]);

    Route::post('/category/delete-category', [
        'uses'  => 'CategoryController@deleteCategory',
        'as'    => 'delete-category'
    ]);
});


//==============================================//
// BLOG ROUTES
Route::get('/blog/add-blog', [
    'uses'  => 'BlogController@addBlog',
    'as'    => 'add-blog'
]);

Route::post('/blog/add-new-blog', [
    'uses'  => 'BlogController@addNewBlog',
    'as'    => 'add-new-blog'
]);

Route::get('/blog/manage-blog', [
    'uses'  => 'BlogController@manageBlog',
    'as'    => 'manage-blog'
]);

Route::get('/blog/edit-blog/{id}', [
    'uses'  => 'BlogController@editBlog',
    'as'    => 'edit-blog'
]);

Route::post('/blog/update-blog', [
    'uses'  => 'BlogController@updateBlog',
    'as'    => 'update-blog'
]);

Route::post('/blog/delete-blog', [
    'uses'  => 'BlogController@deleteBlog',
    'as'    => 'delete-blog'
]);


//==============================================//
// BLOG ROUTES

Route::get('/manage-comment', [
    'uses'  => 'CommentController@manageComment',
    'as'    => 'manage-comment'
]);

Route::get('/unpublished-comment/{id}', [
    'uses'  => 'CommentController@unpublishedComment',
    'as'    => 'unpublished-comment'
]);

Route::get('/published-comment/{id}', [
    'uses'  => 'CommentController@publishedComment',
    'as'    => 'published-comment'
]);







