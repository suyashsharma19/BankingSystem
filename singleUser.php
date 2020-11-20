<!DOCTYPE html>
<html>
<head>
	<title>Single User Detail | Banking System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include('navbar.php'); ?>
	<section style="height: 85vh;">
		<div class="container" style="text-align: left">
		<?php 
			session_start();
			include('db_connect.php');
			if($_SERVER["REQUEST_METHOD"]=='POST'){
			    $sender = $_POST['name'];
			    
			    $_SESSION["name"] = $sender;
			    
			    $query = "SELECT * FROM customer_details WHERE c_name ='{$sender}'";
			    $result = mysqli_query($conn,$query);
			    $customer = mysqli_fetch_array($result);
			    $disabled="disabled";
			       echo "<h1>Sender Details</h1><br>";
			       echo "<h4>Name: {$customer['c_name']}</h4>";
			       echo "<h4>Email address: {$customer['c_email']}</h4>";
			       echo "<h4>Current balance: ₹{$customer['c_balance']}</h4>";
			       $insufficient=$customer['c_balance']<0;
			    	if($insufficient) {
			    		echo "<h6 class='red-text accent-4'>Account must have more than 0 rupees to have a successful transaction.</h6>";
			    	}

			}
		?>
	</div>
	<div class="container center">
		<a href="transfer.php" style="background-color: #6C63FF; margin: 20px;" class="waves-effect waves-light btn z-depth-2 <?php if($insufficient) { echo $disabled;} ?>">Transfer to &rarr;</a>
		<a href="selectUser.php" class="waves-effect waves-light btn black z-depth-2">Back</a>
	<div>
	</section>
	<?php include('footer.php'); ?>
</body>
</html>