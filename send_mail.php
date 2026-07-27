<?php

header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Allow only POST requests
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo json_encode([
        "success" => false,
        "message" => "Invalid request method."
    ]);
    exit;
}

// =======================
// CONFIGURATION
// =======================

// Your Gmail address
$gmailUsername = "prasadedu09@gmail.com";

// Gmail App Password (NOT your Gmail password)
$appPassword = "kwky defz eiwk rjwg";

// Email where you want to receive messages
$recipientEmail = "prasadedu09@gmail.com";

// Portfolio name
$siteName = "Prasad Kapse Portfolio";

// =======================
// SANITIZE INPUT
// =======================

function clean($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

$name = clean($_POST['name'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$subject = clean($_POST['subject'] ?? '');
$message = clean($_POST['message'] ?? '');

// Honeypot (optional)
if (!empty($_POST['website'])) {
    echo json_encode([
        "success" => true,
        "message" => "Message sent successfully."
    ]);
    exit;
}

// =======================
// VALIDATION
// =======================

if (strlen($name) < 2) {
    echo json_encode([
        "success" => false,
        "message" => "Please enter a valid name."
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        "success" => false,
        "message" => "Please enter a valid email address."
    ]);
    exit;
}

if (strlen($subject) < 2) {
    echo json_encode([
        "success" => false,
        "message" => "Please enter a subject."
    ]);
    exit;
}

if (strlen($message) < 10) {
    echo json_encode([
        "success" => false,
        "message" => "Message must be at least 10 characters."
    ]);
    exit;
}

// =======================
// SEND MAIL
// =======================

$mail = new PHPMailer(true);

try {

    // SMTP Settings
    $mail->isSMTP();
    // Use IPv4 resolution to prevent "Network is unreachable (101)" IPv6 errors on cloud servers
    $mail->Host = gethostbyname("smtp.gmail.com");
    $mail->SMTPAuth = true;

    $mail->Username = $gmailUsername;
    $mail->Password = $appPassword;

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Timeout = 10;

    // SSL Options (helps on localhost/XAMPP and cloud platforms)
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    // Sender
    $mail->setFrom($gmailUsername, $siteName);

    // Receiver
    $mail->addAddress($recipientEmail);

    // Reply to visitor
    $mail->addReplyTo($email, $name);

    // Email Format
    $mail->isHTML(false);

    $mail->Subject = "New Portfolio Contact: " . $subject;

    $mail->Body ="New Contact Form Submission

--------------------------------

Name: $name

Email: $email

Subject: $subject

Message: $message

--------------------------------

Sent from your Portfolio Website.";


    $mail->send();

    echo json_encode([
        "success" => true,
        "message" => "Thank you, $name! Your message has been sent successfully."
    ]);

} catch (Exception $e) {

    echo json_encode([
        "success" => false,
        "message" => "Mailer Error: " . $mail->ErrorInfo
    ]);
}