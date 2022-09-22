<?php
if(isset($_GET["email"]) && strlen($_GET["email"])>0){
    require("DatabaseQuery.php");
    $sq="select * from login";
	//echo $sq;
	$a=getDataFromDB($sq);
	foreach($a as $v){
		if($v["email"]==$_GET["email"]){
			echo "Not Available";
			exit;
		}
	}
    echo "Available";
	
}
?>