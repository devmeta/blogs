<?php namespace Controller;

class PostController extends \Controller\BaseController {
	
	static $layout = "account";

	public function index(){

		$entries = \Model\Post::paginate([
			'updated' => "DESC"
		],[
			'user_id' => session('user_id')
		],10);

		return \Bootie\App::view('account.posts.index',[
			'entries'	=> $entries
		]);
	}

	public function create(){

		$p = new \Model\Post();
		$p->{'title_' . LOCALE} = 'New Post';
		$p->user_id = session('user_id');
		$p->created = TIME;
		$p->updated = TIME;
		$p->save();
		$id = $p->id;

		$entry = \Model\Post::row([
			'id' => $id
		]);
		
		return \Bootie\App::view('account.posts.edit',[
			'entry'	=> $entry
		]);
	}

	public function edit($id){

		if(is_numeric($id))
		{
			$entry = \Model\Post::row([
				'id' => $id
			]);
			
			return \Bootie\App::view('account.posts.edit',[
				'entry'	=> $entry
			]);
		}
		
		return \Exception('Post ID was not provided');
	}

	public function update($id){

		if(is_numeric($id))
		{

			extract($_POST);

			$entry = new \Model\Post();
			$entry->id = $id;
			$entry->slug = ! empty($slug) ? $slug : sanitize(${'title_' . LOCALE},false);
			$entry->updated = TIME;

			foreach(config()->languages as $lang){
				$entry->{'title_' . $lang} = ${'title_' . $lang};
				$entry->{'caption_' . $lang} = ${'caption_' . $lang};
				$entry->{'content_' . $lang} = ${'content_' . $lang};
			}

			$result = $entry->save();

			return redirect('/account/posts',[
				'success' => "Entry <strong>{$entry->{'title_' . $lang}}</strong> has been updated"
			]);
		}

		return redirect('/account/posts',[
			'danger' => "Entry ID was not provided"
		]);
	}

	public function delete($id){

		if(is_numeric($id))
		{
			$entry = \Model\Post::row([
				'id' => $id
			]);

			if( $entry )
			{

				$tags = \Model\PostTag::row([
					'post_id' => $id
				]);

				if($tags)
				{
					$tags->delete();
				}

				foreach($entry->files() as $file)
				{
					\Bootie\Image::destroy_group($file->name,'posts');

					\Model\File::row([
						'id' => $file->id
					])->delete();
				}

				$title = $entry->{'title_' . LOCALE};
				$entry->delete();

				return redirect('/account/posts',[
					'success' => "Entry <strong>{$title}</strong> has been deleted"
				]);
			}
		}

		return redirect('/account/posts',[
			'danger' => "Entry was not found"
		]);
	}
}