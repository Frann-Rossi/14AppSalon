<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
  public $nombre;
  public $email;
  public $token;
  public function __construct($nombre, $email, $token)
  {
    $this->nombre = $nombre;
    $this->email = $email;
    $this->token = $token;
  }

  public function enviarConfirmacion()
  {
    // Crear el objeto de email

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '2c4add13b47be6';
    $mail->Password = 'fe59572cd22596';

    $mail->setFrom("cuentas@appsalon.com");
    $mail->addAddress("cuentas@appsalon.com", "AppSalon.com");
    $mail->Subject = "Confirma tu cuenta";

    // Set HTML
    $mail->isHTML(TRUE);
    $mail->CharSet = "UTF-8";

    $contenido = "<html>";
    $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en AppSalon, solo debes confirmarla presionando 
    el siguiente enlace</p>";
    $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";
    $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
    $contenido .= "</html>";
    $mail->Body = $contenido;

    // Enviar el email
    $mail->send();
  }

  public function enviarInstrucciones()
  {
    // Crear el objeto de email

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '2c4add13b47be6';
    $mail->Password = 'fe59572cd22596';

    $mail->setFrom("cuentas@appsalon.com");
    $mail->addAddress("cuentas@appsalon.com", "AppSalon.com");
    $mail->Subject = "Restablece tu password";

    // Set HTML
    $mail->isHTML(TRUE);
    $mail->CharSet = "UTF-8";

    $contenido = "<html>";
    $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado restablecer tu password, sigue el siguiente enlace para hacerlo</p>";
    $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer Password</a>";
    $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
    $contenido .= "</html>";
    $mail->Body = $contenido;

    // Enviar el email
    $mail->send();
  }
}
