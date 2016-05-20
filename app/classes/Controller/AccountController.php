<?php namespace Controller;

class AccountController extends \Controller\BaseController {
	
	static $layout = "account";

	public function index(){
		return \Bootie\App::view('account.dash',[
			'posts_count'	=> \Model\Post::count()
		]);
	}
}