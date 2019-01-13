<!--This is done. Email Contents need to be changed-->
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

// teamname = society name
$teamname=mysqli_real_escape_string($connection,$_POST['teamname']);
//$transport = mysqli_real_escape_string($connection,$_POST['transport']);
$transport='No';
$team_members=mysqli_real_escape_string($connection,$_POST['team_members']);
$fname1=mysqli_real_escape_string($connection,$_POST['firstname1']);
//$lname1=mysqli_real_escape_string($connection,$_POST['lastname1']);
$college=mysqli_real_escape_string($connection,$_POST['college']);
//$url=mysqli_real_escape_string($connection,$_POST['url']);
$event='POISE';
$eventname='Poise - The Fashion Show Theme Walk Event';
$year=mysqli_real_escape_string($connection,$_POST['year']);
$phone1=mysqli_real_escape_string($connection,$_POST['phone1']);
$email1=mysqli_real_escape_string($connection,$_POST['email1']);

$fname2=mysqli_real_escape_string($connection,$_POST['firstname2']);
//$lname2=mysqli_real_escape_string($connection,$_POST['lastname2']);
$phone2=mysqli_real_escape_string($connection,$_POST['phone2']);
$email2=mysqli_real_escape_string($connection,$_POST['email2']);
//$team;
$date= ' 4th FEB 2018 ';
$eventime= ' 02:15 P.M. ';
$reportime= ' 10:00 A.M. ';
$ses_sql=mysqli_query($connection,"SELECT * FROM panache WHERE society_name='$teamname' or phone_head = '$phone1' or phone_head = '$phone2' or phone_rep = '$phone1' or phone_rep='$phone2' or email_head='$email1' or email_head='$email2' or email_rep = '$email1' or email_rep = '$email2'");
 if($ses_sql->num_rows==0)
 {
     // new record
     $sql = "INSERT INTO panache VALUES ('$college','$team_members','$year','$fname1','$phone1','$email1','$fname2','$phone2','$email2','$transport','$teamname')";
     if (mysqli_query($connection,$sql) == TRUE) {
        echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>You have succesfully registered. Please check your email for details</div>";
          $user = $email1; // Participant's Mail-ID
    $admin = 'admin@jiitconverge.com';     
    $fest = "akshitag1997@gmail.com";   
    $subject = "Copy of your form submission";

    //$message1 = "Hi fellas ";
    $message1= "Thank You for registering at Converge-2018<br> ";
    $message2 = "Your Event Details <br><br>Event: $eventname";
    $message2.= "<br>On $date <br>Reporting Time: $reportime <br>Event starts at $eventime ";
    $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br><br>For more details,<br>Contact Us ";
    $message3.= "<br>Event Coordinator<br>Akshita 8527348631 <br><br>Regards JIIT Converge Team ";
    $header = "From: ".$admin;
    $fmessage =$message1.$message2.$message3;
    $m=maildesign($fmessage,$teamname);
    sendmail($user,$subject,$m,$header);
    sendmail($email2,$subject,$m,$header);
    //sendmail($user,$subject,$message1,$header);
    //sendmail($user,$subject,$message2,$header);
    //sendmail($user,$subject,$message3,$header);

    $message = "A new registration for event: $eventname <br>Details <br>Team Name: $teamname";
    $message.= "<br>Number of members in the team: $team_members";
    $message.= "<br>College: $college  <br>Team Head Details <br><br>Name: $fname1 <br>Mail-ID: $email1 <br>Contact No.: $phone1 <br><br> Team Representative Details <br> Name:$fname2 <br>Mail-ID: $email2 <br>Contact No.: $phone2 ";
    $subject2 = "Form Submission for your event $eventname";
    
    sendmail($fest,$subject2,maildesign($message,"Event Head"),$header); // sends a copy of the message to the sender
    }   else {
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
     $sql_test = mysqli_query($connection,"SELECT * FROM panache WHERE society_name = '$teamname'");
     if ($sql_test->num_rows != 0){
          echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. This Society name is already registered. Please try again.</div>";
     }
     else {
         echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. An emailID or contact you entered was already in our database.</div>";
     }
     
 }
$connection->close();
?>