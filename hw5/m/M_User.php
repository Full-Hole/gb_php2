<?php
class M_User {
    private static $user_id ='';

	function auth($login,$pass){
        DB::getDbh();
        $info = DB::getRow("SELECT id from gallery.users WHERE login = '$login' and password = '$pass'");
        //$text = $login . $pass . ' -- ' . print_r($info, true);
        //var_dump($info);
        //file_put_contents('data/data2.txt', $text);
        if($info){
            $this->user_id = $info['id'];
            //file_put_contents('data/data2.txt', 'user_id = '. $info['id']);
            return true;
        }
        return false;
    }
    function getId(){
        return $this->user_id;
    }
    function check_login($login){
        DB::getDbh();
        $info = DB::getRow("SELECT id from gallery.users WHERE login = '$login'");
       
        if($info){
            return true;
        }
        return false;
    }
    function reg($login,$pass, $name){
        DB::getDbh();
        //echo 'zxc';
        $info = DB::add("INSERT INTO gallery.users (login, password, name) VALUES ('$login', '$pass', '$name')");
        echo $info;
        if($info){
            return true;
        }
        return false;
    }
}