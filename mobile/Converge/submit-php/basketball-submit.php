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


$fname1=mysqli_real_escape_string($connection,$_POST['firstname1']);
//$lname1=mysqli_real_escape_string($connection,$_POST['lastname1']);
$college=mysqli_real_escape_string($connection,$_POST['college']);
$team_members = mysqli_real_escape_string($connection,$_POST['team_members']);
//$year=mysqli_real_escape_string($connection,$_POST['year']);
$phone1=mysqli_real_escape_string($connection,$_POST['phone1']);
$email1=mysqli_real_escape_string($connection,$_POST['email1']);
$gender=  mysqli_escape_string($connection, $_POST['gender']);
if ($gender == 1){
    $gender = 'Girls';
}
else {
    $gender = 'Boys';
}

$event='BASKETBALL';
$eventname=$gender.' Basketball Competition';

$date= ' 2nd, 3rd & 4th Feb 2018 ';
$eventime= ' 9:00 A.M. - 5:00 P.M. ';
$ses_sql=mysqli_query($connection,"SELECT * FROM basketball WHERE email_id = '$email1' or contact='$phone1'");
 if($ses_sql->num_rows==0)
 {
    // new record
     $sql = "INSERT INTO basketball VALUES ('$event','$college','$gender','$team_members','$fname1','$phone1','$email1')";
     if ($connection->query($sql) == TRUE) {
            echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>You have succesfully registered. Please check your email for details</div>";
            $user = $email1; // Participant's Mail-ID
            $admin = 'admin@jiitconverge.com';     
            $fest = "vermamanasvini@gmail.com"; //Girl Head
		 	$fest1 = "vidit.shri11@gmail.com"; //Boy head
            $subject = "Copy of your form submission";

           // $message1 = "Hi $teamname !";
            $message1= "Thank You for registering at Converge-2018<br> ";
            $message2 = "Your Event Details <br><br>Event: $eventname";
            $message2.= "<br>On $date <br>Event starts at $eventime ";
            $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br><br>For more details,<br>Contact ";
            if ($gender == 'Girls'){
		 		$message5= "<br>Event Coordinator<br>Manasvini +91-9599051194 <br><br>Regards JIIT Team ";
			}else{
				 $message5= "<br>Event Coordinator<br>Vidit +91-8839547037 <br><br>Regards JIIT Team ";
			}
            $header = "From: ".$admin;  
            $fmessage =$message1.$message2.$message3.$message5;
            $m=maildesign($fmessage,$fname1);
            sendmail($user,$subject,$m,$header);

            //sendmail($user,$subject,$message1,$header);
            //sendmail($user,$subject,$message2,$header);
            //sendmail($user,$subject,$message3,$header);

            $message = "A new registration for event: $eventname <br>Details <br>Team Captain Name: $fname1 ";
            $message.= "<br>Number of members in the team: $team_members <br>College: $college  <br>Mail-ID: $email1 <br>Contact No.: $phone1 ";
            $subject2 = "Form Submission for your event $eventname ";    
			
		 	if ($gender == 'Girls'){
		 		sendmail($fest,$subject2,maildesign($message,"Event Head"),$header); // sends a copy of the message to the sender
			}else{
				sendmail($fest1,$subject2,maildesign($message,"Event Head"),$header); // sends a copy of the message to the sender
			}
            
    
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
   echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. This email or contact is already registered for this event. Please try again.</div>";
}

$connection->close();
?>