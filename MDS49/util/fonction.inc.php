<?php

	function envoyerMail() {
		// Le message
		$message = "Line 1\r\nLine 2\r\nLine 3";

		// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
		$message = wordwrap($message, 70, "\r\n");

		// Envoi du mail
		mail('caffeinated@example.com', 'Mon Sujet', $message);
	}
?>