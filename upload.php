<pre>
<?php
require("DatabaseQuery.php");

$s=$_FILES['fileToUpload']['tmp_name'];
$n=$_FILES['fileToUpload']['name'];
$pn=$_POST["uName"];
$pn=$pn.".jpg";
//echo $_FILES['fileToUpload']['name']."<br>";
//echo $_FILES['fileToUpload']['tmp_name']."<br>";

$ar=explode("/",$_FILES['fileToUpload']['type']);
$fldr=$_POST["dropdown"];
//echo ($ar[0]);

if($ar[0]!="image"){
	echo "Filetype not supported";
	echo "<br>";
	echo "<a href = 'javascript:history.back()'>Back to previous page</a>";
}
else if(file_exists("$fldr/".$pn)){
	echo "Filename exists : ".$n;
	echo "<br>";
	echo "<a href = 'javascript:history.back()'>Back to previous page</a>";
}
else{
	if(move_uploaded_file($s,"$fldr/".$pn)){
		$s="insert into photo values(null,'".$_POST['uName']."','".$fldr."/".$pn."',".$_POST['price'].",".$_POST['qnty'].",'".$_POST['dropdown']."')";
		echo $s;
		if(updateSQL($s)){
			if (isset($_SERVER["HTTP_REFERER"])) {
				/*echo "file uploaded";
                echo "<br>";
				echo "<a href = 'javascript:history.back()'>Back to previous page</a>";*/
				//header("Location:AfMenClothing.php?upload=done");
				echo"<script> location.replace('AfAddProduct.php') </script>";
            }
		}
		else{
			echo "DB Error!";
			echo "<br>";
			echo "<a href = 'javascript:history.back()'>Back to previous page</a>";
		}
	}
	else{
		echo "File upload error";
		echo "<br>";
		echo "<a href = 'javascript:history.back()'>Back to previous page</a>";
	}
}	
?>
</pre>