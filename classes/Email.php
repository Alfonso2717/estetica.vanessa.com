<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        // Crear una nueva instancia de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = "sandbox.smtp.mailtrap.io";
            $mail->SMTPAuth = true;
            $mail->Username = "c82ede1bf6c79e";
            $mail->Password = "f41076c80228a7";
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            // Configuración del email
            $mail->setFrom('cuentas@appsalon.com');
            $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
            $mail->Subject = "Confirma tu Cuenta";

            // Contenido del email
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";
            $contenido = '<html>';
            $contenido .= '<head>';
            $contenido .= '<style>';
            $contenido .= 'body { font-family: Arial, sans-serif; background-color: #f9f9f9; color: #333; padding: 20px; }';
            $contenido .= '.container { background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 0 auto; }';
            $contenido .= 'h1 { font-size: 30px; color: #FF6F61; text-align: center; margin-bottom: 10px; }'; // Estilo de Estética Vanessa
            $contenido .= 'h2 { color: #333; font-size: 22px; margin-bottom: 15px; }';
            $contenido .= 'p { font-size: 16px; line-height: 1.6; margin-bottom: 20px; }';
            $contenido .= 'a { background-color: #FF6F61; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block; }';
            $contenido .= 'a:hover { background-color: #e65a4e; }'; // Efecto de hover en el enlace
            $contenido .= 'footer { font-size: 14px; color: #888; text-align: center; margin-top: 30px; }';
            $contenido .= 'footer span { font-size: 12px; color: #aaa; display: block; margin-top: 10px; }';
            $contenido .= '</style>';
            $contenido .= '</head>';
            $contenido .= '<body>';
            $contenido .= '<div class="container">';
            $contenido .= "<h1>Estética Vanessa</h1>";
            $contenido .= "<h2>¡Bienvenida a Estética Vanessa, " . $this->nombre . "!</h2>";
            $contenido .= "<p>Gracias por registrarte en Estética Vanessa. Para confirmar tu cuenta, simplemente haz clic en el siguiente enlace:</p>";
            $contenido .= "<a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";
            $contenido .= "<p>Si no solicitaste este registro, por favor ignora este mensaje.</p>";
            $contenido .= "<footer><p>Saludos cordiales,<br>El equipo de Estética Vanessa</p>";
            $contenido .= "<span>Este correo fue enviado desde una dirección de notificaciones automática. No respondas a este mensaje.</span></footer>";
            $contenido .= '</div>';
            $contenido .= '</body>';
            $contenido .= '</html>';
            
            $mail->Body = $contenido;
            

            // Enviar el email
            $mail->send();
            echo "Correo de confirmación enviado correctamente.";
        } catch (Exception $e) {
            echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
        }
    }


    public function enviarInstrucciones() {
        // Crear una nueva instancia de PHPMailer
        $mail = new PHPMailer(true);
    
        try {

             // Activar depuración
            $mail->SMTPDebug = 2; // Nivel de depuración detallado

            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = "sandbox.smtp.mailtrap.io"; // Cambiar a sandbox
            $mail->SMTPAuth = true;
            $mail->Username = "c82ede1bf6c79e"; // Credenciales de Mailtrap
            $mail->Password = "f41076c80228a7";
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilitar STARTTLS
    
            // Configuración del correo
            $mail->setFrom('cuentas@appsalon.com');
            $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com'); // Enviar a usuario específico
            $mail->Subject = "Reestablece tu contraseña";
    
            // Contenido del correo
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";
            $contenido = '<html>';
            $contenido .= '<head>';
            $contenido .= '<style>';
            $contenido .= 'body { font-family: Arial, sans-serif; background-color: #f9f9f9; color: #333; padding: 20px; }';
            $contenido .= '.container { background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 0 auto; }';
            $contenido .= 'h1 { font-size: 30px; color: #FF6F61; text-align: center; margin-bottom: 10px; }'; // Estilo de Estética Vanessa
            $contenido .= 'h2 { color: #333; font-size: 22px; margin-bottom: 15px; }';
            $contenido .= 'p { font-size: 16px; line-height: 1.6; margin-bottom: 20px; }';
            $contenido .= 'a { background-color: #FF6F61; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block; }';
            $contenido .= 'a:hover { background-color: #e65a4e; }'; // Efecto de hover en el enlace
            $contenido .= 'footer { font-size: 14px; color: #888; text-align: center; margin-top: 30px; }';
            $contenido .= 'footer span { font-size: 12px; color: #aaa; display: block; margin-top: 10px; }';
            $contenido .= '</style>';
            $contenido .= '</head>';
            $contenido .= '<body>';
            $contenido .= '<div class="container">';
            $contenido .= "<h1>Estética Vanessa</h1>";
            $contenido .= "<h2>¡Bienvenida a Estética Vanessa, " . $this->nombre . "!</h2>";
            $contenido .= "<p>Gracias por registrarte en Estética Vanessa. Para confirmar tu cuenta, simplemente haz clic en el siguiente enlace:</p>";
            $contenido .= "<a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Confirmar Cuenta</a>";
            $contenido .= "<p>Si no solicitaste este registro, por favor ignora este mensaje.</p>";
            $contenido .= "<footer><p>Saludos cordiales,<br>El equipo de Estética Vanessa</p>";
            $contenido .= "<span>Este correo fue enviado desde una dirección de notificaciones automática. No respondas a este mensaje.</span></footer>";
            $contenido .= '</div>';
            $contenido .= '</body>';
            $contenido .= '</html>';
            
            $mail->Body = $contenido;
            
    
            // Enviar el correo
            $mail->send();
            echo "Correo de instrucciones enviado correctamente.";
        } catch (Exception $e) {
            echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
        }
    }
}
