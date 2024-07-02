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
    if (isset($_POST['order_btn'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $method = mysqli_real_escape_string($conn, $_POST['method']);
        $address = mysqli_real_escape_string($conn, 'flat no. '.$_POST['flate'].','.$_POST['street'].','.$_POST['city'].','.$_POST['state'].','.$_POST['country'].','.$_POST['pin']);
        $placed_on = date('d-M-Y');
        $cart_total=0;
        $cart_product[]='';
        $cart_query=mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');

        if (mysqli_num_rows($cart_query)>0) {
            while($cart_item=mysqli_fetch_assoc($cart_query)){
                $cart_product[]=$cart_item['name'].' ('.$cart_item['quantity'].')';
                $sub_total = ($cart_item['price'] * $cart_item['quantity']);
                $cart_total+=$sub_total;
            }
        }
        $total_products = implode(', ', $cart_product);
        mysqli_query($conn, "INSERT INTO `orders`(`user_id`,`name`,`number`,`email`,`method`,`address`,`total_products`,`total_price`,`placed_on`) VALUES('$user_id','$name','$number','$email','$method','$address','$total_product','$cart_total','$placed_on')");
        mysqli_query($conn,"DELETE FROM `cart` WHERE user_id='$user_id'");
        $message[]='order placed successfully';
        header('location:checkout.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <title></title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>Commandes</h1>
            <a href="index.php" style="color:white">Accueil</a><span>/ Commandes</span>
        </div>
    </div>
    <div class="line"></div>
    <div class="checkout-form">
        <h1 class="title">Processus de paiement</h1>
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
        <div class="display-order">
            <div class="box-container">
            <?php
                $select_cart=mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');
                $total=0;
                $grand_total=0;
                if (mysqli_num_rows($select_cart)>0) {
                    while($fetch_cart=mysqli_fetch_assoc($select_cart)){
                        $total_price=($fetch_cart['price'] * $fetch_cart['quantity']);
                        $grand_total=$total+=$total_price;
                    
                ?>
                
                    <div class="box">
                        <img src="image/<?php echo $fetch_cart['image'];?>">
                        <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                    </div>
                
                <?php 
                        }
                    }
                ?>
            </div>
            <span class="grand-total">Montant total à payer : <?= $grand_total; ?>fcfa</span>
        </div>
        <form method="post">
            <div class="input-field">
                <label>Votre nom</label>
                <input type="text" name="name" placeholder="entrer votre nom">
            </div>
            <div class="input-field">
                <label>Votre numéro</label>
                <input type="number" name="number" placeholder="entrer votre numero">
            </div>
            <div class="input-field">
                <label>Votre email</label>
                <input type="text" name="email" placeholder="entrer votre email">
            </div>

            <div class="input-field">
                <label>sélectionner le mode de paiement</label>
                <select name="method">
                    <option selected disabled>sélectionner le mode de paiement</option>
                    <option value="cash on delivery">Wave</option>
                    <option value="cradit card">carte de crédit</option>
                    <option value="paytm">Orange Money</option>
                    <option value="paypal">MTN Money</option>  
                    <option value="paypal">Moov Money</option> 
                </select>
            </div>
            <div class="input-field">
                <label>Adresse 1</label>
                <input type="text" name="flate" placeholder="numéro d'immatriculation.">
            </div>
            <div class="input-field">
                <label>Adresse 2</label>
                <input type="text" name="street" placeholder="nom de la rue">
            </div>
            <div class="input-field">
                <label>ville</label>
                <input type="text" name="city" placeholder="ville">
            </div>
            <div class="input-field">
                <label>commune</label>
                <input type="text" name="state" placeholder="commune">
            </div>
            <div class="input-field">
                <label>pays</label>
                <input type="text" name="country" placeholder="pays">
            </div>
            <div class="input-field">
                <label>code postal</label>
                <input type="text" name="pin" placeholder="code postal">
            </div>
            <input type="submit" name="order_btn" class="btn" value="commander maintenant">
        </form>
    </div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>