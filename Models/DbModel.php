<?php

class DbModel
{

    public  function connect()
    {
        try {
            $connection = new PDO('mysql:dbname=cc;host=127.0.0.1', 'root', '');
            $connection->exec("set names utf8");
        } catch (PDOException $Exception) {
            echo "Unable to connect to database.";
        }
        return $connection;
    }
    public function disconnect(&$connect)
    {
        $connect = null;
    }

}