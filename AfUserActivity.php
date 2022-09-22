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
if($_SESSION["type"]=="admin"){
echo"<a href='AfAddProduct.php' class='a'>Add A Product</a>
     <a href='AfUserActivity.php' class='a'>Delete A User</a>";
}
?>


</div>
<?php
if($_SESSION["type"]=="admin"){
	require("DatabaseQuery.php");
	$s="select * from login";
	$jsn=getJSONFromDB($s);
	$jd=json_decode($jsn,true);
	echo "<pre>
             <form action='deleteuser.php' method='post' name='deltform'>
                <fieldset>
                    <legend id='dropdown' name='dropdown'>Delete A User:</legend>
                    Email: <select id='dropdown' name='dropdown'>";	
	foreach($jd as $v){
		$e=$v["email"];
        echo"<option value='$e'>$e</option>";
	}
                              echo"</select><br>
				    <input type='submit' value='Delete User'>
                </fieldset>
            </form>";	

}
?>
</pre>


</body>

</html>
