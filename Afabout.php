<?php session_start();?>
<!DOCKTYPE html>
<html>

<head> <title> Welcome </title> 

<link rel="stylesheet" href="Afabout.css"/>
<script>
function sessn(){
	sessionStorage.clear();
}
</script>

</head>

<body>
<div class="Start">

 

<p>One of the trusted online shop in Bangladesh</p>
<h4>Contact with us +880-1677777777</h4>

</div>


<div class="head">


<marquee><p> Welcome to our shop <p></marquee>
<a href="Home.php" class="log" onclick="sessn()"> Logout </a>


</div>

<div class="nav">

<a href="Afterlogin.php" class="a"> Home </a>
<a href="MenClothing.php" class="a"> Men's Collection </a>
<a href="Women.php" class="a"> Women's Collection </a>
<a href="Watch.php" class="a"> Watch zone </a>
<a href="Gadgets.php" class="a"> Mobile Gadget </a>
<?php
if($_SESSION["type"]=="user"){
echo "<a href='AfMyActivity.php' class='a'>My Activity</a>";	
}
if($_SESSION["type"]=="admin"){
echo"<a href='AfAddProduct.php' class='a'>Add A Product</a>
     <a href='AfUserActivity.php' class='a'>Delete A User</a>";
}
?>


</div>

<div class="About">
<p><b>
It is the ultimate online shopping destination for Bangladesh offering completely hassle-free shopping experience through secure and trusted gateways. We offer you trendy and reliable shopping with all your favorite brands and more. Now shopping is easier, faster and always joyous. We help you make the right choice here.

It has been launched in February 2013. It is an initiative of the leading IT firm Splendor IT. PriyoShop showcases products from all categories such as clothing, footwear, jewellery, accessories, electronics, appliance, books, restaurants, health & beauty, and still counting! Our collection combines the latest in fashion trends as well as the all-time favorites. Our products are exclusively selected for you. We, at PriyoShop, have all that you need under one umbrella.

In tune with the vision Digital Bangladesh, PriyoShop.com opens the doorway for everybody to shop over the Internet. We constantly update with lot of new products, services and special offers. We provide on-time delivery of products and quick resolution of any concerns.

We provide our customers with memorable online shopping experience. Our dedicated PriyoShop quality assurance team works round the clock to personally make sure the right packages reach on time. You can choose whatever you like. We deliver it right at your address across Bangladesh. Our services are at your doorsteps all the time. Get the best products with the best online shopping experience every time. You will enjoy online shopping here!
</b></p>
</div>
<div class="footer">

<p><b>INFORMATION</b></p>
<a href="Afabout.php" class="ah">About us</a>


</div>

</body>

</html>