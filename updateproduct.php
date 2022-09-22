<?php session_start();
    require("DatabaseQuery.php");
	if(isset($_GET["pid"])&&isset($_GET["name"])&&isset($_GET["intp"])&&strlen($_GET["pid"])>0&&strlen($_GET["name"])>0&&strlen($_GET["intp"])>0){
		$s2="UPDATE photo SET price=".$_GET["intp"]." WHERE pid=".$_GET["pid"];
	    updateSQL($s2);
	}
	if(isset($_GET["pid"])&&isset($_GET["name"])&&isset($_GET["text"])&&strlen($_GET["pid"])>0&&strlen($_GET["name"])>0&&strlen($_GET["text"])>0){
		$s2="UPDATE photo SET name='".$_GET["text"]."' WHERE pid=".$_GET["pid"];
	    updateSQL($s2);
	}
	if(isset($_GET["pid"])&&isset($_GET["name"])&&isset($_GET["intq"])&&strlen($_GET["pid"])>0&&strlen($_GET["name"])>0&&strlen($_GET["intq"])>0){
		$s2="UPDATE photo SET quantity=".$_GET["intq"]." WHERE pid=".$_GET["pid"];
	    updateSQL($s2);
	}
?>