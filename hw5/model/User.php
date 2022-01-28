<?php

class User{
    //private static $login;
	//private static $pass;
    
    
    public function reg($login, $pass){
        if(!$this->existUser($login)){
            $login = $_POST['login'] ? strip_tags($_POST['login']) : "";
            $pass = $_POST['pass'] ? strip_tags($_POST['pass']) : "";            
            $pass = md5($pass.strrev(md5($login)));
            //тут будет запись в бд
            return true;
        }
            return false;
    }
    private function existUser($login){
        //запрос в бд по логину и возват true если есть
        //и false если нет
        return true;
        return false;
    }
    function auth($login, $pass){

        $login = $_POST['login'] ? strip_tags($_POST['login']) : "";
        $pass = $_POST['pass'] ? strip_tags($_POST['pass']) : "";            
        $pass = md5($pass.strrev(md5($login)));

        if(false){
            //проверка в бд
            return true;        
        }
        return false;
    }
    function getInfo(){}
    function editInfo(){}
    function getLogin(){}
}