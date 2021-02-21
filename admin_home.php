<?php 
include('functions.php');
include('filesLogic.php');

$db = mysqli_connect('localhost', 'root', '','multi_login');

$sql = "SELECT * FROM users";
$result = mysqli_query($db, $sql);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);



if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location:login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="syle.css">
	<link rel="stylesheet" type="text/css" href="pages.css">
	<link rel="stylesheet" type="text/css" href="design.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
	
		<!-- logged in user information -->

</div>

<div class="tab">
  <button class="tablinks" onclick="openPage(event, 'Upload')"  align="center">UPLOAD DOCUMENT</button>
  <button class="tablinks" onclick="openPage(event, 'Uploaded')"  align="center">UPLOADED DOCUMENT</button>
  <button class="tablinks" onclick="openPage(event, 'Users')"  align="center">ACCOUNTS</button>
</div>

<!-- Tab content -->
<div id="Upload" class="tabcontent">

	<button type="button" class="collapsible" align="center">Envoyer des fichiers</button>

	<div class="containeradmin">
	<p>
Please upload documents only in 'pdf', 'docx', 'zip' format.
</p><br>
     
        <form action="admin_home.php" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
					<input type="file" name="myfile" id="input" onchange='getFileData(this)'> <br>
					<script>
function getFileData(object){
var file = object.files[0];
var name = "file_name"//you can set the name to the paragraph id 
document.getElementById('file_name').value=name;//set name using core javascript
}
</script>
<p id="file_name" color="black"></p>
					
					<button type="submit" name="save" class="savoir">upload</button>
					
					<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
        </form>
      
		</div>
		<p id="messages" color="black"></p>
		</div>


<div id="Uploaded" class="tabcontent">
	<h3>Uploaded documents</h3>
	
	<table>
		<div class="table-header">

    <th>ID</th>
    <th>Filename</th>
    <th>Size</th>
    <th>Downloads</th>
    <th>Action</th>
</div>
<tbody>
	<?php
	 foreach ($files as $file): ?>
    <tr>

      <td><?php echo $file['id']; ?></td>
      <td style="word-wrap: break-word"><?php echo $file['name']; ?></td>
      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><?php echo $file['downloads']; ?></td>
      <td><a class="modifieda" href="admin_home.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
    </tr>
  <?php endforeach;?>

</tbody>
</table style="table-layout: fixed">

</div>

<div id="Users" class="tabcontent">
	<h3>Accounts</h3>
	<div class="profile_info">
			<img src="assets\test.jpg"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="admin_home.php?logout='1'" style="color: red;">logout</a>
                       &nbsp; <a href="create_user.php"> + add user</a>
					</small>

				<?php endif ?>
			</div>
		</div>
		<table >
<thead>
    <th>ID</th>
    <th>Nom d'utilisateur</th>
    <th>numero de telephone</th>
		<th>Type</th>
		<th>Change Permissions</th>
  
</thead>
<tbody>
	<?php 
	
	foreach ($users as $user): ?>
    <tr>
      <td><?php echo $user['id']; ?></td>
      <td><?php echo $user['username']; ?></td>
      <td><?php echo $user['phone_number']; ?></td>
			<td ><?php echo $user['user_type']; ?></td>
			<td><a class="modifieda" href="update_users.php?userid=<?php echo $user['id']; ?>">Change Permissions</a></td>
    </tr>
  <?php endforeach;?>

</tbody>
</table>
</div>



	</div>

<script src="pages.js"></script>
</body>
</html>