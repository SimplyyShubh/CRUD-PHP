<?php

//Validating Email Name and Phone Number

function validateInputs($data)
{
    //checking for valid email
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $data['error'] = 1;
        $data['error_status']['email'] = 'Email is Invalid ';
    }

    //using Regex to check if it contains Non Alphabets
    if (preg_match('/[^A-Za-z]+$/', $data['name'])) {
        $data['error'] = 1;
        $data['error_status']['Name'] = 'Please Only insert Alphabets in Full Name';
    }

    if (preg_match('/[^0-9]+$/', $data['name'])) {
        $data['error'] = 1;
        $data['error_status']['Number'] = 'Please Only insert Numerals in Number';
    }

    return $data;
}

?>