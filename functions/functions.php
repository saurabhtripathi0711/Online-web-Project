<?php
$con = mysqli_connect("localhost","root","","shopping");
//getting the category from db

if(mysqli_connect_errno()){
	echo "The connection was not established" .mysqli_connect_error;
}

// getting user ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
 
// creating a shopping cart
function addcart(){
	
	if(isset($_get['add_cart'])){
	global $con;
	
	$ip=getIp();
	$pro_id=$_GET['add_cart'];
	$check_pro="select* from cart where ip_add='$ip' AND product_id='$pro_id'";
	
	$run_check= mysqli_query($con, $check_pro);
	
	if(mysqli_num_rows($run_check)>0){
		
		echo"";
	}
		else{
	$insert_pro="insert into cart(product_id,ip_add) values('$pro_id','$ip')";
	$run_pro = mysqli_query($con , $insert_pro);
	echo "<script>window.open('index.php','_self')</script>";
}
}
}

// getting total items
function total_items(){
	if (isset($_GET['add_cart'])){
		
		global $con;
		$ip= getIp();
		
		$get_items = " select * from cart where ip_add =$ip";
			$run_items= mysqli_query($con,$get_items);
			$count_items=mysqli_num_rows($run_items);
	}
			else{
				global $con;
				$ip = 	getIp();
				$get_items = "select* from cart where ip_add= $ip";
				$run_items= mysqli_query($con,$get_items);
			$count_items=mysqli_num_rows($run_items);
				
				
			}
	}
	
// getting total price
	function price(){
	$total=0;
	global $con;
	$ip= getIp();
	$sel_price= "select* from cart where ip_add='$ip'";
	$run_price =mysqli_query($con, $sel_price);
	
	while($product_price= mysqli_fetch_array($run_price)){
	
		$pro_id = $product_price['product_id'];
		$pro_price= "select* from products where product_id='$pro_id'";
		
		$run_pro_price= mysqli_query($con,$pro_price);
		
		while($pp_price= mysqli_fetch_array($run_pro_price)){
			
			$product_price=array($pp_price['product_price']);
			$values= array_sum($product_price);
			
			$total +=$values;
		}
	
	}
	echo"Rs.". $total;
	
}

// getting categories
function getcats(){
	global $con;
	$get_categories= "select * from categories";
	$run_categories= mysqli_query($con, $get_categories);
	
	while($row_cats=mysqli_fetch_array($run_categories)){
		
		$category_id= $row_cats['category_id'];
		$category_title= $row_cats['category_title'];
		
	echo"<li><a href='index.php?cat=$category_id'>$category_title</a></li>";
	
}
}
//getting brands from db
function getbrands(){
	global $con;
	$get_brands= "select * from brands";
	$run_brand= mysqli_query($con, $get_brands);
	
	while($row_brand=mysqli_fetch_array($run_brand)){
		
		$brand_id= $row_brand['brand_id'];
		$brand_title= $row_brand['brand_title'];
		
	echo"<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}

function getPro(){
	if(!isset($_GET['category'])){
		if(!isset($_GET['brand'])){
			
	global $con;
		
		$get_pro= "select* from products order by RAND(), LIMIT,0,10";
		
		$run_pro=mysqli_query($con,$get_pro);
		while($row_pro= mysqli_fetch_array($run_pro)){
			
			$pro_id= $row_pro['product_id'];
			$pro_category= $row_pro['product_category'];
			$pro_brand= $row_pro['product_brand'];
			$pro_title= $row_pro['product_title'];
			$pro_price= $row_pro['product_price'];
			$pro_image= $row_pro['product_image'];
			
			echo"
					<div id-=single_product>
				<h3>$pro_title</h3>
				<img src='admin/product_image/$pro_image' width='120' height='120'/>
				<p><b>Rs. $pro_price</b></p>
				<a href='details.php?pro_id=$pro_id' style='float:left;'>Details...</a>			
				<a href ='index.php?pro_id=$pro_id'><button style='float:right;'>Add to Cart</button></a>
	</div>
			
			
			
			
			";
			
		}
	
		}
	}
}


function getCategoryPro(){
	if(isset($_GET['category'])){
		
		$category_id=$_GET['category'];	
	global $con;
		
		$get_category_pro= "select from products where product_category'$category_id'";
		
		$run_category_pro=mysqli_query($con,$get_category_pro);
		
		$count_category= mysqli_num_rows($run_category_pro);
		
		if ($count_category==0){
			echo"<h2 style='padding:20px;'>No Products were found in this category</h2>";
		}
		
		while($row_category_pro= mysqli_fetch_array($run_category_pro)){
			
			$pro_id= $row_category_pro['product_id'];
			$pro_category= $row_category_pro['product_category'];
			$pro_brand= $row_category_pro['product_brand'];
			$pro_title= $row_category_pro['product_title'];
			$pro_price= $row_category_pro['product_price'];
			$pro_image= $row_category_pro['product_image'];
			
			echo"
					<div id-=single_product>
				<h3>$pro_title</h3>
				<img src='admin/product_image/$pro_image' width='120' height='120'/>
				<p><b>Rs. $pro_price</b></p>
				<a href='details.php?pro_id=$pro_id' style='float:left;'>Details...</a>			
				<a href ='index.php?pro_id=$pro_id'><button style='float:right;'>Add to Cart</button></a>
	</div>
			
			
			
			
			";
			
		}
	
		}
	}
	
	function getBrandPro(){
	if(isset($_GET['brand'])){
		
		$brand_id=$_GET['brand'];	
	global $con;
		
		$get_brand_pro= "select from products where product_brand'$brand_id'";
		
		$run_brand_pro=mysqli_query($con,$get_brand_pro);
		
		$count_brand= mysqli_num_rows($run_brand_pro);
		
		if ($count_brand==0){
			echo"<h2 style='padding:20px;'>No Products were found of this brand</h2>";
		}
		
		while($row_brand_pro= mysqli_fetch_array($run_brand_pro)){
			
			$pro_id= $row_brand_pro['product_id'];
			$pro_category= $row_brand_pro['product_category'];
			$pro_brand= $row_brand_pro['product_brand'];
			$pro_title= $row_brand_pro['product_title'];
			$pro_price= $row_brand_pro['product_price'];
			$pro_image= $row_brand_pro['product_image'];
			
			echo"
					<div id-=single_product>
				<h3>$pro_title</h3>
				<img src='admin/product_image/$pro_image' width='120' height='120'/>
				<p><b>Rs. $pro_price</b></p>
				<a href='details.php?pro_id=$pro_id' style='float:left;'>Details...</a>			
				<a href ='index.php?pro_id=$pro_id'><button style='float:right;'>Add to Cart</button></a>
	</div>
			
			
			
			
			";
			
		}
	
		}
	}




?>