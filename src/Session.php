<?php

namespace App;

class Session
{
    public function __construct()
    {
        session_start();
    }
    public function set(string $key,string $value):void
    {
        $_SESSION[$key] = $value;
    }
    public function get(string $key):string|bool{
        $value = $_SESSION[$key];
        if($value !== null){
            return $value;
        }
        return false;
    }
    public function unset(string $key):void
    {
        unset($_SESSION[$key]);
    }

}