<?php namespace Controller;

class WordController extends \Controller\BaseController {
	
	static $layout = "account";

	public function index(){

		$entries = \Model\Word::paginate([
			'updated' => "DESC"
		],null,10);

		return \Bootie\App::view('account.words.index',[
			'entries'	=> $entries
		]);
	}

	public function create(){
		return \Bootie\App::view('account.words.create');
	}

	public function edit($id){

		if(is_numeric($id))
		{
			$entry = \Model\Word::row([
				'id' => $id
			]);
			
			return \Bootie\App::view('account.words.edit',[
				'entry'	=> $entry
			]);
		}
		
		return \Exception('Word ID was not provided');
	}

	public function update($id){

		@extract($_POST);

		$entry = new \Model\Word();		

		if($id){
			$entry->id = $id;
		} else {
			$entry->created = TIME;	
		}

		$entry->word_key = $word_key;

		foreach(config()->languages as $lang){
			$entry->{'word_' . $lang} = ${'word_' . $lang};
		}

		$entry->updated = TIME;
		$entry->save();

		return redirect('/account/words',[
			'success' => "Entry <strong>{$word_key}</strong> has been updated"
		]);
	}

	public function delete($id){

		if(is_numeric($id))
		{
			$entry = \Model\Word::row([
				'id' => $id
			]);

			if( $entry )
			{

				$title = $entry->word_key;
				$entry->delete();

				return redirect('/account/words',[
					'success' => "Entry <strong>{$title}</strong> has been deleted"
				]);
			}
		}

		return redirect('/account/words',[
			'danger' => "Entry was not found"
		]);
	}
}