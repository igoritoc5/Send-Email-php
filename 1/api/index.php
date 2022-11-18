<?php

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        if (!empty($_GET["email"])) {
            
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp-mail.outlook.com';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'Pro-Ti@hotmail.com';
            $mail->Password = '123456789aA@';
            $mail->setFrom('Pro-Ti@hotmail.com', 'First Last');
            $mail->addAddress("igoritoc5@uni9.edu.br", "Recepient Name");
            $mail->addReplyTo($_GET["email"],"Reply");
            $mail->isHTML(false);                                 

            $mail->Subject = 'Uma nova empresa entrou em contato.';

            $mail->Body    = 'O usuário ' . $_GET["nome"] . ' com telefone de contato: ' . $_GET["telefone"] . '. Entrou em contato em nome da empresa ' . $_GET["company"] . ' com  a mensagem: ' . $_GET["msg"];


            $mail->AltBody = 'O usuário ' . $_GET["nome"] . ' com telefone de contato: ' . $_GET["telefone"] . '. Entrou em contato em nome da empresa ' . $_GET["company"] . ' com  a mensagem: ' . $_GET["msg"];

            
            if(!$mail->send()) 
            {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } 
            else 
            {
                echo "Message has been sent successfully";
            }
             

        }
    }

?>
