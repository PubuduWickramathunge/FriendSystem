<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Friend System - Add Friends</title>
<style>

	body{
		border: double;
		padding: 50px;
		text-align: center;
			
		}
	</style>
	
</style>
</head>

<body>
    
    <?php  
    $link= new Mysqli('localhost','root','','seng21253');
    $email = $_SESSION['Email'];
    $name = $_SESSION['Name'];
    
    
    if(isset($_REQUEST['addfriend'])){
        $addfriendemail = $_REQUEST['addfriendemail'];

        $sqlAddFriends = "INSERT INTO friendlist values('$email','$addfriendemail')";
        
        $resultAddfriends = $link->query($sqlAddFriends);
    }
    
    if(isset($_REQUEST['page'])){
        $pageno = $_REQUEST['page'];
    }
    else{
        $pageno = 1;
    }
    
    $recperpage = 5;
    
    // Getting number of users who are not friends yet 
    $sqlNotFriends = "SELECT * FROM userlist WHERE Email NOT IN (SELECT friendEmail FROM friendlist WHERE userEmail='$email' UNION SELECT userEmail FROM friendlist WHERE friendEmail='$email') AND Email!='$email'";
    
    $resultNotFriends = $link->query($sqlNotFriends);
    $last_page=ceil(($resultNotFriends->num_rows)/$recperpage);
    
    //calculate next page starting number
    if($pageno == 1){
        $start = 0;
    }
    else{
        $start = ($pageno-1) * $recperpage;
    }
    
    // Getting list of users who are not friends yet 
    $sqlNotFriends = "SELECT * FROM userlist WHERE Email NOT IN (SELECT friendEmail FROM friendlist WHERE userEmail='$email' UNION SELECT userEmail FROM friendlist WHERE friendEmail='$email') AND Email!='$email' limit ".$start.",".$recperpage;
    
    $resultNotFriends = $link->query($sqlNotFriends);
    
    //Getting list of users who are friends
    $sqlFriends = "SELECT * FROM userlist WHERE Email IN (SELECT friendEmail FROM friendlist WHERE userEmail='$email' UNION SELECT userEmail FROM friendlist WHERE friendEmail='$email') AND Email!='$email'";
    
    $resultFriends = $link->query($sqlFriends);
    
    //Getting number of friends
    $numOfFriends = $resultFriends->num_rows;
    
    ?>
    
    <div align="center" >
    <h1>My Friend System</h1>
    <h3><?php echo $name ?>'s Add Friend Page </h3> 
	<h4>Total number of friends are <?php echo $numOfFriends ?></h4>
    

   <table width="50%" border="1" align = "center" >
      <tbody>
          <tbody>
          <?php while($row = $resultNotFriends->fetch_array()){ ?>
            <tr>
              <!--Name-->
              <td><?php echo $row['Name'] ?>&nbsp;</td>

              <!--Number of mutual friends-->
              <td><?php 

                    $friendemail = $row['Email'];

                    $sql_mutual = "SELECT * FROM userlist WHERE Email IN (SELECT friendEmail FROM friendlist WHERE userEmail='$friendemail' UNION SELECT userEmail FROM friendlist WHERE friendEmail = '$friendemail') AND Email != '$friendemail'";

                    $resultMutual = $link->query($sql_mutual);

                    echo $resultMutual->num_rows." mutual friends";                                                           
                  ?>&nbsp;</td>

              <!--Add friend-->
              <td align="center"><form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                      <input type="submit" name="addfriend" value="Add friend" >
                     
<input type="hidden" name="addfriendemail" value="<?php echo $row['Email'] ?>" >
                </form></td>

            </tr>
          <?php } ?>
      </tbody>
    </table>
    <table width="50%" border="0" align = "center" >
      <tbody>
        <tr>
          <td><?php if($pageno>1){ ?>   
                <a href="addfriend.php?page=<?php echo $pageno-1 ?>" > Previous </a> 
              <?php } ?> &nbsp;</td>
          <td> &emsp; &emsp; &emsp; &emsp; </td>
          <td align="right"><?php if($pageno<$last_page){ ?>   
                <a href="addfriend.php?page=<?php echo $pageno+1 ?>" > Next </a> 
              <?php } ?> &nbsp;</td>
        </tr>
        <tr>
          <td> <a href="friendlist.php" > Friend List </a> &nbsp; </td>
          <td> &emsp; &emsp; &emsp; &emsp; </td>
          <td align="right"> <a href="main.html" > Log Out </a> &nbsp; </td>
        </tr>
      </tbody>
    </table>
    </div>
   
</body>
</html>