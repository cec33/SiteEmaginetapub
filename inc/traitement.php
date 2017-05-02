<?php

$message = $_POST['message'];
$headers = 'FROM : site@local.dev';

mail('contact@emaginetapub.com', 'Formulaire de contact', $message);