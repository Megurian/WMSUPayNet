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
    $ignoreWords = ["of", "and", "the", "at", "in", "on", "to", "a", "an", "for", "by", "with", "from"];

    // Split the string into words
    $words = explode(' ', $string);

    // Filter out ignored words
    $significantWords = array_filter($words, function($word) use ($ignoreWords) {
        return !in_array(strtolower(trim($word)), $ignoreWords);
    });

    // If exactly two significant words
    if (count($significantWords) == 2) {
        $firstWord = $significantWords[0];
        $secondWord = end($significantWords);
        return substr($firstWord, 0,1) . substr($secondWord, 0, 4); // Take first 4 letters of second word
    }
    
    // If three or more significant words
    if (count($significantWords) >= 3) {
        $abbreviation = '';
        foreach ($significantWords as $word) {
            $word = trim($word);
            if (!empty($word)) {
                $abbreviation .= strtoupper($word[0]);
            }
        }
        return $abbreviation;
    }

    // Default behavior for other cases (original logic)
    $abbreviation = '';
    foreach ($words as $word) {
        $word = trim($word);
        if (!empty($word) && !in_array(strtolower($word), $ignoreWords)) {
            $abbreviation .= strtoupper($word[0]);
        }
    }

    return $abbreviation;
}

function formatCollegeName($string) {
    // Words to ignore
    $ignoreWords = ['of', 'and', 'the'];

    // Split the string into words
    $trimmedString = trim(preg_replace('/\s+/', ' ', $string));
    $words = explode(' ', $trimmedString);

    // Format each word
    $formattedWords = array_map(function($word) use ($ignoreWords) {
        $word = trim($word); // Remove any extra spaces
        if (!empty($word) && !in_array(strtolower($word), $ignoreWords)) { // Ignore "of" and "and"
            return ucfirst(strtolower($word)); // Capitalize the first letter and lowercase the rest
        } else {
            return strtolower($word); // Keep the word as is
        }
    }, $words);

    return implode(' ', $formattedWords);
}