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
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <title>a propos</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>À PROPOS</h1>
            <p style="color:white">À propos de nous!</p>
            <a href="index.php" style="color:white">Accueil</a><span>/ À propos</span>
        </div>
    </div>
    <div class="line"></div>
    <!-------a propos-------->
    <div class="line2"></div>
    <div class="about-us">
        <div class="row">
            <div class="box">
                <div class="title">
                    <span>À PROPOS DE NOUS</span>
                    <h2>Je me présente M. SORO NAZONNA KARIM, <br>PDG de Innov invest</h2>
                </div>
                <p>INNOV INVEST, c’est bien plus qu’un simple fabricant d’ordinateurs. 
                    C’est une entreprise engagée dans le développement de son écosystème et de la jeunesse ivoirienne.
                    Nous sommes fiers de créer des emplois localement et de contribuer à l’essor de l’économie ivoirienne.</p>
            </div>
            <div class="img-box">
                <img src="images/ceo.jpeg">
            </div>
        </div>
    </div>
    <div class="line3"></div>
    <div class="line4"></div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>