<?php

$name = $_POST['nombre'];
$email = $_POST['email'];
$message = $_POST['mensaje'];

$headers = "From: ".$email."\r\n";
$to = "contacto@revistadinamo.com";
$subject = "[Contacto Dinamo] {$name}";

mail($to, $subject, $message, $headers);

