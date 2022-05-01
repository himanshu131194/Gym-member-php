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
$quality =     $_POST['quality_stars'];
$review =    $_POST['review'];



echo "<br>";
echo "Your name is : ".$name;
echo "<br>";
echo "Serice quality given to us : ".$quality;
echo "<br>";
echo "Your's review : ".$review;
echo "<br>";

$sql="INSERT INTO reviews(name,quality,statement) VALUES('$name','$quality','$review')";

$query =  mysqli_query($conn,$sql);

if ($query) {
    echo "your review successfully saved into our database ... thanks we will work furthur on your review .. :)";
    echo "<br>";
} else {
   echo "plz try again ... :( ";
   echo "<br>";
}


?>