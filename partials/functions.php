<?php
    function debug($variable){
        echo '<pre>' . print_r($variable, true) . '</pre>';
    }

    function str_random($length){
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }
    // securisation de la variable post
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    //   function add_amount($actul_Amount, $amount_to_add){
    //       $new_Amount = $actul_Amount + $amount_to_add;          
    //       return $new_Amount;
    //   }
 
 