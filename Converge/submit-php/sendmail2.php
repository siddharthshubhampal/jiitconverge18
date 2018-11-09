<?php
    /*
	Author: Shahid Shaikh
	Blog  : http://codeforgeek.com
    */
    //require_once('class.phpmailer.php');
	require_once('phpmailer/PHPMailerAutoload.php');
    function sendmail($to,$subject,$message,$name)
    {
                  $mail             = new PHPMailer();
                  $body             = $message;
                  $mail->IsSMTP();
                  $mail->SMTPDebug = 1;
                  //$mail->Host       = gethostbyname('sg2plcpnl0219.prod.sin2.secureserver.net');           
                  $mail->SMTPAuth   = true;
                  $mail->Host       = 'sg2plcpnl0219.prod.sin2.secureserver.net';
                  $mail->Port       = 465;
                  $mail->Username   = "admin@junioriit.com";
                  $mail->Password   = "Jiit_converge1";
                  $mail->SMTPSecure = 'ssl';                  
                  $mail->SetFrom('admin@junioriit.com', 'JIIT Converge 2017');
                  $mail->AddReplyTo("admin@junioriit.com","JIIT Converge 2017");
                  $mail->Subject    = $subject;
                  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
                  $mail->MsgHTML($body);
                  $address = $to;
                  $mail->AddAddress($address, $name);
                  if(!$mail->Send()) {
                      return 0;
					  echo 'not sent';
                  } else {
					  echo 'sent';
                        return 1;
                  }
    }
?>