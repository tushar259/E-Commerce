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
</script>
<link rel="stylesheet" href="AfMenClothing.css"/>

</head>

<body>


<div class="head">
<marquee><p><p></marquee>
<a href="Home.php" class="log"> Logout </a>
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
echo"<pre>


<form action='upload.php' method='post' enctype='multipart/form-data' name='mfm'><pre>
                              <br><br>
	                     <strong>Add new product</strong>
							
		Product Name(Character/String):   <input type='text' name='uName' id='uName'><br>
		Product Price(Number/Integer): 	  <input type='text' name='price' id='price'><br>
		Product Quantity(Number/Integer): <input type='text' name='qnty' id='qnty'><br>
		Product Type:                     <select id='dropdown' name='dropdown'>   <option value='men'>Men cloths</option>
                                 <option value='women'>Women cloths</option>
                                 <option value='watch'>Watch zone</option>
                                 <option value='mobilegadget'>Mobile Gadget</option>
                                 </select><br>
		Product Picture :                 <input type='file' name='fileToUpload' id='file'><br>
		                                  <input type='submit' value='Upload File' onclick='return validate();' name='submit'></pre><br><br>
</form>";
}
?>
</pre>


</body>

</html>
