<?php session_start();?>
<!DOCKTYPE html>

<html>

<head> <title> Welcome </title> 

<link rel="stylesheet" href="Afterlogin.css"/>
<script>
function sessn(){
	//session_destroy();
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
<a href="AfMenClothing.php" class="a"> Men's Collection </a>
<a href="AfWomen.php" class="a"> Women's Collection </a>
<a href="AfWatch.php" class="a"> Watch Zone </a>
<a href="AfGadgets.php" class="a"> Mobile Gadget </a>
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

<img src="clothes.jpg" title="fasion" height="400" width="1525" class="img">

<div class="footer">

<p><b>INFORMATION</b></p>
<a href="Afabout.php" class="ah">About us</a>
<br>
<br>

</div>

</body>

</html>
