<?php
   if(isset($_GET["pid"])&&isset($_GET["src"])&&strlen($_GET["pid"])>0&&strlen($_GET["src"])>0){
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
        $e=$_GET["pid"];
        // sql to delete a record
        $sql = "DELETE FROM photo WHERE pid='".$e."'";

        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
		
		if (isset($_GET["src"])){
            $photoname = $_GET["src"];
            if (unlink($photoname)){
                echo ("Deleted $photoname");
            }
            else{
                echo ("Error deleting $photoname");
            }
        }
	}
?>