<?php 

/**
 * This script generates a random string
 */

// array of characters that can be in the string
$availableSymbols = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ':', ';', ',', '.', '-', '+', ' ');

// default length of the string
$length = 5;

// if the length is provided, use it
if(isset($_POST['length'])){
    $length = $_POST['length'];
}

// the string
$string = '';

// generate the string character by character
for($i = 0; $i < $length; $i++){
    $string .= $availableSymbols[random_int(0, count($availableSymbols) - 1)];
}

// echo the generated string
echo $string;

?>