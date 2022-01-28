<?php
//
// Конттроллер страницы чтения.
//
//require_once('m/M_User.php');
//include_once('m/model.php');
class C_User extends C_Base
{
	//
	// Конструктор.
	//
	
	public function action_auth(){
		//print_r('shit');
		$this->title .= '::Авторизация';
        $user = new M_User();
		 $info = "Пользователь не авторизован";
        if($this->isPost()){
            $login = $_POST['login'];
			$info = $user->auth("log","past");
			if($info){
				//session_start();
				$_SESSION['uid']='1';
				header('location: index.php');
				exit();
			}
			
            // $info = $user->auth("log","past");
		    // $this->content = $this->Template('v/v_index.php', array('text' => $info));
		}
		// $this->content = $this->Template('v/v_edit.php', array('text' => '123'));
		//$text = text_get();
		//$today = date();
		$this->content = $this->Template('v/v_auth.php');	
		
	}
	public function action_exit(){
		session_destroy();
		header('location: index.php');
				
	}
	public function action_lk(){

		$this->content = $this->Template('v/v_lk.php');
				
	}
	

}
