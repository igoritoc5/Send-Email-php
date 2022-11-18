<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST["email"])) {

            // Config

            $mail = new PHPMailer();

            $mail->IsSMTP();

            $mail->CharSet = 'UTF-8';

            $mail->Host       = "mail.outlook.com";               // SMTP server example

            $mail->SMTPDebug  = 0;                                // enables SMTP debug information (for testing)

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      //Enable implicit TLS encryption

            $mail->SMTPAuth   = true;                             // enable SMTP authentication

            $mail->Port       = 465;                              // set the SMTP port for the GMAIL server

            $mail->Username   = "Pro-ti@hotmail.com";             // SMTP account username example

            $mail->Password   = "123456789aA@";                   // SMTP account password example

            //Recipients

            $mail->setFrom('Pro-ti@hotmail.com', 'Mailer');
            
            $mail->addAddress('igoritoc5@uni9.edu.br', 'Igor');   //Add a recipient
        
            $mail->addReplyTo($_POST["email"], 'Resposta');

            // Content

            $mail->isHTML(false);                                 // Set email format to HTML

            $mail->Subject = 'Uma nova empresa entrou em contato.';

            $mail->Body    = '';

            $mail->AltBody = 'O usuário ' . $_POST["nome"] . ' com telefone de contato: ' . $_POST["telefone"] . '. Entrou em contato em nome da empresa ' . $_POST["company"] . ' com  a mensagem: ' . $_POST["msg"];

            $mail->send();
        }
    }

?>