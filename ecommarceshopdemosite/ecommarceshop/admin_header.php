<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<title>Document</title>
</head>
<body>
	<header class="header">
		<div class="flex">
			<a href="admin_pannel.php" class="logo"><img src="images/innovinvst.png" style="height: 50px;"></a>
			<nav class="navbar">
				<a href="admin_pannel.php">Accueil</a>
				<a href="admin_product.php">Produits</a>
				<a href="admin_order.php">Commandes</a>
				<a href="admin_user.php">Utilisateurs</a>
				<a href="admin_message.php">Messages</a>
			</nav>
			<div class="icons">
				<i class="bi bi-person" id="user-btn"></i>
				<i class="bi bi-list" id="menu-btn"></i>
			</div>
			<div class="user-box">
				<p>Nom d'Utilisateur : <span><?php echo $_SESSION['user_name']; ?></span></p>
				<p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
				<form method="post">
					<button type="submit" name="logout" class="logout-btn">Deconnexion</button>
				</form>
			</div>
		</div>
	</header>
	<div class="banner">
		<div class="detail">
			<h1>Dashboard</h1>
			<p style="color:white">Bienvenue à toi !</p>
		</div>
	</div>
	<div class="line"></div>
</body>
</html>