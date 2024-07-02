<?php 

	include 'connection.php';
	session_start();
	$admin_id = $_SESSION['admin_name'];

	if (!isset($admin_id)) {
		header('location:login.php');
	}

	if (isset($_POST['logout'])) {
		session_destroy();
		header('location:login.php');	
	}
	

	//supprimer des produits de la base de données
	if (isset($_GET['delete'])) {
		$delete_id = $_GET['delete'];
		
		mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');

		header('location:admin_message.php');
	}
	
?>
<style type="text/css">
	<?php 
		include 'style.css';

	?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	
	<title>admin pannel</title>
</head>
<body>
	<?php include 'admin_header.php'; ?>
	<?php 
		if (isset($message)) {
			foreach ($messages as $message) {
				echo '
					<div class="message">
						<span>'.$message.'</span>
						<i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
					</div>

				';
			}
		}
	?>
	<div class="line4"></div>
	<section class="message-container">
		<h1 class="title">message non lu</h1>
		<div class="box-container">
			<?php 
				$select_message = mysqli_query($conn,"SELECT * FROM `message`") or die('query failed');
				if (mysqli_num_rows($select_message)>0) {
					while($fetch_message = mysqli_fetch_assoc($select_message)){


			?>
			<div class="box">
				<p>Identifiant de l'utilisateur : <span><?php echo $fetch_message['id']; ?></span></p>
				<p>nom: <span><?php echo $fetch_message['name']; ?></span></p>
				<p>email: <span><?php echo $fetch_message['email']; ?></span></p>
				<p><?php echo $fetch_message['message']; ?></p>
				<a href="admin_message.php?delete=<?php echo $fetch_message['id']; ?>;" onclick="return confirm('supprimer ce message');" class="delete">supprimer</a>
			</div>
			<?php 
					}
				}else{
						echo '
							<div class="empty">
								<p>aucun produit ajouté pour le moment !</p>
							</div>
						';
				}		
			?>
		</div>
	</section>
	<div class="line"></div>
	<script type="text/javascript" src="script.js"></script>
	
</body>
</html>