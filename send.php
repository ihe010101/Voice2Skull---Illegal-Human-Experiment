<?php

// Email details
$to = "crayeffin98@gmail.com";
$subject = "Test Email from PHP";
$message = "Hello! This is a test email sent using PHP mail Link - https://www.youtube.com/watch?v=AsnaqTCA95o&list=LL&index=1&t=637s.";

// 👉 Sender details (now configurable)
$fromEmail = "rahulnayal98@gmail.com";
$fromName  = "Test Mail";

// Validate recipient email
if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
    die("Invalid recipient email address\n");
}

// Basic validation for sender email too
if (!filter_var($fromEmail, FILTER_VALIDATE_EMAIL)) {
    die("Invalid sender email address\n");
}

// Encode sender name (handles special characters safely)
$encodedFromName = "=?UTF-8?B?" . base64_encode($fromName) . "?=";

// Build headers
$headers  = "From: {$encodedFromName} <{$fromEmail}>\r\n";
$headers .= "Reply-To: {$fromEmail}\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully\n";
} else {
    echo "Failed to send email\n";
}

?>
