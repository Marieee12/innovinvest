<?php 
	include 'connection.php';

	if (isset($_POST['enter'])) {

		$thumb1 = $_FILES['thumb1']['name'];
		$thumb1_tmp_name = $_FILES['thumb1']['tmp_name'];
		$image_folder1 = 'img/'.$thumb1;

		$thumb2 = $_FILES['thumb2']['name'];
		$thumb2_tmp_name = $_FILES['thumb2']['tmp_name'];
		$image_folder2 = 'img/'.$thumb2;

		$thumb3 = $_FILES['thumb3']['name'];
		$thumb3_tmp_name = $_FILES['thumb3']['tmp_name'];
		$image_folder3 = 'img/'.$thumb3;

		$thumb4 = $_FILES['thumb4']['name'];
		$thumb4_tmp_name = $_FILES['thumb4']['tmp_name'];
		$image_folder4 = 'img/'.$thumb4;

		$query = mysqli_query($conn, "INSERT INTO `slider`(`thumb1`, `thumb2`, `thumb3`, `thumb4`) VALUES ('$thumb1','$thumb2','$thumb3','$thumb4')") or die('query failed');
		if ($query) {
			move_uploaded_file($thumb1_tmp_name, $image_folder1);
			move_uploaded_file($thumb2_tmp_name, $image_folder2);
			move_uploaded_file($thumb3_tmp_name, $image_folder3);
			move_uploaded_file($thumb4_tmp_name, $image_folder4);
			echo 'produit ajouté avec succès';
		}else{
			echo 'query failed'. mysqli_error($conn);
		}
	}
?>
<style type="text/css">
	
	
</style>
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
	<form method="POST" enctype="multipart/form-data" class="form">
		<div class="input-field">
			<label>thumb 1</label>
		<input type="file" accept="image/jpg, image/jpeg, image/png, image/webp" name="thumb1">
		</div>
		<div class="input-field">
			<label>thumb 2</label>
		<input type="file" accept="image/jpg, image/jpeg, image/png, image/webp" name="thumb2">
		</div>
		<div class="input-field">
			<label>thumb 3</label>
		<input type="file" accept="image/jpg, image/jpeg, image/png, image/webp" name="thumb3">
		</div>
		<div class="input-field">
			<label>thumb 4</label>
		<input type="file" accept="image/jpg, image/jpeg, image/png, image/webp" name="thumb4">
		<input type="submit" name="enter" value="add img">
		</div>
	</form>

	<section class="show-products">
		<div class="box-container">
			<?php 
				$select_products = mysqli_query($conn, "SELECT * FROM `slider`") or die('query failed');
				if (mysqli_num_rows($select_products) > 0) {
					while($fetch_products = mysqli_fetch_assoc($select_products)){

			?>
			<div class="box">
				<a href="detail.php?pid=<?php echo $fetch_products['id']; ?>">detail</a>
				<figure>
					<img src="img/<?php echo $fetch_products['thumb1']; ?>" id="mainImage">
		            
		        </figure>
				
				
			</div>

			<?php 

					}	
				}
			?>
		</div>
	</section>
	
</body>
</html>