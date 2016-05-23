<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
View::addExtension('html', 'php');
Route::get('/api/list', "ApiController@getList");
Route::get('/', 'Auth\AuthController@getLogin');
/*Route::get('/', function(){
    return view('test');
});*/

Route::get('/blog/2', 'BlogController@index');

Route::get('article/{id}', 'ArticleController@show');

// -----------------------  Authentication routes    ----------------------------------

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout',
            [
                'uses'  =>  'Auth\AuthController@getLogout',
                'as'    =>  'admin_logout'
            ]
);

// -----------------------  Frontend    ----------------------------------

Route::get('{user_id}/article-category/{id}',[
    'uses'  => 'ArticleController@itemListWithCategory',
    'as'    => 'item_list_with_category'
])->where('user_id', '[0-9]+')
->where('id', '[0-9]+');


    Route::group(['prefix' => 'category'], function(){

        Route::get  ('/', 'CategoryController@index');
        Route::post ('/', 'CategoryController@store');

        Route::get('create',
                [   'uses'  => 'CategoryController@create',
                    'as'    => 'category_create'
                ]);

        Route::get('destroy/{id}',
            [   'uses'  => 'CategoryController@destroy',
                'as'    => 'category_destroy'
            ])->where('id', '[0-9]+');


        Route::post('delete_multiple_items',
            [   'uses'  => 'CategoryController@deleteMultipleItems',
                'as'    => 'delete_multiple_items']);

        Route::get('edit/{id}',
            [   'uses'  => 'CategoryController@edit',
                'as'    => 'category_edit'
            ])->where('id', '[0-9]+');

        Route::post('update/{id}',
            [
                'uses'  => 'CategoryController@update',
                'as'    => 'category_update'
            ])->where('id', '[0-9]+');

    });


Route::get('{user_id}/article', 'ArticleController@itemList')->where('user_id', '[0-9]+');

Route::get('article/{id}/{category_id}/{user_id}', [
    'uses'  => 'ArticleController@show',
    'as'    => 'article_detail'
])->where('id', '[0-9]+')
->where('category_id', '[0-9]+')
->where('user_id', '[0-9]+');


// -----------------------  Registration    ----------------------------------

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


// -----------------------  Admin   ----------------------------------

Route::group(['prefix' => 'admin', 'middleware'  => 'auth'], function(){

    Route::group(['prefix' => 'article'], function(){

        Route::get('/', 'ArticleController@index');
        Route::post('/', 'ArticleController@store');

        Route::get('create', [
            'uses'  => 'ArticleController@create',
            'as'    => 'article_create'
        ]);

        Route::post('delete_multiple_items',[
            'uses'  => 'ArticleController@deleteMultipleItems',
            'as'    => 'article_delete_multiple_items'
        ]);

        Route::get('destroy/{id}', [
            'uses'  => 'ArticleController@destroy',
            'as'    => 'article_destroy'
        ])->where('id', '[0-9]+');

        Route::get('edit/{id}',
            [
                'uses'  => 'ArticleController@edit',
                'as'    => 'article_edit'
            ])->where('id', '[0-9]+');

        Route::post('update/{id}',
            [
                'uses'  => 'ArticleController@update',
                'as'    => 'article_update'
            ]);
    });

    Route::group(['prefix' => 'category'], function(){

        Route::get  ('/', 'CategoryController@index');
        Route::post ('/', 'CategoryController@store');

        Route::get('create',
                [   'uses'  => 'CategoryController@create',
                    'as'    => 'category_create'
                ]);

        Route::get('destroy/{id}',
            [   'uses'  => 'CategoryController@destroy',
                'as'    => 'category_destroy'
            ])->where('id', '[0-9]+');


        Route::post('delete_multiple_items',
            [   'uses'  => 'CategoryController@deleteMultipleItems',
                'as'    => 'delete_multiple_items']);

        Route::get('edit/{id}',
            [   'uses'  => 'CategoryController@edit',
                'as'    => 'category_edit'
            ])->where('id', '[0-9]+');

        Route::post('update/{id}',
            [
                'uses'  => 'CategoryController@update',
                'as'    => 'category_update'
            ])->where('id', '[0-9]+');

    });

    Route::group(['prefix' => 'function_type'],function(){

        Route::get('/','AdminFunctionTypeController@index');

        Route::post('/','AdminFunctionTypeController@store');

        Route::get('create',
            [   'uses' => 'AdminFunctionTypeController@create',
                'as' => 'function_type_create']);

        Route::get('destroy/{id}',
                    [   'uses' => 'AdminFunctionTypeController@destroy',
                        'as'   => 'function_type_destroy'])
                        ->where('id', '[0-9]+');

        Route::post('delete_multiple_items',
            [   'uses'  => 'AdminFunctionTypeController@deleteMultipleItems',
                'as'    => 'delete_multiple_items']);

        Route::get('edit/{id}',
                    [   'uses' => 'AdminFunctionTypeController@edit',
                        'as'   => 'function_type_edit'])
                        ->where('id', '[0-9]+');

        Route::post('update/{id}',
                    [   'uses'  => 'AdminFunctionTypeController@update',
                        'as'    => 'function_type_update'])
                        ->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'function'],function(){

        Route::get('/','AdminFunctionController@index');

        Route::post('/','AdminFunctionController@store');

        Route::get('create',
                    [   'uses' => 'AdminFunctionController@create',
                        'as' => 'function_create']);

        Route::post('delete_multiple_items',
            [   'uses'  => 'AdminFunctionController@deleteMultipleItems',
                'as'    => 'delete_multiple_items']);

        Route::get('destroy/{id}',
                    [   'uses' => 'AdminFunctionController@destroy',
                        'as'   => 'function_destroy'])
                        ->where('id', '[0-9]+');

        Route::get('edit/{id}',
                    [   'uses' => 'AdminFunctionController@edit',
                        'as'   => 'function_edit'])
                        ->where('id', '[0-9]+');

        Route::post('update/{id}',
                    [   'uses'  => 'AdminFunctionController@update',
                        'as'    => 'function_update'])
                        ->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'homepage'], function(){

        Route::get('/',
             [   'uses'  => 'HomepageController@index',
                 'as'    => 'homepage'
             ]
        );

    });

    Route::group(['prefix' => 'user'], function(){

        Route::get  ('/', 'UserController@index');

        Route::post ('/', 'UserController@store');

        Route::get  ('/create', [
            'uses'  => 'UserController@create',
            'as'    => 'user_create'
        ]);

        Route::get  ('/edit/{id}',
            [   'uses'  => 'UserController@edit',
                'as'    => 'user_edit'])
            ->where('id', '[0-9]+');

        Route::post ('update/{id}',
            [   'uses'  => 'UserController@update',
                'as'    => 'user_update'])
            ->where('id', '[0-9]+');

        Route::get  ('destroy/{id}',
            [   'uses'  => 'UserController@destroy',
                'as'    => 'user_destroy'])
            ->where('id', '[0-9]+');

        Route::post('delete_multiple_items',
            [   'uses'  => 'UserController@deleteMultipleItems',
                'as'    => 'delete_multiple_items'
            ]);
    });
});
