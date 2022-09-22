<?php session_start();?>
<!DOCTYPE html>
<html>
<body>
<?php
require("DatabaseQuery.php");
if(isset($_GET["pid"]) && isset($_GET["quantity"]) && strlen($_GET["pid"])>0 && strlen($_GET["quantity"])>0){
	$dbquantity=0;
	$pid=0;
	$sq="select * from photo where pid=".$_GET["pid"]."";
	$email=$_SESSION["email"];
	$quantity=$_GET["quantity"];
	$a=getDataFromDB($sq);
	foreach($a as $v){
		if($v["quantity"]>=$_GET["quantity"]){
		    //echo $v["name"];
			$pid=$v["pid"];
			$name=$v["name"];
			$folder=$v["folder"];
			$price=$v["price"];
			$dbquantity=$v["quantity"];
			$s="insert into cart values(null,'".$email."',".$pid.",'".$name."','".$folder."',".$price.",".$quantity.")";
			updateSQL($s);
			$dbquantity-=$quantity;
	        $s2="UPDATE photo SET quantity=".$dbquantity." WHERE pid=".$pid;
	        updateSQL($s2);
		}
		else{
			echo "The amount of this product is not available now !";
		}
	}
	$s1="select * from cart where email='".$_SESSION["email"]."'";
	$jsn=getJSONFromDB($s1);
	$jd=json_decode($jsn,true);
	foreach($jd as $v){
		$cemail=$_SESSION["email"];
		$cseq=$v["seq"];
		$cpid=$v["pid"];
		$cname=$v["name"];
		$cfolder=$v["folder"];
		$cprice=$v["price"];
		$cquantity=$v["quantity"];
		echo "<pre>";?>
		<img src="<?php echo $cfolder;?>" id="<?php echo $cpid;?>" name="<?php echo $cpid;?>" height="40" width="30"><?php echo"Name: ".$cname."   Price: ".$cprice."   Quantity: ".$cquantity."   ";?><a onclick="remv(this)" id="<?php echo $cpid;?>" name="<?php echo $cseq;?>">Remove</a><br>
	<?php echo "</pre>";
	}
	//echo "Hello : ".$_REQUEST["uname"];
}
?>
</body>
</html>