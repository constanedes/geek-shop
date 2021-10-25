<?php

require("config.php");

class Conection {

    public function connect(){
        try {

            $options = array( 
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_CASE => PDO::CASE_NATURAL,
                PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
            );

            $db = new PDO("mysql:host=".HOSTNAME.";port=".PORT.";dbname=".DATABASE.';charset='. CHARSET, USERNAME, PASSWORD, $options);
            return $db;
        } 
        catch(Exception $e) {
            $db = "Connection error";
            die("Database connection failed: " . $e->getMessage());
        }
    }
}



?>