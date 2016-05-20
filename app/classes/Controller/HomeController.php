<?php namespace Controller;

class HomeController extends \Controller\BaseController {
	
	static $layout = "default";
	
	public function index(){
		return \Bootie\App::view('index',[
			'entry' => \Model\Post::row(['slug' => 'homepage']),
			'posts'	=> \Controller\BlogController::find_by_tag('portfolio')
		]);
	}

	public function page($slug){
		return \Bootie\App::view("static.$slug");
	}
}