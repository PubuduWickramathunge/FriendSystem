<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign-Up</title>
<style>

	body{
		border: double;
		padding: 50px;
			
	}
</style>
</head>

<body>
	
	<?php
	
	$errorMessage=" ";
	
	$link = new mySQLi('localhost', 'root', '', 'seng21253');
	
	if(isset($_REQUEST['submit'])){
		
		$email = $_REQUEST['email'];
		$name = $_REQUEST['name'];
		$password = $_REQUEST['password'];
		$confirmPassword = $_REQUEST['confirmPassword'];
		

		
		if(!empty($email) && !empty($name) && !empty($password) && !empty($confirmPassword)){
			if($password==$confirmPassword){
				$sql="SELECT * FROM userlist";
				$result=$link->query($sql);
				while($raw=$result->fetch_array()){
					if ($email==$raw['Email']){
						$errorMessage =  "This email has been taken!";
						
						break;
					}
					
				}
				
				
					$sql="INSERT INTO userlist values('$email','$name','$confirmPassword')";
					$result=$link->query($sql);
					if($result){
						header("Location: login.php");
					}
					
				
				
			}
			else{
				$errorMessage =  "Password Conformation does not match";
			}
		}
		else{
			$errorMessage =  "Fill all fields";
		}
	}
	
	
	
	?>
	
	
	<h1 style="text-align: center">My Friend System</h1><br>
	<h2 style="text-align: center">Registration page</h2><br><br>
	<p style="text-align: center ; color: red"><?php echo "$errorMessage"; ?></p>
	
	<form action=<?php echo $_SERVER['PHP_SELF']?> method="post">
	
		<table width="50%" border="0" align="center">
  <tbody>
    <tr>
      <td style="text-align: right">&nbsp;Email</td>
      <td>
        <input type="email" name="email" id="email"></td>
    </tr>
    <tr>
      <td style="text-align: right">&nbsp;Profile Name</td>
      <td>
        <input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <td style="text-align: right">&nbsp;Password</td>
      <td>
        <input type="password" name="password" id="password"></td>
    </tr>
    <tr>
      <td style="text-align: right">&nbsp;Confirm Password</td>
      <td>
        <input type="password" name="confirmPassword" id="confirmPassword"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="reset" name="clear" id="reset" value="Clear">        	
	<input type="submit" name="submit" id="submit" value="Register"></td>
    </tr>
  </tbody>
</table>

	
	</form>
	<a href="main.html"> Home Page </a> 
</body>
	
</html>
