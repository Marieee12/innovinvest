<?php 
	include 'connection.php';
	session_start();

	if (isset($_POST['submit-btn'])) {
		

		$filter_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$email = mysqli_real_escape_string($conn, $filter_email);

		$password = mysqli_real_escape_string($conn, $filter_password);

		$select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

		if (mysqli_num_rows($select_user)>0) {
			$row = mysqli_fetch_assoc($select_user);
			if ($row['user_type']== 'admin') {
				$_SESSION['admin_name'] = $row['name'];
				$_SESSION['admin_email'] = $row['email'];
				$_SESSION['admin_id'] = $row['id'];
				header('location:admin_pannel.php');
			}else if($row['user_type']== 'user'){
				$_SESSION['user_name'] = $row['name'];
				$_SESSION['user_email'] = $row['email'];
				$_SESSION['user_id'] = $row['id'];
				header('location:index.php');
			}else{
				$message[] = 'e-mail ou mot de passe incorrect';
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>connexion </title>
</head>
<body>
	
	
	<section class="form-container">
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
		<form method="post">
			<h1>CONNEXION</h1>
			<div class="input-field">
				<label>Email</label><br>
				<input type="email" name="email" placeholder="entrer votre email" required>
			</div>
			<div class="input-field">
				<label>Mot de passe</label><br>
				<input type="password" name="password" placeholder="entrer votre mot de passe" required>
			</div>
			<a href=""><input type="submit" name="submit-btn" value="Connexion" class="btn"></a>
			<p>Vous n'avez pas de compte? <a href="register.php">Inscrivez-vous maintenant</a></p>
			<a href="http://localhost/ecommarceshopdemosite/ecommarceshop/index.php" id="credits">Accéder au site</a>
		</form>
	</section>
</body>
</html>