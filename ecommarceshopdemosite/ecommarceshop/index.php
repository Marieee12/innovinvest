<?php 
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    if (!isset($user_id)) {
        header('location:login.php');
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: login.php");
    }
    //ajout de produit à la wishlist
    if (isset($_POST['add_to_wishlist'])) {
    	$product_id = $_POST['product_id'];
    	$product_name = $_POST['product_name'];
    	$product_price = $_POST['product_price'];
    	$product_image = $_POST['product_image'];

    	$wishlist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id ='$user_id'") or die('query failed');
    	$cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id ='$user_id'") or die('query failed');
    	if (mysqli_num_rows($wishlist_number)>0) {
    		$message[]='le produit existe déjà dans la liste de souhaits';
    	}else if (mysqli_num_rows($cart_num)>0) {
    		$message[]='le produit existe déjà dans le panier';
    	}else{
    		mysqli_query($conn, "INSERT INTO `wishlist`(`user_id`,`pid`,`name`,`price`,`image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_image')");
    		$message[]='produit ajouté avec succès à votre liste de souhaits';
    	}
    }

     //ajout de produit au panier
    if (isset($_POST['add_to_cart'])) {
    	$product_id = $_POST['product_id'];
    	$product_name = $_POST['product_name'];
    	$product_price = $_POST['product_price'];
    	$product_image = $_POST['product_image'];
    	$product_quantity = $_POST['product_quantity'];

    	$cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id ='$user_id'") or die('query failed');
    	if (mysqli_num_rows($cart_num)>0) {
    		$message[]='le produit existe déjà dans le panier';
    	}else{
    		mysqli_query($conn, "INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`quantity`,`image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_quantity','$product_image')");
    		$message[]='produit ajouté avec succès dans votre panier';
    	}
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="slick.css" />
    <link rel="stylesheet" href="main.css">
    <title>page accueil</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container-fluid">
        <div class="hero-slider">
            <div class="slider-item">
                <img src="images/PAGESITEACCUEIL .jpg" alt="...">
                <div class="slider-caption" style="top: 14%; left: 29%;">
                    <span style="color:white" >Innov Invest</span>
                    <h1 style="color:white;font-size:67px">Pensé pour vous,<br> conçu par nous</h1> <br>
                    <p style="color:white">Ordinateurs portables, ordinateurs de bureau,<br> tablettes, périphériques.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="services">
    	<div class="row">
    		<div class="box">
    			<img src="img/0.png">
    			<div>
    				<h1 style="color:black">Livraison rapide</h1>
    			</div>
    		</div>
    		<div class="box">
    			<img src="img/1.png">
    			<div>
    				<h1 style="color:black">Satisfaction et garantie</h1>
    			</div>
    		</div>
    		<div class="box">
    			<img src="img/2.png">
    			<div>
    				<h1 style="color:black">Assistance en ligne 24/7</h1>
    			</div>
    		</div>
    	</div>
    </div>
    
    <!-- slider pub -->
	<div class="container-fluid">
        <div class="hero-slider">
            <div class="slider-item">
                <img src="images/Affichepourlesitepub.jpg" alt="...">
            </div>
            <div class="slider-item">
                <img src="images/Affiche2site.jpg" alt="...">
            </div>
			<div class="slider-item">
                <img src="images/IIVest.jpg" alt="...">
            </div>
			<div class="slider-item">
                <img src="images/REDUCTIONPUB3.jpg" alt="...">
            </div>
        </div>
        <div class="control">
            <i class="bi bi-chevron-left prev"></i>
            <i class="bi bi-chevron-right next"></i>
        </div>
    </div>

    <?php include 'homeshop.php'; ?>
    <div class="line2"></div>
    <div class="newslatter">
    	<h1 class="title">Rejoignez notre Newslatter</h1>
    	<p>Recevez 15% de réduction sur votre prochaine commande. Soyez le premier à connaître les promotions, les événements spéciaux, les nouveaux arrivages et plus encore.
        </p>
        <input type="text" name="" placeholder="Votre adresse Email...">
        <button>S'abonner</button>
    </div>
    <div class="line3"></div>
    <div class="client">
    	<div class="box">
    		<img src="images/im1.png" style="height: 100px;">
    	</div>
    	<div class="box">
    		<img src="images/im2.png" style="height: 100px;">
    	</div>
    	<div class="box">
    		<img src="images/im3.png" style="height: 100px;">
    	</div>
    	<div class="box">
    		<img src="images/im4.png" style="height: 100px;">
    	</div>
    	<div class="box">
    		<img src="images/im5.png" style="height: 100px;">
    	</div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="jquary.js"></script>
    <script src="slick.js"></script>

    <script type="text/javascript">
        <?php include 'script2.js' ?>
    </script>

</body>


</html>