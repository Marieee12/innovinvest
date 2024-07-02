<?php 
	include 'connection.php';

	if (isset($_POST['submit-btn'])) {
		$filter_name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$name = mysqli_real_escape_string($conn, $filter_name);

		$filter_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$email = mysqli_real_escape_string($conn, $filter_email);

		$filter_password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$password = mysqli_real_escape_string($conn, $filter_password);

		$filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$cpassword = mysqli_real_escape_string($conn, $filter_cpassword);


		$select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

		if (mysqli_num_rows($select_user)>0) {
			$message[] = 'utilisateur déjà existant';
		}else{
			if ($password != $cpassword) {
				$message[] = 'mot de passe erroné';
			}else{
				mysqli_query($conn, "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')") or die('query failed');
				$message[] = 'enregistré avec succès';
				header('location:login.php');
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
	<title>inscription</title>
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
			<h1>Inscription</h1>
			<input type="text" name="name" placeholder="entrer votre nom" required>
			<input type="email" name="email" placeholder="entrer votre email" required>
			<input type="password" name="password" placeholder="entrer votre mot de passe" required>
			<input type="password" name="cpassword" placeholder="confirmer votre mot de passe" required>
			<input type="submit" name="submit-btn" value="s'inscrire maintenant" class="btn">
			<p>Vous avez déjà un compte ? <a href="login.php">Connectez-vous maintenant</a></p>
		</form>
	</section>
</body>
</html>