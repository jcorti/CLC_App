<?php
require "vendor/autoload.php";

$robo = 'onesync@mahopac.org';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$developmentMode = false;

$mailer = new PHPMailer($developmentMode);

try {
$mailer->SMTPDebug =false;
$mailer->isSMTP();

if ($developmentMode) {
$mailer->SMTPOptions = [
'ssl'=> [
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
]
];
}
$mailer->Host = 'smtp-relay.gmail.com';
$mailer->SMTPAuth = false;

$mailer->SMTPSecure = 'tls';
$mailer->Port = 587;

$mailer->setFrom('onesync@mahopac.org', 'Name of sender');
$mailer->addAddress('cortij@mahopac.org', 'Name of recipient');
$mailer->isHTML(true);
$mailer->Subject = 'PHPMailer Test';
$mailer->Body = 'This is a <b>SAMPLE<b> email sent through <b>PHPMailer<b>';
$mailer->send();
$mailer->ClearAllRecipients();
} catch (Exception $e) {
echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}
