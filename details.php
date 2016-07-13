<!DOCTYPE HTML>
<?php 
include ("functions/functions.php");
?>
<html>
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>Online Shopping</title>
<link rel="stylesheet" href="style/main.css" />
</head>

<body>
<div class=main_wrapper>

<img id=logo src="images/bkd.jpg">
</div>

</div>
<div id=menubar>
<ul>
<li><a href="#">Home</a> </li>
<li><a href="#">About Us</a> </li>
<li><a href="#">Services</a> </li>
<li><a href="#">Product</a> </li>
<li><a href="#"> Contact Us</a></li>
<div id=form>
<form method="get" action="results.php" enctype="multipart/form-data" />
	<input id=box type="text" name="user_query" placeholder="Search Services" />
	<input class="glyphicon glyphicon-search" id="btn" type="submit" name="search" value="Search" >
</ul>
</div>
</div>

<div class=content_wrapper>
<div id=content_area>

<div id=shopping_bar>
<span style="float:right;">
Welcome to Shopping</>
Item Price:</>
Total Item:</>
<a href="cart.php" style="color:white;">Go to cart</a>
</span>
</div>
	<div id=products_box>
	<?php
	
	if (isset ($_GET['pro_id'])){
		
		$product_id= $_GET['pro_id'];
	$get_pro= "select* from products where product_id='$product_id'";
		
		$run_pro=mysqli_query($con,$get_pro);
		while($row_pro= mysqli_fetch_array($run_pro)){
			
			$pro_id= $run_pro['product_id'];
			$pro_title= $run_pro['product_title'];
			$pro_price= $run_pro['product_price'];
			$pro_image= $run_pro['product_image'];
			$pro_desc= $run_pro['product_desc'];
			echo"
					<div id-=single_product>
				<h3>$pro_title</h3>
				<img src='admin/product_image/$pro_image' width='400' height='300'/>
				<p><b>Rs. $pro_price</b></p>
				<p>$pro_desc </p>
				<a href='index.php' style='float:left;'>Go Back</a>			
				<a href ='index.php?pro_id=$pro_id'><button style='float:right;'>Add to Cart</button></a>
	</div>	";
			
		}
		}
	?>
	
	
	</div>
	

</div>
<div class=sidebar>
<div id="sidebar_title">Categories</div>
<ul id=cats>
<?php getcats(); ?></ul>

<div id="sidebar_title">Brands</div>

<ul id=cats>
<?php getbrands(); ?></ul>

<!--
<li><a href="#">Laptop</a> </li>
<li><a href="#">Mobile</a> </li>
<li><a href="#">Computer</a> </li>
<li><a href="#">Camera</a> </li>
</ul>
</div>
-->


</div>
</div>

<div id=footer>
<h2 style="text-align:center;padding-top:15px;">&copy; 2016 by www.onlineshop.com</h2>
</div>

</div>

</body>
</html>