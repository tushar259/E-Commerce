<?php session_start();?>
<!DOCKTYPE html>

<html>

<head> <title> Welcome </title> 
<?php
    require("jquery.php");
?>
<script type="text/javascript">
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
function add(e){
	var q=e.getAttribute('id');
	var qn=q+"qt";
	var qnt=document.getElementById(qn).value;
	if(document.getElementById(qn).value.length==0){
		alert("you must type quantity");
	}
	else{
	
	var m1=e.getAttribute('id');
	//document.getElementById("productsx").innerHTML=m1;
	var  xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
			var m=document.getElementById("productsx");
			m.innerHTML=xmlhttp.responseText;
			//m.innerHTML="done";//e.getAttribute("id");
			//document.getElementById("spinner").style.visibility="hidden";
			//alert(xmlhttp.responseText);
			
		}
	};
	var url="server.php?pid="+q+"&quantity="+qnt;
	xmlhttp.open("GET", url,true);
	xmlhttp.send();
	}
}
function delet(e){
	var m1=e.getAttribute('id');
	var m2=e.getAttribute('src');
	var  xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
            alert("product removed !");		
			window.location.reload();
			
		}
	};
	var url="deleteproduct.php?pid="+m1+"&src="+m2;
	xmlhttp.open("GET", url,true);
	xmlhttp.send();
}
function buyprod(){
	//alert("You need to Add product in your cart");
	var m="buy";
	var  xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
			var m=document.getElementById("productsx");
			m.innerHTML=xmlhttp.responseText;
			//m.innerHTML="done";//e.getAttribute("id");
			//document.getElementById("spinner").style.visibility="hidden";
			//alert(xmlhttp.responseText);
			//alert("Thank you for buying our product.");
		}
	};
	var url="load.php?buy="+m;
	xmlhttp.open("GET", url,true);
	xmlhttp.send();
}
function remv(e){
	//alert("Removed from cart !");
	var m1=e.getAttribute('id');
	var m2=e.getAttribute('name');
	var m="remove";
	var  xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
			var m=document.getElementById("productsx");
			m.innerHTML=xmlhttp.responseText;
			//m.innerHTML="done";//e.getAttribute("id");
			//document.getElementById("spinner").style.visibility="hidden";
			//alert(xmlhttp.responseText);
			
		}
	};
	var url="load.php?remove="+m+"&pid="+m1+"&seq="+m2;
	xmlhttp.open("GET", url,true);
	xmlhttp.send();
}
function load(){
	var m="load";
	var  xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
			var m=document.getElementById("productsx");
			m.innerHTML=xmlhttp.responseText;
			//m.innerHTML="done";//e.getAttribute("id");
			//document.getElementById("spinner").style.visibility="hidden";
			//alert(xmlhttp.responseText);
			
		}
	};
	var url="load.php?load="+m;
	xmlhttp.open("GET", url,true);
	xmlhttp.send();
}
</script>

<link rel="stylesheet" href="AfMenClothing.css"/>

</head>

<body>
<div class="Start">

 

<p>One of the trusted online shop in Bangladesh</p>
<h4>Contact with us +880-1677777777</h4>

</div>


<div class="head">
<marquee><p> Welcome to our shop <p></marquee>
<a href="Home.php" class="log"> Logout </a>
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
<br><br><br><br>
<p id="products">
    <?php
	    echo "<form name='addcartform'>";
	    require("DatabaseQuery.php");
		$mn="men";
		$s="select * from photo where type='".$mn."'";
		$jsn=getJSONFromDB($s);
		$jd=json_decode($jsn,true);
		foreach($jd as $v){?>
		    price: <?php echo $v["price"]; ?> <br>
			<img class="imag" src="<?php echo $v["folder"]; ?>" title="fasion" height="400" width="300" id="<?php echo $v["pid"];?>" name="<?php echo $v["pid"];?>">
			<?php
			if($_SESSION["type"]=="user"){?>
			Quantity: <input type="text" id="<?php $tmp=$v["pid"]; $tmp1=$tmp."qt";  echo $tmp1;?>" name="<?php echo $v["pid"];?>"> <input type="button" onclick="add(this)" value="Add to cart" id="<?php echo $v["pid"];?>" name="<?php echo $v["pid"];?>"> 
			<?php }?>
			<?php
			if($_SESSION["type"]=="admin"){?>
			    <input type="button" onclick="delet(this)" value="Delete" id="<?php echo $v["pid"];?>"> 
			<?php
			}?>
			<br>
			<?php
		}
		echo"</form>";
		
	?>
</p>
<?php
if($_SESSION["type"]=="user"){
echo "<pre>                                              
                                                   
		                             <strong>CART</strong>
<strong>Products</strong> 
-------------
<p id='productsx'></p>
                                             <input type='button' onclick='buyprod()' value='Buy'> <input type='button' onclick='load()' value='Show Cart'><br>							   
</pre>";
}
?>
<div class="footer">

<p><b>INFORMATION</b></p>
<a href="Afabout.php" class="ah">About us</a>

</div>

</body>

</html>
