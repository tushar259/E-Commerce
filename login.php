<!DOCKTYPE html>
<?php
   if(isset($_GET["login"])&&$_GET["login"]=="error"){
	   echo "<script> alert('Invalid user or password');</script>";
   }
?>
<html>

<head><title>Login</title>

<style>

body
{
	background-color:#ffffcc;
	text-align:center;
}

#sdmsg,#sdmsg1{color:red;}
</style>
<script type="text/javascript">
function chk()
{
	var flag=true;
	var g=document.getElementById("tx").value.length;
	var gp=document.fm.pass.value.length;
	document.getElementById("sdmsg").innerHTML="";
	document.getElementById("sdmsg1").innerHTML="";
	
	if(g==0)
	{
		q=document.getElementById("sdmsg");
		q.innerHTML="Empty user name field";
		flag=false;
	}
	if(gp==0)
	{
		qp=document.getElementById("sdmsg1");
		qp.innerHTML="Empty password field";
		flag=false;
	}
	return flag;
	
	
}
</script>
</head>
<body>
<h1>Login Here<h1><br><br>

<form action="login1.php" method="post" name="fm">
Email:<br>
<input type="text" name="name" value="" id="tx"><br>
<span id="sdmsg"></span><br><br>
Password:<br>
<input type="password" name="pass"><br>
<span id="sdmsg1"></span><br><br>
<input type="submit" name="sub" value="Login" onclick="return chk()"><br>
</form>

</body>
</html>
