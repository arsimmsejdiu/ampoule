<?php
include('./db_connection.php');
require('header.php');
// require('header-1.php');

if (isset($_POST['submit'])) {
	//getting the post values
	$etage = $_POST['etage'];
	$price = $_POST['price'];
	$position = $_POST['position'];

	// Query for data insertion
	$query = mysqli_query($db_connection, "insert into historique(etage, price, position) value('$etage','$price', '$position' )");
	if ($query) {
		echo "<script type='text/javascript'> document.location ='home.php'; </script>";
	} else {
		echo "<script>alert('Something Went Wrong. Please try again');</script>";
	}
}
?>

<body>
	<div class="signup-form pos">
		<form method="POST">
			<h2>Ajouter Ampoule</h2>
			<p class="hint-text">Remplir tous les champs</p>
			<div class="form-group">
				<div class="col"><input type="text" class="form-control" name="etage" placeholder="Etage" required="true"></div>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="price" placeholder="Entrez le Prix de l'ampoule" required="true" ">
			</div>

            <div class=" form-group">
				<input type="text" class="form-control" name="position" placeholder="Entrez le Position de l'ampoule" required="true" ">
			</div>

			<div class=" form-group">
				<button onclick="myFunction()" type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
			</div>
		</form>
		<div class="text-center">View Already Inserted Data!! <a href="home.php">View</a></div>
	</div>
	<div id="snackbar">Some text some message..</div>
</body>

<?php
require('footer.php')
?>