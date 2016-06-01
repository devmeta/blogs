<?php 

use \Bootie\App as App;

/* public */
App::route('/',			['uses' => 'Controller\HomeController@index']);
App::route('/blog',		['uses' => 'Controller\BlogController@index']);
App::route('/blog/([^/]+)', [ 'uses' => 'Controller\BlogController@show']);
App::route('/blog/files/(\d+)', [ 'uses' => 'Controller\BlogController@files']);
App::route('/blog/tag/([^/]+)', [ 'uses' => 'Controller\BlogController@tag']);
App::route('/login', 	[ 'uses' => 'Controller\AuthController@login','method' => 'post']);
App::route('/update-pass', 	[ 'uses' => 'Controller\AuthController@update_password','method' => 'post','before' => 'auth.account']);
App::route('/logout', 	[ 'uses' => 'Controller\AuthController@logout']);

/* private */
App::route('/account', 	[ 'uses' => 'Controller\AccountController@index','before' => 'auth.account']);
App::resource('/account/posts', [ 'uses' => 'Controller\PostController','before' => 'auth.account']);
App::resource('/account/words', [ 'uses' => 'Controller\WordController','before' => 'auth.account']);
App::route('/account/tags/relation/remove/(\d+)', [ 'uses' => 'Controller\TagController@remove_relation','method' => 'post','before' => 'auth.account']);
App::route('/account/tags/relation/add/(\d+)', [ 'uses' => 'Controller\TagController@add_relation','before' => 'auth.account','method' => 'post']);
App::route('/account/tags/post/(\d+)', [ 'uses' => 'Controller\TagController@tags','before' => 'auth.account']);
App::route('/account/files/resize', [ 'uses' => 'Controller\FileController@resize','method' => 'post','before' => 'auth.account']);
App::route('/account/files/upload', [ 'uses' => 'Controller\FileController@upload','before' => 'auth.account']);
App::route('/account/files/order', [ 'uses' => 'Controller\FileController@order','method' => 'post','before' => 'auth.account']);
App::route('/account/files/remove', [ 'uses' => 'Controller\FileController@destroy','method' => 'post','before' => 'auth.account']);

/* public pages */
App::route('/(.*)', [ 'uses' => 'Controller\HomeController@page']);

/* filters */
App::filter('auth.account',function(){
	if( ! session('user_id') || session('group') !== 'account'){
		return redirect('/login','Your session has expired');
	}
});