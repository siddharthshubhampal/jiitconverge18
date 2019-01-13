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
$event='JAYPEEYOUTHMARATHON';
$eventname='Jaypee Youth Marathon - Run for a cause';
$year=mysqli_real_escape_string($connection,$_POST['year']);
$phone1=mysqli_real_escape_string($connection,$_POST['phone1']);
$email1=mysqli_real_escape_string($connection,$_POST['email1']);

//$team;
$date= ' Feb 3, 2018 ';
$eventime= ' 8:00 A.M. ';
$reportime= ' 7:15 A.M. ';
$ses_sql=mysqli_query($connection,"SELECT * FROM youth_marathon WHERE email_id='$email1' or phone='$phone1'");
 if($ses_sql->num_rows==0)
 {
     // new record insert
	 //$team=1;
     $sql = "INSERT INTO youth_marathon VALUES ('$college','$email1','$phone1','$year','$fname1','')";
     if (mysqli_query($connection,$sql) == TRUE) {
        echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>You have succesfully registered. Please check your email for details</div>";
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
        else if($year == '5')
        {
        $level= "Not in college yet - (School Student)";
        }
        else
        {
        $level="No Longer a Student - (College Pass out)";
        }
        $user = $email1; // Participant's Mail-ID
        $admin = 'admin@jiitconverge.com';     
        $fest = "kapilgupta@outlook.in";   
        $subject = "Copy of your form submission";

       // $message4 = "Hi $fname1 ";
        $message4= "Thank You for registering at Converge-2018 <br>";
         $message2 = "Your Event Details <br><br>Event: $eventname";
        $message2.= "<br>On $date <br>Reporting Time: $reportime <br>Event starts at $eventime";
        $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br>Time 8:00 AM Sharp. <br><br>For more details,<br>Contact ";
        $message3.= "<br>Fest Coordinator<br>Kapil +91-9873434581 <br><br>Regards JIIT Converge Team ";
        $header = "From: ".$admin;

        $fmessage =$message4.$message2.$message3;
        $m=maildesign($fmessage,$fname1);
        sendmail($user,$subject,$m,$header);
        //sendmail($user,$subject,$message4,$header);
        //sendmail($user,$subject,$message2,$header);
        //sendmail($user,$subject,$message3,$header);

        $message = "A new registration for event: $eventname <br>Details <br>Participant Name: $fname1 ";
        $message.= "<br>Educational Level: $level <br>Mail-ID: $email1 <br>Contact No.: $phone1 <br>College/School: $college ";

        $subject2 = "Form Submission for your event $eventname ";       
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
     echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>Error in registration. This email or contact has already registered for JIIT YOUTH MARATHON.</div>";
}


//$sql = "INSERT INTO sample VALUES ('$fname1','1','$event','$team','$fname1','$lname1','$college','$email1','$year','$phone1','','','','','')";


$connection->close();
?>