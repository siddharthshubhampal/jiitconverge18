<?php
include("sendmail.php");
include("maildesign.php");
//$servername = 'mysql6.000webhost.com';
//$username = 'a5289196_j128';
////$password = 'pansh102701#-db';
////$dbname = "u357753357_jiit";
//$password = 'jiitconverge17@128';
//$dbname = 'a5289196_2017';
$servername = 'localhost';
$username = 'jiit128';
$password = 'jiitconverge17@128';
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

$teamname=mysqli_real_escape_string($connection,$_POST['teamname']);
$team_members=mysqli_real_escape_string($connection,$_POST['team_members']);
$fname1=mysqli_real_escape_string($connection,$_POST['firstname1']);
//$lname1=mysqli_real_escape_string($connection,$_POST['lastname1']);
$college1=mysqli_real_escape_string($connection,$_POST['college1']);
//$college2=mysqli_real_escape_string($connection,$_POST['college2']);
$event='GOOGLEQUIZ';
$eventname='Googled About Quiz ? - The Google Quiz';
$phone1=mysqli_real_escape_string($connection,$_POST['phone1']);
$email1=mysqli_real_escape_string($connection,$_POST['email1']);
$date= 'FEB 5, 2017';
$eventime= ' 11:00 A.M. ';
$reportime= ' 10:30 A.M. ';
$ses_sql=mysqli_query($connection,"SELECT * FROM gdg_events WHERE event_name='$event' and email_id='$email1' or event_name='$event' and phone_participant='$phone1'");
 if($ses_sql->num_rows==0)
 {
     $t = mysqli_query($connection, "SELECT * FROM gdg_events WHERE event_name='$event' and team_name='$teamname'");
     if ($t->num_rows != 0){
         echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>A team with this name is already registered. Please Use another name.</div>";;
     }
    else {
     $sql = "INSERT INTO gdg_events VALUES ('$college1','$event','$fname1','$phone1','$team_members','$email1','$teamname')";
     
     if (mysqli_query($connection,$sql) == TRUE) {
        echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>You have succesfully registered. Please check you email for details.</div>";
        $user = $email1; // Participant's Mail-ID
        $admin = 'admin@jiitconverge.com';     
        $fest = "pranavsharma@jiitconverge.com";   
        $subject = "Copy of your form submission";

        $message1 = "Thank You for registering at Converge-2017 <br>";
        $message2 = "Your Event Details <br><br>Event: $eventname";
        $message2.= "<br>On $date <br>Reporting Time: $reportime <br>Event starts at $eventime ";
        $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br><br>For more details,<br>Contact ";
        $message3.= "<br>Event Coordinator<br>Pranav Sharma +918376003776 <br><br>Regards JIIT Converge Team ";
        $header = "From: ".$admin; 

        $fmessage =$message1.$message2.$message3;
        $m=maildesign($fmessage,$fname1);
        sendmail($user,$subject,$m,$header);
        //sendmail($user,$subject,$message1,$header);
        //sendmail($user,$subject,$message2,$header);
        //sendmail($user,$subject,$message3,$header);
        
        $message = "A new registration for event: $eventname <br>Details <br>Team Particpant Name: $fname1";
        $message.= "<br>College: $college1  <br><br>Team Participant Details <br>Name: $fname1 <br>Mail-ID: $email1 <br>Contact No.: $phone1 ";
        $message.= "<br>Team Name: $teamname <br>Number of members in the team: $team_members";
        $subject2 = "Form Submission for your event $eventname"; 

        //sendmail($fest,$subject2,maildesign($message,"Event Head"),$header); // sends a copy of the message to the sender
    } else {
        echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. Please try again.</div>";
        echo mysqli_error($connection);
    }

    } 	 //$team=1;
 }
 else{
//while($row=mysqli_fetch_assoc($ses_sql))
//{
//$team=$row['teamid'];
// $team=$team+1;
//break; 
//}
     echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. This email or contact is already registered for Googled About Google?. Please try again.</div>";
}
$connection->close();
?>