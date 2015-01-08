<?php

namespace PHPMVC;

require_once dirname(__FILE__) . "/DB.class.php";
require_once dirname(__FILE__) . "/External/phpmailer/PHPMailerAutoload.php";

class Mail {

	static public function Send($fromEmail, $fromName, $toEmail, $toName, $subject, $content, $replyTo = "", $replyToName = ""){

		$db = DB::getInstance();
		$db->Query("
			SELECT
				strEnderecoServidorSMTP,
				nPortaServidorSMTP,
				strSenhaEmail
			FROM
				Mailer.dbo.CaixaPostal
			WHERE 
				strEnderecoEmail = '{$fromEmail}'
		");
		$email = $db->Fetch();


		$mail = new \PHPMailer();
		 
		$mail->IsSMTP();
		$mail->Host      = "smtp.nelogica.com.br";
		$mail->SMTPAuth  = true;
		$mail->SMTPDebug = false;
		$mail->Port      = 587;
		$mail->Username  = $fromEmail;
		$mail->Password  = $email["strSenhaEmail"];
		$mail->From      = $fromEmail;
		$mail->Sender    = $fromEmail;
		$mail->FromName  = $fromName;
		$mail->Subject   = $subject;
		$mail->Body      = $content;
		$mail->AltBody   = str_replace("\n","\\r\\n",$content);

		if(!empty($replyTo))
			$mail->addReplyTo($replyTo,$replyToName);

		$mail->AddAddress($toEmail, $toName);
		$mail->IsHTML(true);
		 
		return ($mail->Send() ? true : $mail->ErrorInfo);
		

	}

}

?>