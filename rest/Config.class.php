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
        return "root";
        //return Config::get_env("DB_PASSWORD", "root");
    }
    public static function DB_SCHEMA(){
        return "personalitytest";
        //return Config::get_env("DB_SCHEMA", "personalitytest");
    }
    public static function DB_PORT(){
        return "3306";
        //return Config::get_env("DB_PORT", "3306");
    }
}
?>