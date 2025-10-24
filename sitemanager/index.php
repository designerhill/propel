<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	session_start();
	include("config.php");
	$error="";
	if(isset($_POST['login']))
	{
		$user=$_REQUEST['user'];
		$pass=$_REQUEST['pass'];
		$pass= sha1($pass);
		
		if(!empty($user) && !empty($pass))
		{
			$query = "SELECT auser, apass FROM admin WHERE auser='$user' AND apass='$pass'";
			// Debug: echo "Query: " . $query . "<br>";
			// Debug: echo "Pass hash: " . $pass . "<br>";
			$result = mysqli_query($con,$query)or die(mysqli_error($con));
			$num_row = mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
			// Debug: echo "Rows found: " . $num_row . "<br>";
			if( $num_row >= 1 )
			{
				$_SESSION['auser']=$user;
				header("Location: dashboard.php");
				exit();
			}
			else
			{
				$error='* Invalid User Name and Password';
			}
		}else{
			$error="* Please Fill all the Fileds!";
		}
		
	}   
?>
<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page1">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Propel Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body class="h-100">

    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="index.php">
                                        <img src="../assets/images/logo.png" alt="" style="height:100px;">
                                    </a>
                                </div>
                                <h4 class="text-center m-t-15">Log into Your Account</h4>
                                <?php if($error != ""){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                                <?php } ?>
                                <form class="m-t-30 m-b-30" action="" method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="user" placeholder="Username"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="pass" placeholder="Password"
                                            required>
                                    </div>

                                    <div class="text-center m-b-15 m-t-15">
                                        <button type="submit" class="btn btn-primary" name="login">Sign in</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="assets/plugins/common/common.min.js"></script>
    <!-- Custom script -->
    <script src="js/custom.min.js"></script>
</body>

</html>