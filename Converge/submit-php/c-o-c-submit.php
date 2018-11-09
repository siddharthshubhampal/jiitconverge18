<?php
include("sendmail.php");
include("maildesign.php");
$servername = 'mysql6.000webhost.com';

$username = 'a5289196_j128';

$password = 'jiitconverge17@128';

$dbname = "a5289196_2017";
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
ini_set("mail.log", "/tmp/mail.log");
ini_set("mail.add_x_header", TRUE);

$teamname=mysqli_real_escape_string($connection,$_POST['teamname']);
$team_members=mysqli_real_escape_string($connection,$_POST['team_members']);
$fname1=mysqli_real_escape_string($connection,$_POST['firstname1']);
$lname1=mysqli_real_escape_string($connection,$_POST['lastname1']);
$college=mysqli_real_escape_string($connection,$_POST['college']);
$event='COC';
$eventname='C.O.C - The Robotics Competition';
$year=mysqli_real_escape_string($connection,$_POST['year']);
$phone1=mysqli_real_escape_string($connection,$_POST['phone1']);
$email1=mysqli_real_escape_string($connection,$_POST['email1']);

$fname2=mysqli_real_escape_string($connection,$_POST['firstname2']);
$lname2=mysqli_real_escape_string($connection,$_POST['lastname2']);
$phone2=mysqli_real_escape_string($connection,$_POST['phone2']);
$email2=mysqli_real_escape_string($connection,$_POST['email2']);
$team;
$date= ' March 5, 2016 ';
$eventime= ' 10:00 A.M. ';
$reportime= ' 9:15 A.M. ';
$ses_sql=mysqli_query($connection,"SELECT * FROM sample WHERE event='$event' ORDER BY teamid DESC");
 if($ses_sql->num_rows==0)
 {
	 $team=1;
 }
 else{
while($row=mysqli_fetch_assoc($ses_sql))
{
$team=$row['teamid'];
 $team=$team+1;
break; 
}
}


$sql = "INSERT INTO sample VALUES ('$teamname','$team_members','$event','$team','$fname1','$lname1','$college','$email1','$year','$phone1','','$fname2','$lname2','$email2','$phone2')";

    $user = $email1; // Participant's Mail-ID
    $admin = 'admin@jiitconverge.com';     
    $fest = "tech@jiitconverge.com";   
    $subject = "Copy of your form submission";

    $message2 = "Your Event Details <br><br>Event: $eventname";
    $message2.= "<br>On $date <br>Reporting Time: $reportime <br>Event starts at $eventime ";
    $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br><br>For more details,<br>Contact ";
    $message3.= "<br>Event Coordinator <br>Somya Kumar Sodani +91-7042093474<br>Ganesh Sawhney +91-9717694417 <br>Sagar Agarwal +91-9015232623 <br><br>Regards JIIT Team ";
    $message4 = "Thank You for registering at Converge-2016<br> ";
    $header = "From: ".$admin;
     $fmessage =$message2.$message3.$message4;
     $m=maildesign($fmessage,$teamname);
    sendmail($user,$subject,$m,$header);
    //sendmail($user,$subject,$message2,$header);
    //sendmail($user,$subject,$message3,$header);
if($year == '1')
{
$level= "Undergraduate 1st year";
}
else if($year == '2')
{
$level= "Undergraduate 2nd year";
}
else if($year == '3')
{
$level= "Undergraduate 3rd year";
}
else if($year == '4')
{
$level= "Undergraduate 4th year";
}

	
    $message = "A new registration for event: $eventname <br>Details <br>Team Name: $teamname ";
    $message.= "<br>Number of members in the team: $team_members <br>College: $college<br><br>Team Head Details <br>Name: $fname1 <br>Educational Level: $level <br>Mail-ID: $email1 <br>Contact No.: $phone1  ";
	
    $subject2 = "Form Submission for your event: $eventname";
    
    sendmail($fest,$subject2,maildesign($message,"Event Head"),$header); // sends a copy of the message to the sender
    
    
if ($connection->query($sql) == TRUE) {
    echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>You have succesfully registered. Check your mail for details.</div>";
} else {
    echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. Please try again.</div>";
}

$connection->close();
?>