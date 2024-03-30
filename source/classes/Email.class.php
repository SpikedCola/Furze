<?php declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;

class Email {
	public static function SendHtml(array $emails, string $subject, string $body) {
		$mail = new PHPMailer(true);
		$mail->isSMTP();

		//Enable SMTP debugging
		// SMTP::DEBUG_OFF = off (for production use)
		// SMTP::DEBUG_CLIENT = client messages
		// SMTP::DEBUG_SERVER = client and server messages
		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->SMTPAuth = true;

		$mail->Username = GMAIL_USERNAME;
		$mail->Password = GMAIL_PASSWORD;
		$mail->setFrom(GMAIL_FROM_ADDRESS, GMAIL_FROM_NAME);

		$mail->Subject = $subject;
		foreach ($emails as $addr) {
			$mail->addAddress($addr);
		}

		$mail->msgHTML($body);
		//$mail->AltBody = 'This is a plain-text message body';

		$mail->send();
	}
}
