<?php 

include 'connection.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		.box-container{
			margin: 2rem;
		}
		figure {
            max-width: 500px;
            margin: 0 auto;
            text-align: center;
        }

        figure img {
            width: 100%;
            height: 100%;
            display: block;
        }

        ul {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1rem auto;
            list-style: none;
        }

        li {
            display: inline-block;
            width: 100px;
            margin: .5rem;
            cursor: pointer;
        }

        li img {
            width: 100px;
            display: block;
        }
	</style>
</head>
<body>
	<div class="view_page">
		<?php 
			if (isset($_GET['pid'])) {
				$pid = $_GET['pid'];
				$select_products = mysqli_query($conn, "SELECT * FROM `slider` WHERE id= '$pid'") or die('query failed');
				if(mysqli_num_rows($select_products)>0){
					while($fetch_products = mysqli_fetch_assoc($select_products)){


		?>
		<div class="box">
				
				<figure>
					<img src="img/<?php echo $fetch_products['thumb1']; ?>" id="mainImage">
		            
		        </figure>
				
				<div class="thumb-list">
		            <ul>
		                <li><img src="img/<?php echo $fetch_products['thumb1']; ?>" alt="" id="thumb1"></li>
		                <li><img src="img/<?php echo $fetch_products['thumb2']; ?>" alt="" id="thumb2"></li>
		                <li><img src="img/<?php echo $fetch_products['thumb3']; ?>" alt="" id="thumb3"></li>
		                <li><img src="img/<?php echo $fetch_products['thumb4']; ?>" alt="" id="thumb4"></li>
		            </ul>
	        	</div>
			</div>
		<?php 
					}
				}
			}	
		?>

	</div>
	<script>
        mainImage = document.querySelector('#mainImage');
        thumb1 = document.querySelector('#thumb1');
        thumb1Src = document.querySelector('#thumb1').src;
        thumb2 = document.querySelector('#thumb2')
        thumb2Src = document.querySelector('#thumb2').src;
        thumb3 = document.querySelector('#thumb3')
        thumb3Src = document.querySelector('#thumb3').src;
        thumb4 = document.querySelector('#thumb4');
        thumb4Src = document.querySelector('#thumb4').src;

        thumb1.addEventListener('click', () => {
            mainImage.src = thumb1Src
        })
        thumb2.addEventListener('click', () => {
            mainImage.src = thumb2Src
        })
        thumb3.addEventListener('click', () => {
            mainImage.src = thumb3Src
        })
        thumb4.addEventListener('click', () => {
            mainImage.src = thumb4Src
        })


    </script>
</body>
</html>