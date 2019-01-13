<?php
include("sendmail.php");
include("maildesign.php");
//$servername = 'mysql6.000webhost.com';
//$username = 'a5289196_j128';
//$password = 'pansh102701#-db';
//$dbname = "u357753357_jiit";
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

//$teamname=mysqli_real_escape_string($connection,$_POST['teamname']);
$team_members=mysqli_real_escape_string($connection,$_POST['team_members']);
$fname1=mysqli_real_escape_string($connection,$_POST['firstname1']);
//$fname2=mysqli_real_escape_string($connection,$_POST['firstname2']);
//$fname3=mysqli_real_escape_string($connection,$_POST['firstname3']);
//$fname4=mysqli_real_escape_string($connection,$_POST['firstname4']);
//$lname1=mysqli_real_escape_string($connection,$_POST['lastname1']);
$college=mysqli_real_escape_string($connection,$_POST['college']);
$event='BLUEWHALE';
$eventname='Blue Whale Challenge - manual robotics event';
//$year=mysqli_real_escape_string($connection,$_POST['year']);
$phone1=mysqli_real_escape_string($connection,$_POST['phone1']);
//$phone2=mysqli_real_escape_string($connection,$_POST['phone2']);
//$phone3=mysqli_real_escape_string($connection,$_POST['phone3']);
//$phone4=mysqli_real_escape_string($connection,$_POST['phone4']);
$email1=mysqli_real_escape_string($connection,$_POST['email1']);
//$email2=mysqli_real_escape_string($connection,$_POST['email2']);
//$email3=mysqli_real_escape_string($connection,$_POST['email3']);
//$email4=mysqli_real_escape_string($connection,$_POST['email4']);
$team_name=mysqli_real_escape_string($connection,$_POST['tname']);

//$fname2=mysqli_real_escape_string($connection,$_POST['firstname2']);
//$lname2=mysqli_real_escape_string($connection,$_POST['lastname2']);
//$phone2=mysqli_real_escape_string($connection,$_POST['phone2']);
//$email2=mysqli_real_escape_string($connection,$_POST['email2']);
//$team;
$date= ' Feb 3, 2018 ';
$eventime= ' 10:00 A.M. ';
$ses_sql=mysqli_query($connection,"SELECT * FROM robotics WHERE event_name='$event' and email_head='$email1' or event_name='$event' and phone_head='$phone1' or event_name='$event' and team_name='$team_name'");
 if($ses_sql->num_rows==0)
 {
     $sql = "INSERT INTO robotics VALUES ('$event','$college','$team_members','$team_name','$fname1','$phone1','$email1')";
     
     //$sql = "INSERT INTO robotics VALUES ('$event','$college','$fname1','$phone1','$team_members','$dance_form','$email1','$fname2','$email2','$phone2')";
     if (mysqli_query($connection,$sql) == TRUE) {
        echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>You have succesfully registered. Please check your email for details.</div>";
        $user = $email1; // Participant's Mail-ID
        $admin = 'admin@jiitconverge.com';     
        $fest = "vishadprajapati000@gmail.com";   
        $subject = "Copy of your form submission";

        $message1 = "Thank You for registering at Converge-2018 <br>";
        $message1.= "Your Team $team_name has successfully registered. <br>";
        $message2 = "Your Event Details <br><br>Event: $eventname";
        $message2.= "<br>On $date <br>Event starts at $eventime besides new cafe";
        $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br><br>For more details,<br>Contact ";
        $message3.= "<br>Event Coordinators<br>Vishad +919828280864 <br>Regards JIIT Converge Team <br><br> Please keep checking jiitconverge.com for updates.";
        $header = "From: ".$admin; 

        $fmessage =$message1.$message2.$message3;
        $m=maildesign($fmessage,$fname1);
        sendmail($user,$subject,$m,$header);
        //sendmail($user,$subject,$message1,$header);
        //sendmail($user,$subject,$message2,$header);
        //sendmail($user,$subject,$message3,$header);

        $message = "A new registration for event: $eventname <br>Details <br>Team Name: $team_name  <br>Team Head Name: $fname1";
        $message.= "<br>Number of members in the team: $team_members";
        $message.= "<br>College: $college  <br><br>Team Head Details <br>Name: $fname1 <br>Mail-ID: $email1 <br>Contact No.: $phone1 ";

        $subject2 = "Form Submission for your event $eventname"; 

        sendmail($fest,$subject2,maildesign($message,"Event Head"),$header); // sends a copy of the message to the sender
    } else {        
        echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. Please try again.</div>";
    }
     }

     	 //$team=1
 else{
//while($row=mysqli_fetch_assoc($ses_sql))
//{
//$team=$row['teamid'];
// $team=$team+1;
//break; 
//}
     $sql_test = mysqli_query($connection,"SELECT * FROM robotics WHERE event_name = '$event' and team_name = '$team_name'");
        if ($sql_test->num_rows > 0 ){
            echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. A team with Team Name ".$team_name. " is already registred for ".$eventname." Please try again with a different team name.</div>";
        }
        else {
            echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>There was error in registration. This email or contact is already registered for ".$eventname.". Please try again.</div>";
        }
     
}
$connection->close();
?>