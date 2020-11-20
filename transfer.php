<?php 
	session_start();
	$sender=$_SESSION["name"];
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
	<title>Transfer Info | Banking System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include('navbar.php'); ?>
	<section style="margin: 70px auto; height: 85vh;">
		<form action="transferComplete.php" method="POST">
		<div class="container col s5" style="margin: 20px auto">
				<label for="Sname">Sender:</label>
				<select class="browser-default" id="Sname" name="Sname">
					<option value="<?php echo $sender; ?>" selected><?php echo $sender; ?></option>
				</select>

				<label for="Rname">Select a user to transfer to:</label>
				<select class="browser-default" id="Rname" name="Rname">
					<option value="" disabled selected>Choose your option</option>
					<?php 

						foreach($customers as $customer) {
							echo "<option value='".$customer['c_name']."'>".$customer['c_name']."</option>";
						}
					?> 
				</select>

				<label for="amount">Enter the amout to be transfered:</label>
				<input type="text" name="amount" id="amount" placeholder="Amount(in ₹)"></input>

				<button type="submit" class="waves-effect waves-light btn" style="background-color: #6C63FF; margin: 20px;">Submit</button>

				<a href="selectUser.php" class="waves-effect waves-light btn red darken-4">Cancel</a> 
				
		</div>
	</form>
	</section>
	<?php include('footer.php'); ?>

</body>
</html>