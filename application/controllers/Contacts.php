<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Frontend_core.php';

class Contacts extends Frontend_core {

	public function index(){
		$this->showall('contacts','Контакты');
	}

	//Add new message
	public function add_message(){
		if(!empty($_POST)) {
			$this->load->model('message');
			$new_message = $this->message->add($_POST);
			if($new_message) {
				
				$endl = PHP_EOL;
				
				$to = $this->service_email;

				$from = strip_tags($_POST['email']);
				$from = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $from);
				$from = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $from);

				$subject = $_POST['subject'];

				$headers = "From: ". $from . $endl;
				$headers .= "Reply-To: " . $from . $endl;
				$headers .= "MIME-Version: 1.0" . $endl;
				$headers .= "Content-Type: text/html; charset=UTF-8". $endl . $endl;

				$message = $_POST['message'];

				mail($to, $subject, $message, $headers);

				echo json_encode(array(
					'status' => true,
					'message_title' => 'Спасибо за вопрос!',
					'message_body' => 'Ваше мнение очень важно для нас, мы обязательно с Вами свяжемся',
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
}
