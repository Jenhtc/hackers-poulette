<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="form.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
    <link rel="shortcut icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
    <title>You've sent a form</title>
</head>
<body>
  
</body>
</html>

<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';

$firstname= $_POST["first_name"] ;
$lastname= $_POST["last_name"] ;
$email= $_POST["email"] ;
$gender= $_POST["gender"] ;
$country= $_POST["country"] ;
$subject= $_POST["subject"] ;
$message= $_POST["message"] ;



/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */


//Create a new PHPMailer instance
$mail = new PHPMailer(true);

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
/* $mail->SMTPDebug = SMTP::DEBUG_SERVER; */

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'becode.liege.jepsen2.14@gmail.com';

//Password to use for SMTP authentication
$mail->Password ='BeCode@Liege+Jepsen-2.14';

//Set who the mespath/to/PHPMailersage is to be sent from
$mail->setFrom('becode.liege.jepsen2.14@gmail.com', 'Hackers Poulette');

//Set an alternatpath/to/PHPMailerive reply-to address
$mail->addReplyTo($email, $email);

//Set who the message is to be sent to
$mail->addAddress($email, $email);

//Set the subject line
$mail->Subject = 'Hackers Poulette - ' . $subject;

/* //Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), __DIR__); */

$mail->isHTML(true); 
$mail->Body = "$firstname $lastname $gender $country $message";
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
/* $mail->addAttachment('images/phpmailer_mini.png'); */

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo "<div class='container'>
    <h3>Hi $firstname, we've received your message.<br>
    <h5>Here is the summary.<br><br>
    From: $firstname $lastname <br><br>
    Subject: $subject <br><br>
     Message:<br><br> $message</h5><br>
     <h6>Would you like to send another request ?</h6> <br>
     <a href='index.php' class='waves-effect waves-light btn'>Form</a><br>

    </div>";

    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}

?>