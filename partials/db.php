<?php

    $user = "root";
    $pass = "";    
    $host = "localhost";
    $db = "monnaie";
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db", 
        $user, 
        $pass, 
        array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",          
        )
      );    

      // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
          