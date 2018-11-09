<?php
    /*
	Author: Shahid Shaikh
	Blog  : http://codeforgeek.com
    */
    require_once('PHPMailerAutoload.php');
    //require_once('class.phpmailer.php');
    function sendmail($to,$subject,$message,$name)
    {
                  $mail             = new PHPMailer();
                  $body             = $message;
                  $mail->IsSMTP();
                  $mail->Host       = gethostbyname('smtp.yandex.com');                  
                  $mail->SMTPAuth   = true;
                  $mail->Host       = gethostbyname('smtp.yandex.com');
                  $mail->Port       = 465;
                  $mail->Username   = "admin@jiitconverge.com";
                  $mail->Password   = "123456";
                  $mail->SMTPSecure = 'ssl';
                  $mail->SetFrom('admin@jiitconverge.com', 'Your name');
                  $mail->AddReplyTo("admin@jiitconverge.com","Your name");
                  $mail->Subject    = $subject;
                  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
                  $mail->MsgHTML($body);
                  $address = $to;
                  $mail->AddAddress($address, $name);
                  if(!$mail->Send()) {
                      return 0;
                  } else {
                        return 1;
                  }
    }
?>