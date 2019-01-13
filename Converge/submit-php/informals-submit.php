<?php
include("sendmail.php");
include("maildesign.php");
//$servername = 'mysql6.000webhost.com';
$servername = 'localhost';

//$username = 'a5289196_j128';
$username = 'jiit128';

//$password = 'pansh102701#-db';

//$dbname = "u357753357_jiit";
$password = 'jiitconverge17@128';
//$dbname = 'a5289196_2017';
$dbname = 'converge_test';

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
 

ini_set('display_errors', '0');

//error_reporting(-1);
//ini_set('display_errors', 'On');
set_error_handler("var_dump");
ini_set("mail.log", "C:\Windows\Temp\mail.log");
ini_set("mail.add_x_header", TRUE);

$event1=mysqli_real_escape_string($connection,$_POST['event']);
$college=mysqli_real_escape_string($connection,$_POST['college']);
$team_members= mysqli_real_escape_string($connection,$_POST['team_members']);
$fname1=mysqli_real_escape_string($connection,$_POST['firstname1']);
$phone1=mysqli_real_escape_string($connection,$_POST['phone1']);
$email1=mysqli_real_escape_string($connection,$_POST['email1']);

$ses_sql=mysqli_query($connection,"SELECT * FROM informals WHERE event='$event1' and email='$email1' or event='$event1' and phone='$phone1' ");
 if($ses_sql->num_rows==0)
 {
     $sql = "INSERT INTO informals VALUES ('','$event1','$college','$fname1','$phone1','$email1','$team_members')";
     // new record
     if (mysqli_query($connection,$sql) == TRUE) {
     echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>You have succesfully registered. Check your mail for details.</div>";   
    $user = $email1; // Participant's Mail-ID
    $admin = 'admin@jiitconverge.com';     
	//$fest = "srivastavakshat96@gmail.com";   
    $fest = "jiitconvergeinformals@gmail.com";
    $subject = "Copy of your form submission for event $event1";

    //$message4 = "Hi $fname1 ";
    $message4= "Thank You for registering at Converge-2018<br> ";
    $message2 = "Your Event Details <br><br>Event: $event1";
    $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br><br>For more details,<br>Contact ";
    $message3.= "<br>Informal Events Coordinator<br>Shivangi : +91-8700737820<br><br>Regards JIIT Converge Team ";
    $header = "From: ".$admin;  
    
    $fmessage =$message4.$message2.$message3;
    $m=maildesign($fmessage,$fname1);
    sendmail($user,$subject,$m,$header); 
    //sendmail($user,$subject,$message4,$header);
    //sendmail($user,$subject,$message2,$header);
    //sendmail($user,$subject,$message3,$header);

    $message = "A new registration for event: $event1 <br>Details <br>Participant Name: $fname1 ";
    $message.= "<br>Mail-ID: $email1 <br>Contact No.: $phone1 <br>College: $college ";
    
    $subject2 = "Form Submission for your event $event1";       
    sendmail($fest,$subject2,maildesign($message,"Event Head"),$header); // sends a copy of the message to the sender
     } else {
        echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. Please try again.</div>";
     }
 }
 else{
//while($row=mysqli_fetch_assoc($ses_sql))
//{
//$team=$row['teamid'];
// $team=$team+1;
//break; 
//}
     echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>This email id is already registered for $event.\nTry again with a different email/phone. </div>";
}
$connection->close();
?>	