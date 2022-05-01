<?php
include 'connection.php';
error_reporting(0);

$name =     $_POST['name'];
$age=    $_POST['age'];
  $gender=  $_POST['gender'];
 $dob=   $_POST['dob'];
 $address=   $_POST['address'];
 $phone1=   $_POST['phone1'];
  $phone2=  $_POST['phone2'];
$email=    $_POST['email'];
 $doa=   $_POST['doa'];


 echo "Your Full Name ".$name;
 echo "<br>";
 echo "Your Age ".$age;
 echo "<br>";
 echo "Your Gender ".$gender;
 echo "<br>";
 echo "Your Date-of-birth ".$dob;
 echo "<br>";
 echo "Your address ".$address;
 echo "<br>";
 echo "Your Primary phonenumber ".$phone1;
 echo "<br>";
 echo "Your Secondary phonenumber ".$phone2;
 echo "<br>";
 echo "Your Email ".$email;
 echo "<br>";
 echo "Your Date-of-admission(today date) ".$doa;
 echo "<br>";


$sql ="INSERT INTO admission(fullname,age,gender,dob,address,phone1,phone2,email,doa) VALUES('$name','$age','$gender','$dob','$address','$phone1','$phone2','$email','$doa')";
$query =  mysqli_query($conn,$sql);

if ($query) {
    echo "<br>";
    echo "<br>";
    echo "your record saved successfully";
    echo "<br>";
} else {
    echo "plz try again :( ";
    echo "<br>";
}

$sql2 = "SELECT id,fullname FROM admission WHERE fullname='$name' AND phone1='$phone1'";
$query2 =  mysqli_query($conn,$sql2);
$row =  mysqli_fetch_assoc($query2);
$memid =  $row['id'];
$memname = $row['fullname'];

echo "<br>";
echo "Member name : ".$memname;
echo "<br>";
echo "Member id(admission id) ".$memid;
echo "<br>";
echo "remember this memid and you name for future modification and furthur operation";


?>