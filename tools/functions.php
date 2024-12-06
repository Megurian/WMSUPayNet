<?php
function clean_input($input) {
    $input = htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8'); 
    //Purpose of this is nested functions to sanitize user input

    return $input; //return the now sanitize input
}

function sentenceCase($input){
    // Convert the entire string to lowercase first
    $input = strtolower($input);

    if(strpos($input, ' ') !== false){
        $string = implode(' ', array_map('ucfirst', explode(' ', $input)));
        return $string;
    } else {
        return ucfirst($input);
    }
}

function removeDashChar($input){
    if(strpos($input, '-') !== false){
        $string = str_replace('-', '', $input);
        return $string;
    }else{
        return $input;
    }
}

function detectNumber($string) {
    if (preg_match_all('/\d+/', $string, $matches) > 0) {
        return true;
    } else {
        return false;
    }
}

function extractUsername($email) {
    // Use explode to split the email at the '@' character
    $parts = explode('@', $email);

    // Take the first part of the split email, which is the username
    $username = $parts[0];

    // Capitalize the username
    $capitalizedUsername = strtoupper($username);

    // Return the capitalized username
    return $capitalizedUsername;
}

function getAbbreviation($string) {
    // Words to ignore
    $ignoreWords = ['of', 'and'];

    // Split the string into words
    $words = explode(' ', $string);

    // Extract the first letter of each word, ignoring specific words
    $abbreviation = '';
    foreach ($words as $word) {
        $word = trim($word); // Remove any extra spaces
        if (!empty($word) && !in_array(strtolower($word), $ignoreWords)) { // Ignore "of" and "and"
            $abbreviation .= strtoupper($word[0]); // Take the first letter and capitalize it
        }
    }

    return $abbreviation;
}