<?php session_start();?>
<!DOCTYPE html>
<html>
<body>
<?php
    if(isset($_GET["load"])&&$_GET["load"]=="load"){
        $s="select * from cart where email='".$_SESSION["email"]."'";
        require("DatabaseQuery.php");
        $jsn=getJSONFromDB($s);
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
	}
	if(isset($_GET["remove"])&&strlen($_GET["remove"])>0&&isset($_GET["pid"])&&strlen($_GET["pid"])>0&&isset($_GET["seq"])&&strlen($_GET["seq"])>0){
		$e=$_GET["seq"];
		
		$s1="select * from cart where seq=".$e;
        require("DatabaseQuery.php");
		$cartquantity=0;
        $jsn1=getJSONFromDB($s1);
        $jd1=json_decode($jsn1,true);
	    foreach($jd1 as $v1){
			$seq=$v1["seq"];
		    $pid=$v1["pid"];
		    $name=$v1["name"];
		    $folder=$v1["folder"];
		    $price=$v1["price"];
		    $cartquantity+=$v1["quantity"];
		}
		
		
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "webtech";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // sql to delete a record
        $sql = "DELETE FROM cart WHERE seq=".$e;

        if (mysqli_query($conn, $sql)) {
            
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
			exit;
        }

        mysqli_close($conn);
		
		
		$s1="select * from photo where pid=".$_GET["pid"];
		$prodquantity=0;
		$pid=0;
        $jsn1=getJSONFromDB($s1);
        $jd1=json_decode($jsn1,true);
	    foreach($jd1 as $v1){
		    $pid=$v1["pid"];
		    $name=$v1["name"];
		    $folder=$v1["folder"];
		    $price=$v1["price"];
		    $prodquantity+=$v1["quantity"];
		}
		$prodquantity+=$cartquantity;
		$s2="UPDATE photo SET quantity=".$prodquantity." WHERE pid=".$pid;
	    updateSQL($s2);
	}
	if(isset($_GET["buy"])&&strlen($_GET["buy"])>0){
		$s1="select * from cart where email='".$_SESSION["email"]."'";
        require("DatabaseQuery.php");
		$cartquantity=0;
        $jsn1=getJSONFromDB($s1);
        $jd1=json_decode($jsn1,true);
	    foreach($jd1 as $v1){
			$seq=$v1["seq"];
		    $pid=$v1["pid"];
		    $name=$v1["name"];
		    $folder=$v1["folder"];
		    $price=$v1["price"];
		    $cartquantity=$v1["quantity"];
		}
		if($cartquantity<1||$cartquantity==null){
			echo "<script type='text/javascript'>alert('You need to select a product !');</script>";
		}
		else{
			
			$s4="select * from cart where email='".$_SESSION["email"]."'";
			$email4=$_SESSION["email"];
			$jsn4=getJSONFromDB($s4);
            $jd4=json_decode($jsn4,true);
	        foreach($jd4 as $v4){
			    $seq4=$v4["seq"];
		        $pid4=$v4["pid"];
		        $name4=$v4["name"];
		        $folder4=$v4["folder"];
		        $price4=$v4["price"];
		        $quantity4=$v4["quantity"];
				
				$s5="insert into buy values(".$seq4.",'".$email4."',".$pid4.",'".$name4."','".$folder4."',".$price4.",".$quantity4.")";
				updateSQL($s5);
		    }
			
			
			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "webtech";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // sql to delete a record
            $sql = "DELETE FROM cart WHERE email='".$_SESSION["email"]."'";

            if (mysqli_query($conn, $sql)) {
                
            } else {
                echo "Error deleting record: " . mysqli_error($conn);
            }

            mysqli_close($conn);
			
			echo "Thank you for buying our product.";
		}
	}
?>
</body>
</html>