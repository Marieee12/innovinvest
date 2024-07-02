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
	

	//supprimer les produits de la base de données
	if (isset($_GET['delete'])) {
		$delete_id = $_GET['delete'];
		
		mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
		$message[]='utilisateur supprimé avec succès';
		header('location:admin_order.php');
	}

	//mise à jour du statut des paiements

	if (isset($_POST['update_order'])) {
		$order_id = $_POST['order_id'];
		$update_payment = $_POST['update_payment'];

		mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id='$order_id'") or die('query failed');

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
	<section class="order-container">
		<h1 class="title">total des commandes passée</h1>
		<div class="box-container">
			<?php 
				$select_orders = mysqli_query($conn,"SELECT * FROM `orders`") or die('query failed');
				if (mysqli_num_rows($select_orders)>0) {
					while($fetch_orders = mysqli_fetch_assoc($select_orders)){


			?>
			<div class="box">
				<p>nom d'utilisateur: <span><?php echo $fetch_orders['name']; ?></span></p>
				<p>identifiant de l'utilisateur: <span><?php echo $fetch_orders['user_id']; ?></span></p>
				<p>mis le: <span><?php echo $fetch_orders['placed_on']; ?></span></p>
				<p>numero : <span><?php echo $fetch_orders['number']; ?></span></p>
				<p>email : <span><?php echo $fetch_orders['email']; ?></span></p>
				<p>prix total : <span><?php echo $fetch_orders['total_price']; ?></span></p>
				<p>méthode : <span><?php echo $fetch_orders['method']; ?></span></p>
				<p>addresse : <span><?php echo $fetch_orders['address']; ?></span></p>
				<p>produit total : <span><?php echo $fetch_orders['total_products']; ?></span></p>
				<form method="post">
					<input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
					<select name="update_payment">
						<option disabled selected><?php echo $fetch_orders['payment_status']; ?></option>
						<option value="pending">En cours</option>
						<option value="complete">complète</option>
					</select>
					<input type="submit" name="update_order" value="actualiser le paiement" class="btn">
					<a href="admin_order.php?delete=<?php echo $fetch_orders['id']; ?>;" onclick="return confirm('supprimer ce message');" class="delete">supprimer</a>
				</form>
				
			</div>
			<?php 
					}
				}else{
						echo '
							<div class="empty">
								<p>aucune commande passée !</p>
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