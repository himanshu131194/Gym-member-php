<?php
require 'connection.php';

 $memID=$_POST['m_id'];
 $uname=$_POST['u_name'];
 $stname=$_POST['street_name'];
 $city=$_POST['city'];
 $zipcode=$_POST['zipcode'];
 $state=$_POST['state'];
 $gender=$_POST['gender'];
 $dob=$_POST['dob'];
 $phn=$_POST['mobile'];
 $email=$_POST['email'];
 $jdate=$_POST['jdate'];
 $plan=$_POST['plan'];

// inserting into users table
$query="insert into users(username,gender,mobile,email,dob,joining_date,userid) values('$uname','$gender','$phn','$email','$dob','$jdate','$memID')";
    if(mysqli_query($conn,$query)==1){
      //Retrieve information of plan selected by user
      $query1="select * from plan where pid='$plan'";
      $result=mysqli_query($conn,$query1);

        if($result){
          $value=mysqli_fetch_row($result);
          date_default_timezone_set("Asia/Calcutta"); 
          $d=strtotime("+".$value[3]." Months");
          $cdate=date("Y-m-d"); //current date
          $expiredate=date("Y-m-d",$d); //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid
          $query2="insert into enrolls_to(pid,uid,paid_date,expire,renewal) values('$plan','$memID','$cdate','$expiredate','yes')";
          if(mysqli_query($conn,$query2)==1){

            $query4="insert into health_status(uid) values('$memID')";
            if(mysqli_query($conn,$query4)==1){

              $query5="insert into address(id,streetName,state,city,zipcode) values('$memID','$stname','$state','$city','$zipcode')";
              if(mysqli_query($conn,$query5)==1){
               echo "<head><script>alert('Member Added ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=admin/dashboard/admin/table_view.php'>";
              }
              else{
                  echo "<head><script>alert('Member Added Failed');</script></head></html>";
                 echo "error: ".mysqli_error($conn);
                 //Deleting record of users if inserting to enrolls_to table failed to execute
                 $query3 = "DELETE FROM users WHERE userid='$memID'";
                 mysqli_query($conn,$query3);
              }
            }
             
            else{
               echo "<head><script>alert('Member Added Failed');</script></head></html>";
              echo "error: ".mysqli_error($conn);
               //Deleting record of users if inserting to enrolls_to table failed to execute
                $query3 = "DELETE FROM users WHERE userid='$memID'";
                mysqli_query($conn,$query3);
            }
            
          }
          else{
            echo "<head><script>alert('Member Added Failed');</script></head></html>";
            echo "error: ".mysqli_error($conn);
            //Deleting record of users if inserting to enrolls_to table failed to execute
             $query3 = "DELETE FROM users WHERE userid='$memID'";
             mysqli_query($conn,$query3);
          }

         
        }
        else
        {
          echo "<head><script>alert('Member Added Failed');</script></head></html>";
          echo "error: ".mysqli_error($conn);
           //Deleting record of users if retrieving inf of plan failed
          $query3 = "DELETE FROM users WHERE userid='$memID'";
          mysqli_query($conn,$query3);
        }

    }
    else{
        echo "<head><script>alert('Member Added Failed');</script></head></html>";
        echo "error: ".mysqli_error($conn);
      }
?>
