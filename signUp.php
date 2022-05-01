<?php 
include 'connection.php';
error_reporting(0);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>contact us</title>
</head>

<!--google fonts link-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<!--navbar-->
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img class="bi me-2" width="40" height="32" src="gymlogo.png" alt="">
            <span class="fs-4">Newgen GYM</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.html"
                    style="font-family: 'Roboto Condensed', sans-serif;font-size: 19px;" class="nav-link"
                    aria-current="page">Home</a></li>
            <li class="nav-item"><a href="trainers.html"
                    style="font-family: 'Roboto Condensed', sans-serif;font-size: 19px;" class="nav-link">Trainers</a>
            </li>
            <li class="nav-item"><a href="gallery.html"
                    style="font-family: 'Roboto Condensed', sans-serif;font-size: 19px;" class="nav-link">Gallery</a>
            </li>
            <li class="nav-item"><a href="stories.html"
                    style="font-family: 'Roboto Condensed', sans-serif;font-size: 19px;" class="nav-link">Stories</a>
            </li>
            <li class="nav-item"><a href="contact.html"
                    style="font-family: 'Roboto Condensed', sans-serif;font-size: 19px;" class="nav-link">Contact</a>
            </li>

        </ul>
</div>


<body>

    <br>
    <br>

    <div class="container">
        <div class="row">
            <form action="newSubmit.php" method="post">
                <div class="mb-3">
                    <label for="phone1" class="form-label">Membership ID</label>
                    <input name="phone1" type="text" class="form-control" id="m_id" name="m_id" value="<?php echo time(); ?>" readonly required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Name</label>
                    <input name="address" type="text" class="form-control" id="u_name" name="u_name"aria-describedby="emailHelp"
                        required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Street name</label>
                    <input name="address" type="text" class="form-control" id="street_name" name="street_name" aria-describedby="emailHelp"
                        required>
                </div><div class="mb-3">
                    <label for="address" class="form-label">City</label>
                    <input name="address" type="text" class="form-control" id="city"  name="city" aria-describedby="emailHelp"
                        required>
                </div><div class="mb-3">
                    <label for="address" class="form-label">Zipcode</label>
                    <input name="address" type="text" class="form-control" id="zipcode" name="zipcode" aria-describedby="emailHelp"
                        required>
                </div><div class="mb-3">
                    <label for="address" class="form-label">State</label>
                    <input name="address" type="text" class="form-control" id="state" name="state" aria-describedby="emailHelp"
                        required>
                </div><div class="mb-3">
                    <label for="address" class="form-label">Gender</label>
                    <select name="gender"  class="form-control" id="boxx" required>
                        <option value="">--Please Select--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div><div class="mb-3">
                    <label for="address" class="form-label">Date of bith</label>
                    <input name="address" type="text" class="form-control" id="dob" name="dob" aria-describedby="emailHelp"
                        required>
                </div><div class="mb-3">
                    <label for="address" class="form-label">Phone No</label>
                    <input name="address" type="text" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp"
                        required>
                </div><div class="mb-3">
                    <label for="address" class="form-label">Email</label>
                    <input name="address" type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        required>
                </div><div class="mb-3">
                    <label for="address" class="form-label">Joining Date</label>
                    <input type="date" name="jdate" class="form-control" id="jdate" name="jdate" aria-describedby="emailHelp"
                        required>
                </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Plan</label>
                    <select name="plan" id="boxx" class="form-control" onchange="myplandetail(this.value)" required>
					<option value="">--Please Select--</option>
					<?php
						$query="select * from plan where active='yes'";
						$result=mysqli_query($conn,$query);
						if(mysqli_affected_rows($conn)!=0){
							while($row=mysqli_fetch_row($result)){
								echo "<option value=".$row[0].">".$row[1]."</option>";
							}
						}
					?>
				    </select>
                </div>
                <div class="mb-3" id="plandetls">

                </div>

                <button type="submit" class="btn btn-primary"
                    style="background-color: green;color: white; margin-bottom: 100px;">Submit</button>
            </form>


        </div>
    </div>
    <script>
        function myplandetail(str){
            if(str==""){
                document.getElementById("plandetls").innerHTML = "";
                return;
            }else{
                if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                    }
                    xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("plandetls").innerHTML=this.responseText;
                    }
                };
                xmlhttp.open("GET","planDetails.php?q="+str,true);
                xmlhttp.send();	
            }
        }
    </script>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>