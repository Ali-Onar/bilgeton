<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../settings.php";



if (isset($_POST['contact_send'])) {
    $contact_name = $_POST['contact_name'];
    $contact_email = $_POST['contact_email'];
    $contact_title = $_POST['contact_title'];
    $contact_message = $_POST['contact_message'];

    $stmt = $db->qsql('INSERT INTO contact SET contact_name=?, contact_email=?, contact_title=?, contact_message=?');
    $stmt->execute([
        $contact_name,
        $contact_email,
        $contact_title,
        $contact_message
    ]);

    $contact_content = "Email: " . $contact_email . "<br>";
    $contact_content .= "Mesaj: " . $contact_message . "<br>";

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.bilgeton.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'admin@bilgeton.com';                     //SMTP username
        $mail->Password   = 'RM8.w.hGBA7BcP2';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($contact_email, 'İletişim Formundan '.$contact_name);
        $mail->addAddress('admin@bilgeton.com', 'Ali Onar');     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $contact_title;
        $mail->Body    = $contact_content;
        $mail->AltBody = $contact_content;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    Header("Location: contact.php?success=ok");
}
