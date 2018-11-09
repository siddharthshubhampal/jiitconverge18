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
$event='BADMINTON';
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

// $event_type = mysqli_escape_string($connection, $_POST['event_type']);
// if ($event_type == 1){
//     $event_type = 'Singles';
// }
// else {
//     $event_type = 'Team';
// }

$event_type = 'Team';

//$team;
$eventname=$gender.' Badminton Competition - '.$event_type ;
$date= ' 2nd, 3rd and 4th Feb 2018 ';
$eventime= ' 9:00 A.M. to 5:00 P.M. ';
$reportime= ' NA ';
$ses_sql=mysqli_query($connection,"SELECT * FROM badminton WHERE email_id='$email1' and event_type='$event_type' or contact='$phone1' and event_type='$event_type' or gender!='$gender' and email_id='$email1' or gender!='$gender' and contact='$phone1'");
 if($ses_sql->num_rows==0)
 {
     // new Record
     if ($event_type == 'Singles'){
         $sql = "INSERT INTO badminton VALUES ('$college','$event_type','$gender','0','$fname1','$phone1','$email1')";
     }
     else{
         $sql = "INSERT INTO badminton VALUES ('$college','$event_type','$gender','$team_members','$fname1','$phone1','$email1')";
     }
     if (mysqli_query($connection,$sql) == TRUE) {
        echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal's>You have succesfully registered. Please check your email for details</div>";
        $user = $email1; // Participant's Mail-ID
        $admin = 'admin@jiitconverge.com';     
        $fest = "singh.arjun535@gmail.com";   
        $subject = "Copy of your form submission";

        //$message4 = "Hi $fname1 ";
        $message4= "Thank You for registering at Converge-2018<br> ";
        $message2 = "Your Event Details <br><br>Event: $eventname";
        $message2.= "<br>On $date <br>Event starts at $eventime ";
        $message3 = "<br><br>Location: Inside Jaypee WishTown, Sector-128, Noida (3-4 Kms from Amity University)<br><br>For more details,<br>Contact ";
        $message3.= "<br>Event Coordinators<br>Arjun 8700126696 <br>Regards JIIT Converge Team ";
        $header = "From: ".$admin;   

        $fmessage =$message4.$message2.$message3;
        $m=maildesign($fmessage,$fname1);
        sendmail($user,$subject,$m,$header);
       // sendmail($user,$subject,$message4,$header);
        //sendmail($user,$subject,$message2,$header);
       // sendmail($user,$subject,$message3,$header);

        $message = "A new registration for event: $eventname <br>Details <br>Participant/Team Captain Name: $fname1 ";
        $message.= "<br>Mail-ID: $email1 <br>Contact No.: $phone1 <br>College: $college ";

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
     $test = mysqli_query($connection,"select * from badminton where gender!='$gender' and email_id='$email1' or gender!='$gender' and contact='$phone1'");
     if ($test->num_rows > 0){
         if ($gender == 'Boys'){
             $g = 'Girls';
         }
         else {
             $g = 'Boys';
         }
         $eventname2=$g.' Badminton Competition - '.$event_type ;
         echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>There was error in registration. This email or contact is already registered for ".$eventname2.".You cannot register with same email/contact for ".$eventname.". Please Try Again.</div>";
     }
     else {
         echo "<div style='width:60%;height:60%;margin:20% auto;font-size:150%;text-align:center;font-family:Lato;word-wrap:normal'>There was error in registration. This email or contact is already registered for ".$eventname.". Please Try Again.</div>";
     }
     
}   
$connection->close();
?>