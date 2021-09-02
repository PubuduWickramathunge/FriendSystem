<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Friend System - Friend List</title>
<style>

	body{
		border: double;
		padding: 50px;
		text-align: center;
			
	}
</style>
</head>

<body>
    
    <?php
    $link= new Mysqli('localhost','root','','seng21253');
    $email = $_SESSION['Email'];
    $name = $_SESSION['Name'];
    
    
    if(isset($_REQUEST['unfriend'])){
        $unfriendemail = $_REQUEST['unfriendemail'];

        $sqlUnfriend = "DELETE FROM friendlist WHERE (userEmail='$email' AND friendEmail='$unfriendemail') OR (userEmail='$unfriendemail' AND friendEmail='$email')";
        
        $resultUnfriend = $link->query($sqlUnfriend);
    }
    
    if(isset($_REQUEST['page'])){
        $pageno = $_REQUEST['page'];
    }
    else{
        $pageno = 1;
    }
    
    $recperpage = 5;
    
    $sqlNumOfFriends = "SELECT * FROM userlist WHERE Email IN (SELECT friendEmail FROM friendlist WHERE userEmail='$email' UNION SELECT userEmail FROM friendlist WHERE friendEmail='$email') AND Email!='$email'";
    
    $resultNumOfFriends = $link->query($sqlNumOfFriends);
	$totalrec= $resultNumOfFriends->num_rows;
    $totalpages=ceil($totalrec/$recperpage);
    
    $numOfFriends = $resultNumOfFriends->num_rows;
    
    if($pageno == 1){
        $start = 0;
    }
    else{
        $start = ($pageno-1) * $recperpage;
    }
    
    $sqlNumOfFriends = "SELECT * FROM userlist WHERE Email IN (SELECT friendEmail FROM friendlist WHERE userEmail='$email' UNION SELECT userEmail FROM friendlist WHERE friendEmail='$email') AND Email!='$email' limit ".$start.",".$recperpage;
    
    $resultNumOfFriends = $link->query($sqlNumOfFriends);
        
    ?>
    
    <h1>My Friend System</h1>
    <h3><?php echo $name ?>'s Add Friend Page </h3> 
<h4>Total number of friends is <?php echo $numOfFriends ?></h4>
    

    <table width="50%" border="1" align = "center">
      <?php while($row = $resultNumOfFriends->fetch_array()){ ?>
            <tr>
              <td align="left"><?php echo $row['Name'] ?>&nbsp;</td>

              <td><form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                      <input type="submit" name="unfriend" value="Unfriend" >
                      
<input type="hidden" name="unfriendemail" value="<?php echo $row['Email'] ?>" >
              </form></td>
            </tr>
          <?php } ?>
      </tbody>
    </table>
   <table width="50%" border="0" align = "center" >
      <tbody>
        <tr>
          <td><?php if($pageno>1){ ?>   
                <a href="friendlist.php?page=<?php echo $pageno-1 ?>" > Previous </a> 
              <?php } ?> &nbsp;</td>
          <td> &emsp; &emsp; &emsp; &emsp; </td>
          <td align="right"><?php if($pageno<$totalpages){ ?>   
                <a href="friendlist.php?page=<?php echo $pageno+1 ?>" > Next </a> 
              <?php } ?> &nbsp;</td>
        </tr>
        <tr>
          <td> <a href="addfriend.php" > Add Friends </a> &nbsp; </td>
          <td> &emsp; &emsp; &emsp; &emsp; </td>
          <td align="right"> <a href="main.html" > Log out </a> &nbsp; </td>
        </tr>
     </tbody>
</table>
    </div>
    
</body>
</html>