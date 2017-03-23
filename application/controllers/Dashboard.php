<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Frontend_core.php';

class Dashboard extends Frontend_core {

	public function index() {
		$this->check_user();
		$this->showall('dashboard', 'Личный кабинет');
	}

	//Update user info on Dashboard page
	public function update($id) {
		$response = array();

		if(!empty($_FILES['avatar']['name'])) {

			$tempFile = $_FILES['avatar']['tmp_name'];
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/upload';
			$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['avatar']['name'];

			if (file_exists($targetFile)){
				$updatedFileName = $this->update_file_name($targetFile);
				$targetFile = $updatedFileName;
			}

			if (move_uploaded_file($tempFile,$targetFile)){
				$response['file'] = config_item('upl_url').basename($targetFile);
				$_POST['avatar'] = basename($targetFile);

				if(!empty($_POST['avatar_original'])){
					unlink( rtrim($targetPath,'/') . '/' . $_POST['avatar_original']);
				}
			}
			else{
				$response['file'] = false;
			}
		}
		else{
			$response['file'] = false;
		}
		if(!empty($_POST)){

			unset($_POST['confirm_password']);
			unset($_POST['avatar_original']);

			$user = $this->User->update($_POST,$id);

			if($user) {
				$response['user'] = $user;
				$response['message_title'] = 'Поздравляем!';
				$response['message_body'] = 'Данные успешно обновлены.';
			}
			else {
				$response['user'] = 'false';
				$response['message_title'] = 'К сожалению ...';
				$response['message_body'] = 'Просим прощения, но что-то пошло не так.';
			}
		}
		echo json_encode($response);
	}

	// Call this method if file name exist
	protected function update_file_name($file){

		$pos = strrpos($file,'.');
		$ext = substr($file,$pos);
		$dir = strrpos($file,'/');
		$dr  = substr($file,0,($dir+1));
		$arr = explode('/',$file);
		$fName = trim($arr[(count($arr) - 1)],$ext);

		$exist = FALSE;
		$i = 1;
		while(!$exist){

			$file = $dr.$fName.'_'.$i.$ext;
			$i++;
			if(file_exists($file)){
				continue;
			}
			else{
				$exist = TRUE;
			}
		}
		return $file;
	}

	// Check unique login on form Dashboard Page
	public function check_login() {
		if(isset($_POST['username']) && isset($_POST['username_original'])){
			if($_POST['username'] != $_POST['username_original']) {
				$exist = $this->User->check_login($_POST['username']);
				if (empty($exist)) {
					echo json_encode(array('valid' => true));
				}
				else {
					echo json_encode(array('valid' => false));
				}
			}
			else{
				echo json_encode(array('valid' => true));
			}
		}
	}

	// Delete user account
	public function delete_account($id){
		if(isset($id)){
			$user = $this->User->get_user($id);
			$del_user = $this->User->delete($id);
			if($del_user) {
				unset($_SESSION['uid']);
				if(!empty($user['avatar'])){
					$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/upload';
					unlink( rtrim($targetPath,'/') . '/' . $user['avatar']);
				}
				echo json_encode(array(
					'status' => true
				));
			}
			else{
				echo json_encode(array(
					'status' => false,
					'message_title' => 'К сожалению ...',
					'message_body' => 'Просим прощения, но что-то пошло не так.',
				));
			}
		}
		else{
			echo json_encode(array(
				'status' => false,
				'message_title' => 'К сожалению ...',
				'message_body' => 'Просим прощения, но что-то пошло не так.',
			));
		}
	}
}
