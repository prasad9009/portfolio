<?php

header('Content-Type: application/json');

/**
 * Load environment variables from a .env file into $_ENV, $_SERVER, and putenv()
 */
function loadEnv($path)
{
    if (!file_exists($path)) return;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if (strpos($line, '#') === 0 || strpos($line, '=') === false) continue;
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value, " \t\n\r\0\x0B\"'");
        if (!getenv($name)) {
            putenv("$name=$value");
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

// Load .env variables
loadEnv(__DIR__ . '/.env');

// Allow only POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode([
        "success" => false,
        "message" => "Invalid request method."
    ]);
    exit;
}

// =======================
// CONFIGURATION FROM ENV
// =======================
$resendApiKey   = getenv('RESEND_API_KEY') ?: ($_ENV['RESEND_API_KEY'] ?? '');
$fromEmail      = getenv('FROM_EMAIL') ?: ($_ENV['FROM_EMAIL'] ?? 'onboarding@resend.dev');
$recipientEmail = getenv('RECIPIENT_EMAIL') ?: ($_ENV['RECIPIENT_EMAIL'] ?? 'pkapse9009@gmail.com');
$siteName       = getenv('SITE_NAME') ?: ($_ENV['SITE_NAME'] ?? 'Prasad Kapse Portfolio');

// =======================
// SANITIZE INPUT
// =======================
function clean($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

$name    = clean($_POST['name'] ?? '');
$email   = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$subject = clean($_POST['subject'] ?? '');
$message = clean($_POST['message'] ?? '');

// Honeypot (bot prevention)
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

if (empty($resendApiKey)) {
    echo json_encode([
        "success" => false,
        "message" => "Resend API key is missing. Please check your .env configuration."
    ]);
    exit;
}

// =======================
// SEND MAIL VIA RESEND API
// =======================
$emailData = [
    'from'     => "$siteName <$fromEmail>",
    'to'       => [$recipientEmail],
    'reply_to' => "$name <$email>",
    'subject'  => "New Portfolio Contact: " . $subject,
    'html'     => "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;'>
            <h2 style='color: #2563EB; margin-top: 0;'>New Contact Form Submission</h2>
            <p style='margin: 8px 0;'><strong>Name:</strong> " . htmlspecialchars($name) . "</p>
            <p style='margin: 8px 0;'><strong>Email:</strong> <a href='mailto:" . htmlspecialchars($email) . "' style='color: #2563EB;'>" . htmlspecialchars($email) . "</a></p>
            <p style='margin: 8px 0;'><strong>Subject:</strong> " . htmlspecialchars($subject) . "</p>
            <hr style='border: none; border-top: 1px solid #e0e0e0; margin: 16px 0;'>
            <p style='margin: 8px 0;'><strong>Message:</strong></p>
            <p style='background-color: #f8fafc; padding: 12px; border-radius: 6px; white-space: pre-wrap; margin: 8px 0;'>" . nl2br(htmlspecialchars($message)) . "</p>
            <hr style='border: none; border-top: 1px solid #e0e0e0; margin: 16px 0;'>
            <p style='font-size: 12px; color: #64748b; margin-bottom: 0;'>Sent from " . htmlspecialchars($siteName) . " contact form.</p>
        </div>
    "
];

$ch = curl_init('https://api.resend.com/emails');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($emailData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $resendApiKey,
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Compatibility with local XAMPP SSL bundles

$response  = curl_exec($ch);
$httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($curlError) {
    echo json_encode([
        "success" => false,
        "message" => "Connection Error: " . $curlError
    ]);
    exit;
}

$responseData = json_decode($response, true);

if ($httpCode >= 200 && $httpCode < 300 && isset($responseData['id'])) {
    echo json_encode([
        "success" => true,
        "message" => "Thank you, $name! Your message has been sent successfully."
    ]);
} else {
    $errorMsg = $responseData['message'] ?? 'Failed to send email via Resend API.';
    echo json_encode([
        "success" => false,
        "message" => "Resend Error: " . $errorMsg
    ]);
}