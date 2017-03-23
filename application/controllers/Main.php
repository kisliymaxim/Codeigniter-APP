<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Frontend_core.php';

class Main extends Frontend_core {

	public function index(){
		$this->showall('main','Главная');
	}

	// Check unique login on Registr form Main Page
	public function check_login(){
		if(isset($_POST['username'])){
			$exist = $this->User->check_login($_POST['username']);
			if(empty($exist)) {
				echo json_encode(array('valid' => true));
			}
			else {
				echo json_encode(array('valid' => false));
			}
		}
	}

	//Create new user
	public function registr(){
		if(!empty($_POST)){

			$secret = '6LdL9BkUAAAAAACFkU-EiM69khphVJJYNm4ELJJL';
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if(!$responseData->success){
				echo json_encode(array(
					'status' => false,
					'message_title' => 'К сожалению ...',
					'message_body' => 'Что-то пошло не так, обновите страницу и попробуйте еще раз',
				));
				return false;
			}

			$user = $_POST;
			unset($user['confirm_password']);
			unset($user['g-recaptcha-response']);
			unset($user['recaptcha_valid']);
			$new_user = $this->User->add($user);
			if($new_user) {
				
				$endl = PHP_EOL;

				$to = $user['email'];

				$from = strip_tags($this->service_email);
				$from = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $from);
				$from = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $from);

				$subject = 'Успешная регистрация';

				$headers = "From: ". $from . $endl;
				$headers .= "Reply-To: " . $from . $endl;
				$headers .= "MIME-Version: 1.0" . $endl;
				$headers .= "Content-Type: text/html; charset=UTF-8". $endl . $endl;

				$message = 'Спасибо за регистрацию!';

				mail($to, $subject, $message, $headers);


				echo json_encode(array(
					'status' => true,
					'message_title' => 'Поздравляем!',
					'message_body' => 'Вы успешно зарегистрировались. Авторизуйтесь для дальнейшей работы.',
				));
			}
			else {
				echo json_encode(array(
					'status' => false,
					'message_title' => 'К сожалению ...',
					'message_body' => 'Просим прощения, но что-то пошло не так.',
				));
			}
		}
		else {
			echo json_encode(array(
				'status' => false,
				'message_title' => 'К сожалению ...',
				'message_body' => 'Просим прощения, но что-то пошло не так.',
			));
		}
	}

	//Login user, create user session
	public function auth(){
		if(!empty($_POST)){
			$userrow = $this->User->row(array('username'=>$_POST['username'], 'password'=>$_POST['password']));
			if($userrow) {
				$_SESSION['uid'] = $userrow['id'];
				echo json_encode(array(
					'status' => true
				));
			}
			else {
				echo json_encode(array(
					'status' => false,
					'message_title' => 'Ошибка!',
					'message_body' => 'Логин или пароль не верен.'
				));
			}
		}
	}

	//Logout user, del user session
	public function logout(){
		unset($_SESSION['uid']);
		header("Location: ".config_item('base_url'));
	}

	// Show 404 Page
	public function error_404(){
		show_404();
	}
}
