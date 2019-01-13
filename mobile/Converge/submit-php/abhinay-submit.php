<!--This is done. Email contents need to be changed.-->
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

//ini_set('display_errors', '0');

//error_reporting(-1);
//ini_set('display_errors', 'On');
//set_error_handler("var_dump");
ini_set("mail.log", "C:\Windows\Temp\mail.log");
ini_set("mail.add_x_header", TRUE);

//$teamname=mysqli_real_escape_string($connection,$_POST['teamname']);
$team_members=mysqli_real_escape_string($connection,$_POST['team_members']);
$fname1=mysqli_real_escape_string($connection,$_POST['firstname1']);
//$lname1=mysqli_real_escape_string($connection,$_POST['lastname1']);
$college=mysqli_real_escape_string($connection,$_POST['college']);
//$event='STREETPLAY';
$eventname='Abhinay - A Mono/Duo Act';
//$year=mysqli_real_escape_string($connection,$_POST['year']);
$phone1=mysqli_real_escape_string($connection,$_POST['phone1']);
$email1=mysqli_real_escape_string($connection,$_POST['email1']);
$event='ABHINAY';
//$fname2=mysqli_real_escape_string($connection,$_POST['firstname2']);
//$lname2=mysqli_real_escape_string($connection,$_POST['lastname2']);
//$phone2=mysqli_real_escape_string($connection,$_POST['phone2']);
//$email2=mysqli_real_escape_string($connection,$_POST['email2']);
//$team;
$date= ' 3rd FEB 2018 ';
$eventime= ' 11:00 AM ';
$reportime= ' 10:45 AM ';
$ses_sql=mysqli_query($connection,"SELECT * FROM dramatics WHERE contact='$phone1' and event1='$event'");
 if($ses_sql->num_rows==0)
 {
     $sql = "INSERT INTO dramatics VALUES ('$event','$college','$fname1','$phone1','$email1','$team_members')";
     // new record
    if (mysqli_query($connection,$sql) == TRUE) {
        echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>You have succesfully registered. Please check your email for details</div>";
        $user = $email1; // Participant's Mail-ID
        $admin = 'admin@jiitconverge.com';     
        $fest = "abhivyakti128@gmail.com";   
        $subject = "Copy of your form submission";

        $message2 = "Your Event Details <br><br>Event: $eventname";
        $message2.= "<br>On $date <br>Reporting Time: $reportime <br>Event starts at $eventime ";
        $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br><br>For more details,<br>Contact ";
        $message3.= "<br>Event Coordinator <br>Nityanshi : +91-9675604574 <br><br>Regards JIIT Converge Team ";
        $message4 = "Thank You for registering at Converge-2018<br> ";
        $header = "From: ".$admin;
		
		
        $fmessage =$message2.$message3.$message4;
        $m=maildesign($fmessage,$fname1);
        sendmail($user,$subject,$m,$header);
        //sendmail($user,$subject,$message2,$header);
        //sendmail($user,$subject,$message3,$header);

        $message = "A new registration for event: $eventname <br>Details <br>Team Head Name: $fname1";
        $message.= "<br>Number of members in the team: $team_members";
        $message.= "<br>College: $college  <br><br>Team Head Details <br>Name: $fname1 <br>Mail-ID: $email1 <br>Contact No.: $phone1 ";
        $subject2 = "Form Submission for your event:$eventname";

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
     echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;font-family:'Lato';word-wrap:normal'>This contact number is already registered. Please try again with another contact no.</div>";
}
$connection->close();
?>