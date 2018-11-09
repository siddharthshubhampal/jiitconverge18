<?php
    /*
	Author: Shahid Shaikh
	Blog  : http://codeforgeek.com
    */
    require_once('phpmailer/PHPMailerAutoload.php');
    require_once('phpmailer/class.phpmailer.php');
	require_once('phpmailer/class.smtp.php');
    function sendmail($to,$subject,$message,$name)
    {
                  $mail             = new PHPMailer();
                  $body             = $message;
                  $mail->IsSMTP();
                //  $mail->SMTPDebug = 1;
                  //$mail->Host       = gethostbyname('jiitconverge.com');                  
                  $mail->SMTPAuth   = true;
                  $mail->Host       = 'mail.jiitconverge.com';
                  $mail->Port       = 25;
                  $mail->Username   = "admin@jiitconverge.com";
                  $mail->Password   = "Sid$232093//";
                 // $mail->SMTPSecure = 'ssl';                  
                  $mail->SetFrom('admin@jiitconverge.com', 'JIIT Converge 2017');
                  $mail->AddReplyTo("admin@jiitconverge.com","JIIT Converge 2017");
                  $mail->Subject    = $subject;
                  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
                  $mail->MsgHTML($body);
                  $address = $to;
                  $mail->AddAddress($address, $name);
                  if(!$mail->Send()) {
					  echo 'Unable to send email. You are registered.';
                      return 0;
                  } else {
                        return 1;
                  }
    }
?>