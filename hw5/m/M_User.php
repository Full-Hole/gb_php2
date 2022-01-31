<?php
class M_User {

	function auth($login,$pass){
        DB::getDbh();
        $info = DB::getRow("SELECT id from gallery.users WHERE login = '$login' and password = '$pass'");
        //$text = $login . $pass . ' -- ' . $info;
        //file_put_contents('data/data.txt', $text);
        if($info){
            return true;
        }
        return false;
    }
    function reg($login,$pass, $name){
        DB::getDbh();
        $info = DB::add("INSERT INTO gallery.users (login, password, name) VALUES ('$login', '$pass', '$name'");
        //$text = $login . $pass . ' -- ' . $info;
        //file_put_contents('data/data.txt', $text);
        if($info){
            return true;
        }
        return false;
    }
}