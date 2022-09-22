<?php
if(isset($_GET["confirmpassword"]) && strlen($_GET["confirmpassword"])>0){
    require("DatabaseQuery.php");
    $sq="select * from login";
	//echo $sq;
	$a=getDataFromDB($sq);
	foreach($a as $v){
		if($v["confirmpassword"]==$_GET["confirmpassword"]){
			echo "Password didn't match";
			exit;
		}
	}
    echo " ";
	
}
?>