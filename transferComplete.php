<?php include('db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Completion Status | Banking System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<?php include('navbar.php'); ?>
	<section>
	<div class="container" style="height: 85vh;">
	<?php 
		if($_SERVER["REQUEST_METHOD"]=='POST'){
		$sender=$_POST['Sname'];
		$receiver=$_POST['Rname'];
		$transfer_amount=$_POST['amount'];
		if( $sender != $receiver && $transfer_amount>0) {
			
				$senderQuery="SELECT c_balance FROM customer_details WHERE c_name='${sender}'";
				$senderConn=mysqli_query($conn, $senderQuery);
				$senderResult=mysqli_fetch_array($senderConn);
				$senderBalance=$senderResult['c_balance'];
				$receiverQuery="SELECT c_balance FROM customer_details WHERE c_name='${receiver}'";
				$receiverConn=mysqli_query($conn, $receiverQuery);
				$receiverResult=mysqli_fetch_array($receiverConn);
				$receiverBalance=$receiverResult['c_balance'];

				$senderBalance-=$transfer_amount;
				$receiverBalance+=$transfer_amount;
				//echo $senderBalance." ".$receiverBalance;
				$senderBalanceUpdate="UPDATE customer_details SET c_balance=\"{$senderBalance}\" WHERE c_name=\"{$sender}\"";
				$senderLogUpdate=mysqli_query($conn,$senderBalanceUpdate);

				$receiverBalanceUpdate="UPDATE customer_details SET c_balance=\"{$receiverBalance}\" WHERE c_name=\"{$receiver}\"";
				$receiverLogUpdate=mysqli_query($conn,$receiverBalanceUpdate);

				$historyQuery="INSERT INTO transfer_history (t_sender, t_receiver, t_amount) VALUES ('{$sender}', '{$receiver}', {$transfer_amount})";
				$historyUpdate=mysqli_query($conn, $historyQuery);
				if(!$historyUpdate) {
					echo "ERROR!";
				}

				echo "<h3 class=\"green-text\"> Transaction Successful!</h3>";
				echo "<h5>₹{$transfer_amount} has been deducted from your account i.e. {$sender} and the fund is succesfully transfered to {$receiver}.</h5>";
				echo "<a href=\"transferHistory.php\" class=\"waves-effect waves-light btn black\">Transfer History</a>";
				echo "     <a href=\"index.php\" class=\"waves-effect waves-light btn black z-depth-2\">Home</a>";
		}
		else {
			echo "<h3 class=\"red-text accent-3\"> Transaction Failed!</h3>";
			if($sender==$receiver) {
				
				echo "<h5 class=\"red-text accent-3\">Sender and receiver cannot be the same person.</h5>";
			}
			else {
				echo "<h5 class=\"red-text accent-3\">Transfer amount cannot be negative.</h5>";
			}
			echo "<p>Redirecting to previous, please wait. <a href=\"transfer.php\">Click here</a> to redirect manually</p>";
			header( "refresh:5;url=transfer.php" );
		}
	}
		
	?>
</div>
</section>
<?php include('footer.php'); ?>
</body>
</html>