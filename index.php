<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "Hangman.php";

    session_start();
    
    $game = new Hangman();
    //$game->resetArray();
    $game->loadUsedLetters();
    $game->queryLetter();
    $game->getView();
    $game->getSecretWord(); //Testing, not working?


    //print_r($_SESSION["usedLetters"]);


    /*
    Vi har lärt oss något om PHP.

    Om vi ska vara pekiga:
     - namnggivning: used - used vad?
                    error - error vad?
                    letter - letter vad? ~guessedLetter
    - structur:     mera mellanrum
                    göra funktioner för lättare läsbarhet
                    klasser
                    HTML till funktion - View liknande till labb
    - TODO? Vad är det vi ska göra/lägga till
    
    */