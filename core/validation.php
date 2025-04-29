<?php

$message = require __DIR__ . '/../lang/fr/validation_message.php';



if (!function_exists('check_required')) {
    function check_required(string $field_name): bool
    {
        global $messages;
        if (!array_key_exists($field_name, $_REQUEST) || trim($_REQUEST[$field_name]) === '') {
            $_SESSION['errors'][$field_name] = sprintf($messages['required'], $field_name);
            return false;
        }

        return true;
    }
}

if (!function_exists('check_email')) {
    function check_email(string $field_name): bool
    {
        global $messages;
        if (array_key_exists($field_name, $_REQUEST) &&
            trim($_REQUEST[$field_name]) !== '' &&
            !filter_var(trim($_REQUEST[$field_name]), FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][$field_name] = sprintf($messages['email'], $field_name);
            return false;
        }

        return true;
    }
}