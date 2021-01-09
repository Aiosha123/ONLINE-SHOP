<?php session_start(); ?>

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
<title>Razzo Traders - Home</title>
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


<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul  class="navbar-nav mr-auto">
      <li style="padding-left:250px" class="nav-item active">
        <a class="nav-link" href="razzomall.php">Home </a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="aboutUs.html">About Us </a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="#">Products<span class="sr-only">(current)</span> </a>
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="ContUs.html">Contact Us </a>
      </li>
	  
	  	   <li class="nav-item active">
        <a class="nav-link" href="login.php">Login </a>
      </li>
	  </ul>
	  
  </div>

</nav>


</div>
					<?php
                        if(isset($_SESSION['loginuser'])) {
                        ?>
                        <li class="nav-item"><a class="nav-link" href="signout.php">Sign Out</a></li>
                     

                      <?php  } else {?>                         
                                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                          <li class="nav-item "> <a class="nav-link" href="signup.php">Sign Up </span></a> </li>
						  
                      <?php  } ?>
                </ul>
            </div>
        </nav>

        
		 <?php
                include_once("database.php");
                $id = $_GET['id'];
                
                $result = mysqli_query($mysqli, "select * from tblproducts WHERE productId=$id");

                while($res = mysqli_fetch_array($result))
                {
                    $productname = $res['productName'];
                    $productprice = $res['productPrice'];
                    $productcode = $res['productCode'];
                    if($res['productInStock']=true)
                    {
                        $productstock='yes';
                    }
                    else{
                        $productstock='no';
                    }
                    $productdiscount = $res['productDiscount'];
                    $productsizes = $res['productSizes'];
                    $productdetails = $res['productDetails'];
                    $productimage=$res['photo'];

                }
                ?>
		
		<h1>Edit Product </h1>
		<div class="row">
            <div class="col-md-6">
                <form method="post" enctype="multipart/form-data">
					<input class="form-control"  type="hidden" id="productid" name="productid" value="<?php echo $_GET['id'];?>">
                    <label> Name: </label>
                    <input class="form-control" type="text" name="productname" id="productname" Required value="<?php echo $productname;?>" > <br>
                    <label> Price: </label>
                    <input class="form-control" type="currency" name="productprice" id="productprice"  Required value="<?php echo $productprice;?>" > <br>
                    <label> Code: </label>
                    <input class="form-control" type="text" name="productcode" id="productcode"  Required value="<?php echo $productcode;?>" > <br>
                    <label> Discount: </label>
                    <input class="form-control" type="currency" name="productdiscount" id="productdiscount"  Required value="<?php echo $productdiscount;?>" > <br>
                    <label> Sizes: </label>
                    <input class="form-control" type="text" name="productsizes" id="productsizes"  Required value="<?php echo $productsizes;?>" > <br>
                    <label> In Stock ?: </label>
                    Yes <input class=" radio-inline" type="radio" name="productstock" value="yes" checked> No <input class="  radio-inline" type="radio" name="productstock" value="no" > <br>
					<label> Details: </label>
                    <textarea class="form-control" name="productdetails" id="productdetails" rows="10"  Required> <?php echo $productdetails;?> </textarea>	<br>				
					<label> Photo: </label>
					<input type="file" name="productphoto" required><br><br>
					
                    <input class="btn btn-success" type="submit" name="productsubmit" value="Save Product"> <br><br>
					
					<a class="btn btn-danger" href="products.php">Back to Products</a>
					
                </form>
            </div>
           
		   
		   
        </div>
		
		
		
		
		
           
		    <?php
				include_once("database.php");
				

				 if(isset($_POST['productsubmit'])){
					 
					 $inStock = true;
					 if($_POST['productstock'] == 'yes')
                    {
                        $inStock = true;
                    }
                    else{
                        $inStock = false;
                    }
					$productid = $_POST['productid'];
					$productimage= $_FILES['productphoto']['name'];
					 
				$query = "update tblproducts set productName='{$_POST['productname']}' ,productPrice='{$_POST['productprice']}' ,productCode='{$_POST['productcode']}' ,productInStock='{$inStock}' ,productDiscount= '{$_POST['productdiscount']}',productSizes='{$_POST['productsizes']}' ,productDetails='{$_POST['productdetails']}' ,photo='{$productimage}' where productId={$productid}";
				
			    mysqli_query($mysqli, $query) or die(mysqli_error("Request failed."));
				
				$target= "files/".basename($productimage);
				 if(move_uploaded_file($_FILES['productphoto']['tmp_name'], $target )){

                            echo "Product updated successfully.<br><br>";

                        }else {

                            echo" Photo didn't uploaded";
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
