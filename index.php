<!DOCTYPE html>
<html>

<head>
    <title>Banking System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('navbar.php'); ?>

    <section>
    	<div class="container">
        <div class="row">
            <div class="col s6 description">
                <h1><b>Mesa Verde Bank & Trust.<b></h1>
                    <p style="text-align: right;">-by Suyash Sharma</p>
            </div>
            <div class="col s6">
                <img src="vector.svg" class="vector" width="500px" height="500px">
            </div>
        </div>
        <div class="go-to">
        	<a href="transferHistory.php" class="waves-effect waves-light btn-large black z-depth-2">Transfer History</a>
        	<a href="selectUser.php" class="waves-effect waves-light btn-large black z-depth-2">Select User</a>
        </div>
    </div>
    </section>
    <?php include('footer.php'); ?>
</body>

</html>