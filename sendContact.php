<html>
    <body>
        <font style="font-size:20px;">
                plz wait for 5 seconds ....
        </font>
        <br>
        <br>

    <script>
         setTimeout(function(){
            window.location.href = 'index.html';
         }, 5000);
      </script>


    </body>
</html>



<?php

include 'connection.php';

error_reporting(0);

$name =     $_POST['name'];
$phone1 =     $_POST['phone1'];
$email=    $_POST['email'];
 $address=   $_POST['address'];
 $dateofreq =  date("Y/m/d");


 echo "Your name is : ".$name;
echo "<br>";
echo "Your phone number is: ".$phone1;
echo "<br>";
echo "Your emil is : ".$email;
echo "<br>";
echo "Your address is : ".$address;
echo "<br>";
echo "Today's date: ".$dateofreq;
echo "<br>";

$sql = "INSERT INTO contactus(fullname,phone1,email,address,dateofreq) VALUES ('$name','$phone1','$email','$address','$dateofreq')";

$query =  mysqli_query($conn,$sql);

if ($query) {
    echo "your request submited to our database , we will respond you soon ... ";
}
else {
    echo "plz try again :( ";
}

?>