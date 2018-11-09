<?php
include("sendmail.php");
include("maildesign.php");
$servername = 'localhost';
$username = 'root';
$password = 'pansh102701#-db';
$dbname = "u357753357_jiit";

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
$event='STAGEPLAY';
$eventname='Kalamanch - Stage Play Event';
$year=mysqli_real_escape_string($connection,$_POST['year']);
$phone1=mysqli_real_escape_string($connection,$_POST['phone1']);
$email1=mysqli_real_escape_string($connection,$_POST['email1']);
$url=mysqli_real_escape_string($connection,$_POST['url']);
$fname2=mysqli_real_escape_string($connection,$_POST['firstname2']);
$lname2=mysqli_real_escape_string($connection,$_POST['lastname2']);
$phone2=mysqli_real_escape_string($connection,$_POST['phone2']);
$email2=mysqli_real_escape_string($connection,$_POST['email2']);
$team;
$date= ' March 6, 2016 ';
$eventime= ' 9:00 A.M. ';
$reportime= ' 8:00 A.M. ';
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


$sql = "INSERT INTO sample VALUES ('$teamname','$team_members','$event','$team','$fname1','$lname1','$college','$email1','$year','$phone1','$url','$fname2','$lname2','$email2','$phone2')";

    $user = $email1; // Participant's Mail-ID
    $admin = 'admin@jiitconverge.com';     
    $fest = "nupurpanwar42@gmail.com";   
    $subject = "Copy of your form submission";

   // $message1 = "Hi $teamname !";
    $message1= "Thank You for registering at Converge-2016<br> ";
    $message2 = "Your Event Details <br><br>Event: $eventname";
    $message2.= "<br>On $date <br>Reporting Time: $reportime <br>Event starts at $eventime ";
    $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br><br>For more details,<br>Contact ";
    $message3.= "<br>Event Coordinator<br>Nupur Panwar  +91-8375950557<br><br>Regards JIIT Team ";
    $message4 = "Your registration will be considered complete only when you mail your detailed script details to the undersigned";
    $message4.= "<br>Event Coordinator<br>Nupur Panwar +91-8375950557 <br>Mail her at nupurpanwar42@gmail.com <br><br>Regards JIIT Team ";
    $header = "From: ".$admin;   
    
    $fmessage =$message1.$message2.$message3.$message4;
    $m=maildesign($fmessage,$teamname);
    sendmail($user,$subject,$m,$header);
 
    //sendmail($user,$subject,$message1,$header);
    //sendmail($user,$subject,$message2,$header);
    //sendmail($user,$subject,$message3,$header);
    //sendmail($user,$subject,$message4,$header);

    $message = "A new registration for event: $eventname <br>Details <br>Team Name: $teamname ";
    $message.= "<br>Number of members in the team: $team_members ";
    $message.= "<br>Script Name and Genre: $url <br>College: $college <br>Mail-ID: $email1 <br>Contact No.: $phone1 <br>";
    $subject2 = "Form Submission for your event $eventname";    

    sendmail($fest,$subject2,maildesign($message,"Event Head"),$header); // sends a copy of the message to the sender
    
    if ($connection->query($sql) == TRUE) {
    echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>You have succesfully registered. Check your mail for details.</div>";
} else {
    echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. Please try again.</div>";
}
$connection->close();
?>