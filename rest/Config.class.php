<?php

class Config {
    public static function DB_HOST(){
        return "localhost";
        //return Config::get_env("DB_HOST", "localhost");
    }
    public static function DB_USERNAME(){
        return "root";
        //return Config::get_env("DB_USERNAME", "root");
    }
    public static function DB_PASSWORD(){
        return "maliprinc";
        //return Config::get_env("DB_PASSWORD", "maliprinc");
    }
    public static function DB_SCHEMA(){
        return "personality-projekat-web";
        //return Config::get_env("DB_SCHEMA", "personality-projekat-web");
    }
    public static function DB_PORT(){
        return "3307";
        //return Config::get_env("DB_PORT", "3307");
    }
}
?>