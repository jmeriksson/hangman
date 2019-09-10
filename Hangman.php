<?php 
class Hangman {

    //private $usedLetter = "";
    private $usedLetters = array();
    private $errorMessage = "";
    private $secretWord;

    private $words = array("banana", "pineapple", "apple", "pear", "strawberry");


    public function __construct() {
        if (isset($_SESSION["secrectWord"])) {
            $this->secretWord = $_SESSION["secrectWord"];
        }
        else {
            $this->secretWord = $this->words[rand(0, sizeof($this->words))];
            $_SESSION["secrectWord"] = $this->secretWord;
        }
        $this->usedLetter = $_SESSION["usedLetters"];
    }

    public function loadUsedLetters(){
        if(!isset($_SESSION["usedLetters"])) {
            $_SESSION["usedLetters"] = array();
        }
        else {
            $this->usedLetters = $_SESSION["usedLetters"];
        }
    }
    public function codeSecretWord(){ //TODO
        foreach ($this->usedLetters as $letter) {
            foreach ($this->secretWord as $char) {
                if ($letter == $char) {
                    $output .= $letter;
                }
                else {
                    $output .= "*";
                }
            }
        }
        return $output;
    }


    public function saveUsedLetters(){
        $_SESSION["usedLetters"] = $this->usedLetters;
    }

    public function queryLetter(){
        if(isset($_GET["letter"])) {
            $input = trim(strtolower($_GET["letter"]));

            $isNoError = true;
            if (!ctype_alpha($input) || strlen($input) > 1){
               $this->errorMessage = "Must be one letter!";
               $isNoError = false;
            }
            foreach ($this->usedLetters as $letter) {
                if ($letter == $input){
                   $this->errorMessage = "Already Guessed.";
                   $isNoError = false;
                }
            }
            if ($isNoError) {
                array_push($this->usedLetters, $input);
                $this->saveUsedLetters();
                $this->errorMessage = "";
            }
            
        }
    }

    public function  getView(){
        
        $temp = implode(",", $this->usedLetters);
        echo "
        <form method='GET'>
         <label>Pick a letter:
             <input type='text' name='letter'></label>
         <input type='submit' value='send'>
         </form>
         <div>
         <p>$this->errorMessage</p>
         <p>Guessed letters: $temp </p>
         </div>";
    }

    // Just for testing
    public function getSecretWord(){
        echo $this->secretWord;
    }

    public function resetArray(){
        $_SESSION["usedLetters"] = array();
    }


}