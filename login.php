<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log-In</title>
<style>

	body{
		border: double;
		padding: 50px;
			
	}
</style>
</head>
	
<body>
	
	<?Php
	
	$errorMessage="";
	$link= new Mysqli('localhost','root','','seng21253');
	if(isset($_REQUEST['submit'])){
		$email=$_REQUEST['email'];
		$password=$_REQUEST['password'];
		
		if(!empty($email) && !empty($password)){
			$sql="SELECT Name,Password FROM userlist WHERE Email='$email'";
			$result=$link->query($sql);
			$raw=$result->fetch_array();
			
			if($raw && $password==$raw['Password']){
				echo "Successfully Login"; 
				$_SESSION['Name'] =$raw['Name'];
				$_SESSION['Email'] =$email;
				header("Location: Friendlist.php");//if email and password are match load friend list
				
			}
			else{
				$errorMessage="Incorrect username or password.";
			}
			
			
			
		}
		else{
			$errorMessage="Fill all fields.";
		}
	}
		
	
	?>
	<span style="text-align: right"></span>
	<h1 style="text-align: center">My Friend System </h1><br> 
	<h2 style="text-align: center">Log in Page</h2><br><br>
	
	<p style="text-align: center ; color: red"><?php echo "$errorMessage"; ?></p>
	
	<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
		
		<table width="50%" border="0" align = "center">
  <tbody>
    <tr>
      <td style="text-align: right">&nbsp;Email</td>
      <td>
        <input type="email" name="email" id="email">
        </td>
    </tr>
    <tr>
      <td style="text-align: right">&nbsp;Password</td>
      <td>
        <input type="password" name="password" id="password">
        </td>
    </tr>
	  <tr>
      <td style="text-align: right">&nbsp;</td>
      <td>
        <input type="submit" name="submit" value = "Log In">
		  <input type="reset" value="Clear" name="clear">
        </td>
    </tr>
  </tbody>
</table>
	
	</form>
	<a href="main.html"> Home Page </a> 
</body>
</html>