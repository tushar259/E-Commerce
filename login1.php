<?php session_start();
	
    if(isset($_POST["name"]) && isset($_POST["pass"])){
		$s="select * from login where email='".$_POST["name"]."'";
		$mail=$_POST["name"];
		$parts = explode('.', $mail);
        $namePart = $parts[0];
        //echo $_COOKIE[$namePart."_com"];
		if(isset($_COOKIE[$namePart."_com"])){
			$cookmail=$_COOKIE[$namePart."_com"];
			$temptype=$namePart."_com".$cookmail;
			$cooktype=$_COOKIE[$temptype];
			if($cookmail==md5($_POST["pass"])){
				$_SESSION["email"]=$_POST["name"];
				$_SESSION["type"]=$cooktype;
				header("Location:Afterlogin.php");
			}
			else{
				echo "<script type='text/javascript'>alert('invalid user or password');</script>";
				$e="error";
		        echo "<script type='text/javascript'>window.location.href='login.php';</script>";
		        
			}
		}
		else if(!isset($cookmail)){
		require("DatabaseQuery.php");	
	    $jsn=getJSONFromDB($s);
		$jd=json_decode($jsn,true);
		$p=md5($_POST["pass"]);
		foreach($jd as $v){
			//if($v["email"]==$_POST["name"]&&$v["password"]==$p&&$v["confirmpassword"]==$p){
				$v1=$v["email"];
				$_SESSION["email"]="";
				$_SESSION["type"]="";
				$_SESSION["email"]=$v1;
				$_SESSION["type"]=$v["type"];
				$t=$v["type"];
				setcookie($v1,$p,time()+5000);
				setcookie($v1."".$p,$t,time()+5000);
				header("Location:Afterlogin.php?un=$v1");//?un=$v1");
				//header("Location:Afterlogin.html?pass=clean($v['password'])");
				exit;
			//}
	        //echo $v["name"]." from ".$v["dept"]." with CGPA : ".$v["cgpa"];
	        //echo "<br>";
			
        }
		
		echo "<script type='text/javascript'>alert('invalid user or password');</script>";
	    //javascript:history.go(-1);
		echo "<script type='text/javascript'>window.location.href='login.php';</script>";
		//echo "<script type='text/javascript'>alert('invalid user or password');</script>";
		}
    }
?>