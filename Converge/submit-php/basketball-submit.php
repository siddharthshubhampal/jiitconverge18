<!--this is done. need to update contents of the email -- >
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
$college=mysqli_real_escape_string($connection,$_POST['college']);
$event='BASKETBALL';

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

$eventname= $gender.' Basketball Competition';
//$fname2=mysqli_real_escape_string($connection,$_POST['firstname2']);
//$lname2=mysqli_real_escape_string($connection,$_POST['lastname2']);
//$phone2=mysqli_real_escape_string($connection,$_POST['phone2']);
//$email2=mysqli_real_escape_string($connection,$_POST['email2']);
//$team;
$date= ' 2nd, 3rd & 4th FEB 2018 ';
$eventime= ' 9:00 A.M. to 5:00 P.M. ';
$reportime= ' NA ';
$ses_sql=mysqli_query($connection,"SELECT * FROM basketball WHERE gender='$gender' and email_id = '$email1'");
 if($ses_sql->num_rows==0)
 {
     // new record
     $sql = "INSERT INTO basketball VALUES ('$event','$college','$gender','$team_members','$fname1','$phone1','$email1')";
         if (mysqli_query($connection,$sql) == TRUE) {			
            echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>You have succesfully registered. Please check your email for details</div>";
            $user = $email1; // Participant's Mail-ID
            $admin = 'admin@jiitconverge.com';     
            $fest = "vidit.shri11@gmail.com"; 
			$fest1 = "vermamanasvini@gmail.com";
            $subject = "Copy of your form submission";

           // $message1 = "Hi $teamname !";
            $message1= "Thank You for registering at Converge-2018<br>";
            $message2 = "Your Event Details <br><br>Event: $eventname";
            $message2.= "<br>On $date <br>Event starts at $eventime ";
            $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br><br>For more details,<br>Contact ";
           if ($gender == 'Girls'){
     			$messagex= "<br>Event Coordinator<br>Manasvini +91-9599051194 <br><br>Regards JIIT Team ";
			}
			else {
   			 	$messagex= "<br>Event Coordinator<br>Vidit +91-8839547037 <br><br>Regards JIIT Team ";
			}
			 
			 
            $header = "From: ".$admin;

            $fmessage =$message1.$message2.$message3.$messagex;
            $m=maildesign($fmessage,$fname1);
            sendmail($user,$subject,$m,$header);
            //sendmail($user,$subject,$message1,$header);
            //sendmail($user,$subject,$message2,$header);
            //sendmail($user,$subject,$message3,$header);

            $message = "A new registration for event: $eventname <br>Details <br>Team Captain Name: $fname1 ";
            $message.= "<br>Number of members in the team: $team_members <br>College: $college <br>Mail-ID: $email1 <br>Contact No.: $phone1 ";
            $subject2 = "Form Submission for your event $eventname ";    
			if ($gender == 'Girls'){
     			 sendmail($fest1,$subject2,maildesign($message,"Event Head"),$header); // sends a copy of the message to the Girls event head
				echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>Registration Done. Please check your mail for confirmation.</div>";
			}
			else {
   			 	 sendmail($fest,$subject2,maildesign($message,"Event Head"),$header); // sends a copy of the message to the Boys event Head
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
     echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. This emailID is already registered for BAsketball. Please try again.</div>";
}


$connection->close();
?>