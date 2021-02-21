<?php 
	include('functions.php');
	include('filesLogic.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "Vous devez d'abord vous connecter";
		header('location: login.php');}

		if (isset($_GET['logout'])) {
			session_destroy();
			unset($_SESSION['user']);
			header("location: login.php");
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Page d'utilisateur</title>
	<link rel="stylesheet"  href="syle.css">


	
	
</head>
<body>
	<div class="header">
		<h2>Page d'utilisateur</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		
		<!-- logged in user information -->
		<div class="profile_info">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>

		<div id="Uploaded" class="tabcontent">
	<h3>Vos documents</h3>
	
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
</table >

</div>
	</div>
</body>
</html>