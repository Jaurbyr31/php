<?php
require __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer/src/SMTP.php';
require __DIR__ . '/../phpmailer/src/Exception.php';

// Recibir datos del correo electrónico desde la aplicación Ionic
$destinatario = $_POST['destinatario'];
$asunto = $_POST['asunto'];
$cuerpo = $_POST['cuerpo'];

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();
$mail->Host = 'smtp.example.com'; // Cambia esto por tu servidor SMTP
$mail->SMTPAuth = true;
$mail->Username = 'tu_correo@example.com'; // Cambia esto por tu correo
$mail->Password = 'tu_contraseña';
$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587; // Puerto SMTP

$mail->SetFrom('tu_correo@example.com', 'Tu Nombre');
$mail->AddAddress($destinatario);
$mail->IsHTML(true);
$mail->Subject = $asunto;
$mail->Body = $cuerpo;

if ($mail->Send()) {
    echo 'Correo enviado correctamente';
} else {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
?>
