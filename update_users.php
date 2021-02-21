<?php

session_start();


$db = mysqli_connect('localhost', 'root', '','multi_login');

function e($val){
  global $db;
  return mysqli_real_escape_string($db, trim($val));
}

if (isset($_GET['userid'])) {
  ?>

<html>
<head>
<title>Update User Data</title>
<link rel="stylesheet" href="login.css">
</head>
<body>

<?php
$id = $_GET['userid'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($db, $sql);
$row= mysqli_fetch_array($result);


function change(){
  global $db, $id;
if(isset($_POST['user_name']) && count($_POST)>0){
  $username= e($_POST['user_name']);
  $phone = e($_POST['phone']);
  $type = e($_POST['user_type']);
  $query = "UPDATE `users` SET `username`='$username',`phone_number`='$phone',`user_type`= '$type' WHERE id=$id";;

  
  if(mysqli_query($db, $query)){
    echo "Records updated successfully";
  }else{
    echo "ERROR: Could not able to execute $query. " .mysqli_error($db);
  }
  $_SESSION['success'] = "Record Modified Successfully";
  
  
}
}

if(isset($_POST['submit'])){
  change();
}


?>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">

</div>

<div class="contupdate">
  

<label>
        <span>Username</span>
        <input type="text" name="user_name" class="txtField" value="<?php echo $row['username']; ?>">
        </label>

        <label>
        <span>Phone Number</span>
        <input type="text" name="phone" class="txtField" value="<?php echo $row['phone_number']; ?>">
        </label>

        <label>
        <span>User Type</span>
        <select id="user_type_list" name="user_type">
<option value="<?php echo $row['user_type']; ?>"><?php echo $row['user_type']; ?></option>
<option value="admin">admin</option>
<option value="user">user</option>
</select>
        </label>



<input type="submit" name="submit" value="Submit" class="submitModified">
</div>
</form>

<div align="center"><a class="savoir" href="admin_home.php" target="_blank" rel="nofollow noopener">Return to the Admin page</a></div>

</body>

</html>




<?php
}
?>
