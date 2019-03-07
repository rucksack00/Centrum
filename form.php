<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username   = "centrumpieknairelaksu@gmail.com";
$mail->Password   = "";
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->CharSet = "UTF-8";

$text = "Imie Nazwisko: " . $_POST['imie'] . "\n\r";
$text .= "Telefon: " . $_POST['phone'] . "\n\r";
$text .= "Data: " . $_POST['data'] . "\n\r";
$text .= "Temat: " . $_POST['temat'] . "\n\r";
$text .= "Tresc " . $_POST['tresc'] . "\n\r";

//Set who the message is to be sent from
$mail->setFrom('centrumpieknairelaksu@gmail.com', 'Formularz kontaktowy');

//Set an alternative reply-to address
$mail->addReplyTo($_POST['email'], $_POST['imie']);

//Set who the message is to be sent to
$mail->addAddress('centrumpieknairelaksu@gmail.com', 'centrumpieknairelaksu@gmail.com');

$mail->Subject = 'Nowa wiadomość';
$mail->msgHTML(nl2br($text));
$mail->AltBody = $text;

$mail->send();

if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location: '. $_SERVER['HTTP_REFERER']);
} else {
    header('Location: kontakt.htm');
}
