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
		
		$this->title .= '::Авторизация';
        $user = new M_User();
		 //$info = "Пользователь не авторизован";
        if($this->isPost()){
			$login = $_POST['login'] ? strip_tags($_POST['login']) : "";
            $pass = $_POST['pass'] ? strip_tags($_POST['pass']) : "";            
            //$pass = md5($pass.strrev(md5($login)));
			//$info = $user->auth($login,$pass);
			if($user->auth($login,$pass)){
				//session_start();
				$_SESSION['uid']='1';
				header('location: index.php');
				exit();
			}else{
				header('location: index.php?c=user&act=fail');
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
	public function action_reg(){
		$this->title .= '::Авторизация';
        $user = new M_User();
		 //$info = "Пользователь не авторизован";
        if($this->isPost()){
			$login = $_POST['login'] ? strip_tags($_POST['login']) : "";
            $pass = $_POST['pass'] ? strip_tags($_POST['pass']) : "";            
            //$pass = md5($pass.strrev(md5($login)));
			//$info = $user->auth($login,$pass);
			if($user->auth($login,$pass)){
				//session_start();
				$_SESSION['uid']='1';
				header('location: index.php');
				exit();
			}else{
				header('location: index.php?c=user&act=fail');
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
	public function action_lk(){

		$this->content = $this->Template('v/v_lk.php');
				
	}
	public function action_fail(){

		$this->content = $this->Template('v/v_lk.php');
		$this->content = $this->Template('v/v_index.php', array('text' => 'Ошибка входа'));		
	}
	

}
