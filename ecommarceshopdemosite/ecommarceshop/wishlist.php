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

     //ajouter un produit au panier
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;

        $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id ='$user_id'") or die('query failed');
        if (mysqli_num_rows($cart_num)>0) {
            $message[]='product already exist in cart';
        }else{
            mysqli_query($conn, "INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`quantity`,`image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_quantity','$product_image')");
            $message[]='product successfuly added in your cart';
        }
    }
    //supprimer un produit de la wishlist
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$delete_id'") or die('query failed');

        header('location:wishlist.php');
    }
    //supprimer un produit de la wishlist
    if (isset($_GET['delete_all'])) {

        mysqli_query($conn, "DELETE FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');

        header('location:wishlist.php');
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
            <h1>Ma wishlist</h1>
            <a href="index.php" style="color:white">Accueil</a><span>/ wishlist</span>
        </div>
    </div>
    <div class="line"></div>
    <section class="shop">
        <h1 class="title">produits ajouter à la wishlist</h1>
        
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
        
            <div class="box-container">
            <?php 
                $grand_total=0;
                $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist`") or die('query failed');
                if (mysqli_num_rows($select_wishlist)>0) {
                    while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)){


            ?>
            <form method="post" class="box">
                <img src="image/<?php echo $fetch_wishlist['image']; ?>">
                <div class="price"><?php echo $fetch_wishlist['price']; ?>Fcfa</div>
                <div class="name"><?php echo $fetch_wishlist['name']; ?></div>
                <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image']; ?>">
                <div class="icon">
                    <a href="view_page.php?pid=<?php echo $fetch_wishlist['id']; ?>" class="bi bi-eye-fill"></a>
                    <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>" class="bi bi-x" onclick="return confirm('voulez-vous supprimer ce produit de votre liste de souhaits ?')"></a>
                    <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                </div>
            </form>

            <?php 
                    $grand_total+=$fetch_wishlist['price'];
                    }
                }else{
                    echo '<p class="empty">aucun produit ajouté pour le moment !</p>';
                }
            ?>
        </div>
        <div class="wishlist_total">
            <p>montant total à payer : <span><?php echo $grand_total; ?>fcfa</span></p>
            <a href="shop.php" class="btn">poursuivre les achats</a>
            <a href="wishlist.php?delete_all" class="btn <?php echo ($grand_total)?'':'disabled'?>" onclick="return confirm('voulez-vous supprimer tous les articles de votre liste de souhaits ?')">supprimer tout</a>
        </div>
    </section>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>