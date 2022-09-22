<?php

if(strlen($_POST["name"])>0 && strlen($_POST["email"])>0 && strpos($_POST["email"],"@")>2 && strpos($_POST["email"],".com")>strpos($_POST["email"],"@") && strlen($_POST["date"])>0 && strlen($_POST["gender"])>0 && strlen($_POST["pass"])>0 && strlen($_POST["conpass"])>0 && $_POST["pass"]==$_POST["conpass"])
{
	
	
	// $file=fopen("datalog.txt","a") or die("Unable");

	// fwrite($file,$_POST["name"]);

	// fwrite($file," ".$_POST["email"]);

	// fwrite($file," ".$_POST["date"]);

	// fwrite($file," ".$_POST["gender"]);

	// fwrite($file," ".md5(($_POST["pass"])));

	// fwrite($file," ".($_POST["conpass"]));

	// fwrite($file,"\r\n");
	
		require("DatabaseQuery.php");
		$p=md5($_POST["pass"]);
		$cp=md5($_POST["conpass"]);
	    $s="insert into login values('".$_POST["name"]."','".$_POST["email"]."','".$_REQUEST["date"]."','".$_REQUEST["gender"]."','".$p."','".$cp."','user')";
	    if(updateSQL($s)){
	        header("Location:Home.php");
	    }
		else{
			echo "error";
		}
}
else
{
	if(strlen($_POST["name"])==0)
	echo "Name text box is empty <br>";
	if(strlen($_POST["email"])==0)
	echo "Email text box is empty<br>";
	if(strlen($_POST["date"])==0)
	echo "Date text box is empty<br>";
	if(strpos($_POST["email"],"@")<2)
	echo "@ must be after 2 character <br>";
	if(strpos($_POST["email"],".com")<strpos($_POST["email"],"@"))
	echo ".com must be after @ <br>";
	if(strlen($_POST["pass"])==0)
	echo "Password text box is empty <br>";
	if(strlen($_POST["conpass"])==0)
	echo "Confirm Password text box is empty <br>";
	if($_POST["pass"]!=$_POST["conpass"])
	echo "Password and Confirm Password must be same. <br>";

}

?>





