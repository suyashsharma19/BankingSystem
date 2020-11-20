<?php 
	include('db_connect.php');

	$sql = 'SELECT c_name, c_email, c_balance FROM customer_details ORDER BY c_id';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title>View User | Banking System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include('navbar.php'); ?>

		<section>
		<div class="wrapper">
				<div class="container" style="margin: 70px auto">
				<table class="highlight center">
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Current Balance</th>
					</tr>
					<?php 
						foreach($customers as $customer) {
							echo "<tr><td> ".$customer['c_name']."</td><td>".$customer['c_email']."</td><td>".$customer['c_balance']."</td></tr>";
						}
					?>
				</table>
			</div>
		</div>
	</section>

	<?php include('footer.php'); ?>
</body>
</html>