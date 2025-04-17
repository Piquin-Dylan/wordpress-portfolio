<?php

function sanitize_text_field(mixed $name)
{


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $tel = sanitize_text_field($_POST['tel']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['area']);

        // Vérification du champ nom : pas de chiffres autorisés
        if (preg_match('/\d/', $name)) {

            echo 'Oulaaaaa';
        }

    }
}

