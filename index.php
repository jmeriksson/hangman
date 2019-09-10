<?php

    $newSession = session_start();

    if ($newSession) {
        echo 'Started session';
    } else {
        echo 'failed';
    }

    $_SESSION["usedLetters"] = array();

    $letterInput = $_GET[letter];

    // $usedLetters = array();

    if($letterInput) {
        array_push($_SESSION["usedLetters"], $letterInput);
    };

    print_r($_SESSION["usedLetters"]);

    echo "<form method='GET'>
        <label>Pick a letter:
            <input type='text' name='letter'></label>
        <input type='submit' value='send'>
    </form>";