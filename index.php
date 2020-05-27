<?php
session_start();
include('db.php');

if(isset($_REQUEST['login']))
{
    $email = $_REQUEST['username'];
	$password = sha1($_REQUEST['password']);

//recaptcha
// 	if(isset($_REQUEST['g-recaptcha-response']))
// 	{
//     	$captcha = $_REQUEST['g-recaptcha-response'];
// 	}
// 	if(!$captcha)
// 	{
// 		echo "<script type='text/javascript'> alert('Please check the reCaptcha'); </script>";
//     	//exit;
// 	}
//

// 	else
//	{
		$query = "SELECT * FROM login WHERE username='".$email."' and password='".$password."'"; 
		$stmt = OCIParse($conn, $query); 
		if(OCIExecute($stmt))
		{
			$_SESSION['alogin'] = $email;
			echo "<script type='text/javascript'> document.location = 'welcome.php'; </script>";
		}
		else
		{
			echo "<script>alert('password or email is wrong')</script>";
		}
//	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
</head>
<body>
    <section>
        <div class="container ">
            <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
						<h1 class="text-center text-bold">ENTER LOGIN CREDENTIALS</h1>
						<div class="row">
							<div class="col-md-8 offset-md-2 mt-4">
								<form method="post">

									<label for="" class="text-uppercase text-sm">Your Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb" required>
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb" required>
									<div class="g-recaptcha mt-4" data-sitekey="6Lcp__MUAAAAAJnoCiRyy__1o8avZFAIH-NYwL5q"></div>
									<br>
									<button class="btn btn-info btn-block" name="login" type="submit">LOGIN</button>
								</form>
							</div>
						</div>
					</div>
            </div>
        </div>
    </section>
</body>
</html>
