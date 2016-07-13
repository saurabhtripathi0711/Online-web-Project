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
<title>Online Shopping</title><link rel="icon" href="/images/icon.png" type="image/x-icon" />
<link rel="stylesheet" href="style/main.css" />
</head>

<body>
<div class=main_wrapper>

<img id=logo src="images/bkd.jpg">
</div>

</div>
<div id=menubar>
<ul>
<li><a href="index.php">Home</a> </li>
<li><a href="#">About Us</a> </li>
<li><a href="#">Services</a> </li>
<li><a href="#">Product</a> </li>
<li><a href="#"> Contact Us</a></li>
<div id=form>
<form method="get" action="result.php" enctype="multipart/form-data" />
	<input id=box type="text" name="user_query" placeholder="Search Services" />
	<input class="glyphicon glyphicon-search" id="btn" type="submit" name="search" value="Search" >
</ul>
</div>
</div>

<div class=content_wrapper>
<div id=content_area>
<?php addcart(); ?>
<div id=shopping_bar>
<span style="float:right;">
Welcome to Shopping</>
Item Price:<?php price();?>
Total Item:<?php total_items();?>
<a href="cart.php" style="color:white;">Go to cart</a>
</span>
</div>
	<div id=products_box>
	
	<?php getPro(); ?>
	<?php getCategoryPro();?>
	<?php getBrandPro ();?>
	
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
--></div>
</div>

<div id=footer>
<h2 style="text-align:center;padding-top:15px;">&copy; 2016 by www.onlineshop.com</h2>
</div>

</div>
</body>
</html>