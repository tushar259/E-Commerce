<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<script>
function edit(e){
	var m1=e.getAttribute('id');
	var m2=e.getAttribute('name');
	var m3="";
	var m4="";
	var m6=null;
	if(m2=="name"){
		m3="name";
		m4="text";
		m6=document.getElementById('namevalue').value;
	}
	else if(m2=="price"){
		m3="price";
		m4="intp"
		m6=document.getElementById('pricevalue').value;
	}
	else if(m2=="quantity"){
		m3="quantity";
		m4="intq"
		m6=document.getElementById('quantityvalue').value;
	}
	if(m6.length==0){
		alert("you need to insert a value");
	}
	else{
	var url="";
	var  xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
            alert(m2+" Changed !");		
			window.location.reload();
			
		}
	};
	var url="updateproduct.php?pid="+m1+"&name="+m3+"&"+m4+"="+m6;
	
	xmlhttp.open("GET", url,true);
	xmlhttp.send();
	}
}
</script>
<style>
img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>
</head>
<body>

<?php 
    if(isset($_GET["pid"])&&strlen($_GET["pid"])>0){
	    require("DatabaseQuery.php");
		$s="select * from photo";
		$jsn=getJSONFromDB($s);
		$jd=json_decode($jsn,true);
		foreach($jd as $v){
			if($_GET["pid"]==$v["pid"]){
			    $f=$v["folder"];
			    $n=$v["name"];
			    $i=$v["pid"];
			    $q=$v["quantity"];
			    $pr=$v["price"];
			    echo"<img src='$f' style='width:50%;'><br>
			    
	            <span style='text-align:center'>Product Name: $n</span><br>";?> <?php if(isset($_SESSION["type"])&&$_SESSION["type"]=="admin"){ echo "<input type='text' id='namevalue' name='name'> <input type='button' id='$i' name='name' onclick='edit(this)' value='Edit Name'><br><br>";}?>
                <?php echo "<br><span style='text-align:center'>Product ID: $i</span><br>";
		        echo "<br><span style='text-align:center'>Product Price: $pr</span><br>";?> <?php if(isset($_SESSION["type"])&&$_SESSION["type"]=="admin"){ echo "<input type='text' id='pricevalue' name='price'> <input type='button' id='$i' name='price' onclick='edit(this)' value='Edit Price'><br><br>";}?>
                <?php echo "<br><span style='text-align:center'>Product Quantity: $q</span><br>";?> <?php if(isset($_SESSION["type"])&&$_SESSION["type"]=="admin"){ echo "<input type='text' id='quantityvalue' name='quantity'> <input type='button' id='$i' name='quantity' onclick='edit(this)' value='Edit Quantity'><br><br>";}?><?php
			}
		}
		
    }
?>
</body>
</html>