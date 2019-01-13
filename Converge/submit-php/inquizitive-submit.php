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

//$teamname=mysqli_real_escape_string($connection,$_POST['teamname']);
$team_members=mysqli_real_escape_string($connection,$_POST['team_members']);
$fname1=mysqli_real_escape_string($connection,$_POST['firstname1']);
//$lname1=mysqli_real_escape_string($connection,$_POST['lastname1']);
$college1=mysqli_real_escape_string($connection,$_POST['college1']);
$college2=mysqli_real_escape_string($connection,$_POST['college2']);
$event='INQUIZITIVE';
$eventname='Inquizitive - The General Quiz';
$year1=mysqli_real_escape_string($connection,$_POST['year1']);
$year2=mysqli_real_escape_string($connection,$_POST['year2']);
$phone1=mysqli_real_escape_string($connection,$_POST['phone1']);
$email1=mysqli_real_escape_string($connection,$_POST['email1']);
//$dance_form=mysqli_real_escape_string($connection,$_POST['dform']);

$fname2=mysqli_real_escape_string($connection,$_POST['firstname2']);
//$lname2=mysqli_real_escape_string($connection,$_POST['lastname2']);
$phone2=mysqli_real_escape_string($connection,$_POST['phone2']);
$email2=mysqli_real_escape_string($connection,$_POST['email2']);
//$team;
$date= ' 3rd FEB 2018 ';
$eventime= ' 11:00 A.M. ';
$reportime= ' 10:30 A.M. ';
$ses_sql1 = '';
$ses_sql=mysqli_query($connection,"SELECT * FROM quizzing WHERE email1='$email1' or email2='$email1' or phone_participant1='$phone1' or phone_participant2='$phone1'");
if ($email2 != ''){
	$two_participants = 1;
	$ses_sql1 = mysqli_query($connection,"SELECT * FROM quizzing WHERE email1='$email2' or email2='$email2' or phone_participant1='$phone2' or phone_participant2='$phone2'");
}
else {
	$two_participants = 0;
}
 if ($two_participants == 0)
 {
	 $ses_sql1 = $ses_sql ;
 }
 if($ses_sql->num_rows==0 && $ses_sql1->num_rows==0)
 {
	 if ($two_participants == 1){
	 }
		 if ($email1 == $email2 or $phone1 == $phone2){
         echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-		wrap:normal'>The email or contacts of both participants cannot be same.</div>";
     	}
     else{       
     $sql = "INSERT INTO quizzing VALUES ('$team_members','$college1','$fname1','$year1','$email1','$phone1','$college2','$fname2','$year2','$email2','$phone2')";
     if (mysqli_query($connection,$sql) == TRUE) {
        echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>You have succesfully registered. Please check your email for details</div>";
        $user = $email1; // Participant's Mail-ID
        $admin = 'admin@jiitconverge.com';     
        $fest = "samarthd97@gmail.com";   
        $subject = "Copy of your form submission";

        $message1 = "Thank You for registering at Converge-2018 <br>";
        $message2 = "Your Event Details <br><br>Event: $eventname";
        $message2.= "<br>On $date <br>Reporting Time: $reportime <br>Event starts at $eventime.";
        $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br><br>For more details,<br>Contact ";
        $message3.= "<br>Event Coordinators<br>Samarth Dhingra 8447897332 <br><br>Regards JIIT Converge Team ";
        $header = "From: ".$admin; 

        $fmessage =$message1.$message2.$message3;
        $m=maildesign($fmessage,$fname1);
        sendmail($user,$subject,$m,$header); 
        if ($email2!= ''){
            sendmail($email2,$subject,$m,$header);
        }
        
        //sendmail($user,$subject,$message1,$header);
        //sendmail($user,$subject,$message2,$header);
        //sendmail($user,$subject,$message3,$header);
        
        $message = "A new registration for event: $eventname <br>Details <br>Team Particpant Name: $fname1";
        $message.= "<br>College: $college1  <br><br>Team Participant Details <br>Name: $fname1 <br>Mail-ID: $email1 <br>Contact No.: $phone1 ";
        if ($fname2 != ''){
            $message.="<br> Team Participant Name : $fname2";
            $message.= "<br>College: $college2  <br><br>Team Participant Details <br>Name: $fname2 <br>Mail-ID: $email2 <br>Contact No.: $phone2 ";
        }
        $message.= "<br>Number of members in the team: $team_members";
        $subject2 = "Form Submission for your event $eventname"; 

        sendmail($fest,$subject2,maildesign($message,"Event Head"),$header); // sends a copy of the message to the sender
    } else {
        echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. Please try again.</div>";
    }
     }

     	 //$team=1;
 }
 else{
     echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. This email or contact is already registered for INQUIZITIVE. Please try again.</div>";
}
$connection->close();
?>