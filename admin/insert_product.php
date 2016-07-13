<!DOCTYPE HTML>
<?php 
include ("includes/db.php");
?>
<html>
<head>
<title> Insert Products</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
<form action="insert_product.php" method="post" enctype="multipart/form-data">
<table align="center" width="700" bgcolor="#FFFFCC" border="1.5">
<tr>
<td colspan="8" align="center"><h1><strong> Insert Product Form</strong></h1>
</td>
</tr>

<tr align="center">
<td><b>Product Title</b></td>
<td><input type="text" name="product_title" placeholder="Eneter Product Title" required/></td>
</tr>

<tr align="center">
<td><b>Product Category</b></td>
<td>
	<select name="product_category"/>
	<option>Select Category</option>
	<?php
	$get_categories= "select * from categories";
	$run_categories= mysqli_query($con, $get_categories);
	
	while($row_cats=mysqli_fetch_array($run_categories)){
		
		$category_id= $row_cats['category_id'];
		$category_title= $row_cats['category_title'];
		
	echo"<option value='category_id'>$category_title</option>";
	
	}
	?>
	</select>
</td>
</tr>

<tr align="center">
<td><b>Product Brand</b></td>
<td><select name="product_brand"/>
<option>Select Brand</option>
<?php
$get_brands= "select * from brands";
	$run_brand= mysqli_query($con, $get_brands);
	
	while($row_brand=mysqli_fetch_array($run_brand)){
		
		$brand_id= $row_brand['brand_id'];
		$brand_title= $row_brand['brand_title'];
		
	echo"<option value='brand_id'>$brand_title</option>";
	}
?>
</select>
</td>
</tr>

<tr align="center">
<td><b>Product Image</b></td>
<td><input type="file" name="product_image" placeholder="" optional/></td>
</tr>

<tr align="center">
<td><b>Product Description</b></td>
<td><textarea  name="product_desc" placeholder="Eneter Product Description" /></textarea>
</tr>

<tr align="center">
<td><b>Product Price</b></td>
<td><input type="text" name="product_price" placeholder="Enter Price" required/></td>
</tr>

<tr align="center">
<td><b>Product Keywords</b></td>
<td><input type="text" name="product_keyword" placeholder="Enter Keywords" optional/></td>
</tr>

<tr >
<td colspan="8" align="center">
<input type="submit" name="insert_post" value="Insert Now"></td>
</tr>


</table>
</form>

</body>
</html>

<?php

if(isset($_POST['insert_post'])){
	//getting data from db
	$product_category= $_POST['product_category'];
	$product_brand=$_POST['product_brand'];
	$product_title= $_POST['product_title'];
	$product_desc=$_POST['product_desc'];
	$product_price=$_POST['product_price'];
	$product_keyword=$_POST['product_keyword'];
	
	//getting images and videos db
	$product_image=$_FILES['product_image'];
	$product_image_tmp=$_FILES['product_image']['tmp_name'];
	$ext_type = array('gif','jpg','jpeg','png');
	move_uploaded_file ($product_image_tmp,"product_image/$product_image");
	//name used in dbtable
	 $insert_product="Insert into products (product_category,products_brand,product_title,product_desc,product_image,product_price,product_keyword)
	value('$product_category','$product_brand','$product_title','$product_desc','$product_image','$product_price' ,'$product_keyword')";
	
	$insert_pro= mysqli_query($con, $insert_product);
	
	if($insert_pro) {
		
		echo"<script>alert('Product Inserted')</script>";
		echo"<script>window.open('insert_product.php','_self')</script>";
	}
	
}

?>