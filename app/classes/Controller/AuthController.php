<?php namespace Controller;

define('SALT_LENGTH', 15);

class AuthController extends \Controller\BaseController {
	
	static $salt = "qwepoiasdlkj!";

	function hasher($phrase, &$salt = null)
	{
		$key = '!@#$%^&*()_+=-{}][;";/?<>.,';
	    if ($salt == '')
	    {
	        $salt = substr(hash('sha512',uniqid(rand(), true).$key.microtime()), 0, SALT_LENGTH);
	    }
	    else
	    {
	        $salt = substr($salt, 0, SALT_LENGTH);
	    }
	 
	    return hash('sha512',$salt . $key .  $phrase);
	}

	private function add_session($data){
		$_SESSION['user_id'] = $data->id;
		$_SESSION['username'] = $data->username;
		$_SESSION['group'] = "account";
		$_SESSION['title'] = $data->title;
		$_SESSION['email'] = $data->email;
		$_SESSION['first_name'] = strpos(trim($data->title),' ') === false ? $data->title : strstr($data->title,' ',true);
	}

	public function register_preview(){

		extract($_REQUEST);

		$id = DB::query("select * from users where email = '" . $email . "'",1);
		$json = "email_not_evailable";

		return array('result'=>$json,'id'=>$id);
	}	

	public function register(){

		extract($_POST);

		$username = strtolower($username);
		$email = strtolower($email);

		
		$exists = (new User())
			->where('username','=',$email)
			->where('email','=',$email,' OR ')
			->select('count');

		if( $exists ) {
			return array('result'=>_l('Auth_Email_Exists') . ' : ' . $email);
		}

		$username = cleanMe($_POST('username'));
		$password = cleanMe($_POST('password'));
		$salt = '';
		$hashed_password = HashMe($password, $salt);

		$account = new \Model\User();
		$account->email = $email;
		$account->username = $username;
		$account->pass = $hashed_password;
		$account->salt = $salt;
		$account->created = TIME;
		$account->save(1);

		// $data = DB::query('select * from users where id = ' . $id,1);

		AuthController::add_session($account);

		// sendmail($email,"Tu Blog {$title} ha sido creado",'emails.welcome',$data);

		$json = "ok";

		return array(
			'result' 	=> 	$json,
			'id'		=>	$id
		);
	}

	public function test_email($segments){	

		$to = "telemagico@gmail.com";
		$title = "This is a test Email (tíldes)";
		$data = array(
			'title' => "My Blog Title tíldes eñes",
			'username' => "myblog",
			'author' => "John Dóe"
		);

		sendmail($to,$title,'emails.welcome',$data);
	}

	public function logout(){

		foreach($_SESSION as $k=>$v){
			unset($_SESSION[$k]);
		}

		return redirect("/login",['success' => "Your session has been successfully closed."]);
	}

	public function login(){

		extract($_REQUEST);

		$email = strtolower($email);
		$password = sha1(strtolower($password).self::$salt);
		$json = ['result' => false];

		$user = \Model\User::row([
			"email = '" .  $email . "' AND pass = '" . $password . "' OR username = '" .  $email . "' AND pass = '" . $password . "'"
		]);

		if($user){
			$json['result'] = true;
			$json['redirect'] = "/account";
			
			//DB::write('update users set lastlogin = ' . time() . ' where id = ' . $data['id']);

			self::add_session($user);
		} 

		return $json;
	}	

	public function update_password(){

		extract($_REQUEST);

		$account = \Model\User::row(['username' => session('username')]);
		$account->pass = sha1(strtolower($password).self::$salt);
		$account->save();

		return array('result'=>true); 
	}

	public function reset_pass(){

		extract($_REQUEST);

		$email = strtolower($email);

		$data = DB::query("select * from users 
			where email = '" . $email . "'  
			or username = '" . $email . "'",1);

		$json = 'Email_Username_Not_Found';

		if($data){
			$json = 'Forgot_Pass_Updated';
			$new_pass = chr( mt_rand( ord( 'a' ) ,ord( 'z' ) ) ) . substr( md5( time( ) ) ,1 );
			$data['new_pass'] = $new_pass;
			DB::write("update users set pass = '" . sha1($new_pass.self::$salt) . "' where id = " . $data['id']);
			sendmail($data['email'], $data['author'] . ", tu contraseña ha sido actualizada",'emails.pass_recovery',$data);
		} 

		return array(
			'result' => $json
		);
	}	
}