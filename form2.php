<?php

/* Namespace alias. */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);

/* $name = secure_input($_POST['first_name']);
$email = secure_input($_POST['email']);
$subject = secure_input($_POST['subject']);
$message = secure_input($_POST['message']); */

/* Open the try/catch block. */
try {

    /* Set the mail sender. */
    $mail->setFrom('hackers@poulette.com', 'Hackers Poulette');

    /* Add a recipient. */
    $mail->addAddress("htc.jennifer@gmail.com", "yes");

    /* Set the subject. */
    $mail->Subject = "Thank you for contacting us!";

    /* Enable HTML */
    $mail->isHTML(TRUE);

    /* $mail->AddEmbeddedImage("assets/images/logo.png", "logo", "assets/images/logo.png"); */

    /* Set the mail message body. */
    $mail->Body =
        "test";

    /* SMTP parameters. */
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'zartovmaroteov@gmail.com';
    $mail->Password = 'under087';

    /* Finally send the mail. */
    $mail->send();
} catch (Exception $e) {
    /* PHPMailer exception. */
    echo $e->errorMessage();
} catch (\Exception $e) {
    /* PHP exception (note the backslash to select the global namespace Exception class). */
    echo $e->getMessage();
}
?>