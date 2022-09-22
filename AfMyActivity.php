<?php session_start();?>
<!DOCKTYPE html>

<html>

<head> <title> Add Product </title> 
<script>
function validate(){
	flag=true;
	alert(document.mfm.fileToUpload.value);
	//alert(document.mfm.fileToUpload.value);
	if(document.mfm.fileToUpload.value.length==0){
		alert("you must choose file");
		flag=false;
	}
	if(document.getElementById('uName').value.length==0){
		alert("you must type anything");
		flag=false;
	}
	if(document.getElementById('price').value.length==0){
		alert("you must type anything");
		flag=false;
	}
	if(document.getElementById('qnty').value.length==0){
		alert("you must type anything");
		flag=false;
	}
	return flag;
}

function sessn(){
	sessionStorage.clear();
}

</script>
<link rel="stylesheet" href="AfMenClothing.css"/>

</head>

<body>


<div class="head">
<marquee><p><p></marquee>
<a href="Home.php" class="log" onclick="sessn()"> Logout </a>
</div>

<div class="nav">

<a href="Afterlogin.php" class="a"> Home </a>
<a href="AfMenClothing.php" class="a"> Men's Collection </a>
<a href="AfWomen.php" class="a"> Women's Collection </a>
<a href="AfWatch.php" class="a"> Watch zone </a>
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
<br><br><br><br><br><br><br>
<fieldset>
<legend>Products are bought:</legend>
<?php
    if(isset($_SESSION["type"])&&$_SESSION["type"]=="user"){
		$s="select * from buy where email='".$_SESSION["email"]."'";
        require("DatabaseQuery.php");
        $jsn=getJSONFromDB($s);
        $jd=json_decode($jsn,true);
	    foreach($jd as $v){
			$cemail=$_SESSION["email"];
			$cseq=$v["seq"];
		    $cpid=$v["pid"];
		    $cname=$v["name"];
		    $cfolder=$v["folder"];
		    $cprice=$v["price"];
		    $cquantity=$v["quantity"];
		    echo "<pre>";?>
	        <img src="<?php echo $cfolder;?>" id="<?php echo $cpid;?>" name="<?php echo $cpid;?>" height="40" width="30"><?php echo"Name: ".$cname."   Price: ".$cprice."   Quantity: ".$cquantity."   ";?><br>
	      <?php echo "</pre>";
		}
	}
?>
</pre>
</fieldset>


</body>

</html>