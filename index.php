<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    session_start();

    if(!isset($_SESSION["usedLetters"])) {
        $_SESSION["usedLetters"] = array();
    }
 
    $used = "";
    $error = "";

    if(isset($_GET["letter"])) {
        $input = $_GET["letter"];
        $input = strtolower($input);
        $input = trim($input);
        if (!ctype_alpha($input) || strlen($input) > 1){
           $error = "Must be one letter!";
        } else {
          array_push($_SESSION["usedLetters"], $input);
          foreach($_SESSION["usedLetters"] as $letter) {
             $used .= $letter . " ";
          }
        }
    };


    //print_r($_SESSION["usedLetters"]);

    echo "
       <form method='GET'>
        <label>Pick a letter:
            <input type='text' name='letter'></label>
        <input type='submit' value='send'>
        </form>
        <div>
        <p>$error</p>
        <p>Guessed letters: $used </p>
        </div>";

    