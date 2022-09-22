<?php session_start();
    if(isset($_SESSION["type"])){
    if(isset($_POST["dropdown"])&&strlen($_POST["dropdown"])>0){
		require("DatabaseQuery.php");
		$s="select * from login where email='".$_POST["dropdown"]."'";
		$temp="";
	    $jsn=getJSONFromDB($s);
		$jd=json_decode($jsn,true);
		foreach($jd as $v){
			$temp=$v["type"];
		}
		if($temp=="user"){
		    $e=$_POST["dropdown"];
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
            $sql = "DELETE FROM login WHERE email='".$e."'";

            if (mysqli_query($conn, $sql)) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . mysqli_error($conn);
            }

            mysqli_close($conn);
		}
		else if($temp=="admin"){
			echo "Admin can not be deleted!";
		}
	}
	}
	else{
		echo "You Need to login first";
	}
	// echo "<pre>";
	// print_r($GLOBALS);
	// echo "</pre>";
?>