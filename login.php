<?php session_start(); 

 ?>

<!doctype html>
<html lang="en">
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<title>Razzo Traders - Login</title>
</head>  
</html>
<body>
    <div class="container">
<img src="razzo logo.jpg" width="150px" height="100px" align="left">


<div class="icons">
   <a href="https://www.facebook.com/Razzomall">
<img src="FACEBOOK ICON.png" width="40px" height="40px"  style=" float:right; text-align:right;  padding-top:5px">
</a>
<a href="https://www.instagram.com/razzomall/" >
<img src="insta.jpg" width="40px" height="40px"  style=" float:right; text-align:right;  ; padding-top:5px">
</a>
</div>
 </div>
 
 <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li style="padding-left:250px" class="nav-item active">
        <a class="nav-link" href="razzomall.php" style="">Home </a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="aboutUs.html">About Us </a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="ourProducts.html">Products </a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="ContUs.html">Contact Us </a>
      </li>
	  </ul>
	  
	  	   <li class="nav-item active">
        <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>
      </li>
	  </ul>
	  
  </div>
</nav>
</nav>
 
 <div class="row" style="margin:auto;">
 <div class="col-md-6">
 <form method="post">                    
 <label> Username: </label>
 <input class="form-control" type="text" name="username" id="username"  Required> <br>
 <label> Password: </label>
 <input class="form-control" type="password" name="userpassword" id="userpassword"  Required> <br>                    
 <input class="btn btn-success" style="border-radius: 15px;"
 type="submit" name="usersubmit" value="Login">
 </form>
 </div>
           
		    <?php
				include_once("database.php");
				 if(isset($_POST['usersubmit']))
				 {					 
				$query = "select * from tblusers where username='{$_POST['username']}' and userpassword='{$_POST['userpassword']}'";
				
			    $result = mysqli_query($mysqli, $query) or die(mysqli_error("Request failed."));

				$row = mysqli_fetch_assoc($result);
                if(is_array($row) && !empty($row))
					{
                    $_SESSION['loginuser'] = $row['username'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['userid'] = $row['userId'];
					
					header('Location: razzomall.php');
					
                } else 
				{
                    echo "Invalid login details.";
                    
                    }
					}
		   ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
<div class="footer" style="height:100px; width:100%; background-color:#ed9194;">
<div class="icons" style=" float:right; padding-top:50px; padding-right: 5px;">
   <a href="https://www.facebook.com/Razzomall">
<img src="FACEBOOK ICON.png" width="40px" height="40px"  style=" text-align:right;   padding-top:5px">
</a>
<a href="https://www.instagram.com/razzomall/">
<img src="insta.jpg" width="40px" height="40px"  style=" text-align:right;   padding-top:5px">
</a>
</div>
 <div style="text-align: center">
            <p>
               © RAZZO - All Rights Reserved @2020 <br>
            Contact Info <br>
			Office 17, 4th Floor Al Hafeez View Liberty Commercial Zone Gulberg III Lahore, Pakistan
            </p>
        </div>
</div>
</body>

</html>
