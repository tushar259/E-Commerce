<?php
$xml=simplexml_load_file("login.xml") or die("Error");
$a=array();
foreach($xml->user as $u)
{
	$a[(string)$u->name]=(string)$u->pass;
}
		$s=$_REQUEST["name"];
	    $p=$_REQUEST["pass"];
		if(isset($a[$s])&&$a[$s]==$p)
		{
			header("Location:Afterlogin.html");
		}
		else
		{
			echo "Wrong";
		}
		
?>