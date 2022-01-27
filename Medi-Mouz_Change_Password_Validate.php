<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Medi-Mouz | Electronic Health Records</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="Medi-Mouz.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:#f2f3f4">

<!--- <img src="medi-mouz.png" class="img-thumbnail rounded float-start" alt="mm logo"> --->
<div style="background-color:#f2f3f4" class="container-fluid p-4 text-white text-center">
  <img src="medi-mouz.png" class="img-thumbnail rounded float-start" alt="mm logo">
</div>

<div style="background-color:#002f42" class="container-fluid p-3 text-white text-center">
</div>

<div style="background-color:#002f42" class="container-fluid"> 
	<div style="background-color:#002f42" class="d-flex">
    <!---<div class="div1">
      <span>Div One</span>
    </div>
    <div class="div2">
      <span>Div Two</span>
    </div>
	<div style="background-color:#002f42" class="container-fluid p-3 text-white text-center">
 <!--- <img src="medi-mouz.png" class="img-thumbnail rounded float-start" alt="mm logo"> --->
		<div class="mr-auto w-75 p-2">
			<span><a href="Medi-Mouz.html">Home</a> | 
			<a href="Medi-Mouz_Documentation.pdf" target="_blank">Documentation</a> 
			| 
			<a href="Medi-Mouz_Team.html">The Medi-Mouz Team</a>
			| 
			<a href="Medi-Mouz_TermsOfService.html">Terms of Service</a></span>
		</div>
		<div class="ml-auto w-75 p-2">
			
		</div>
		<div class="ml-auto float-right w-25 p-2">
			<span>
			<a href="Medi-Mouz_SignUp.html">Register</a></span>
		</div>
	</div>
</div>

<div style="background-color:#002f42" class="container-fluid p-3 text-white text-center">
</div>

<div class="mx-auto rounded border-success mt-5" style="width:600px;">

	<div style="background-color:#002f42; height:400px;" class="bg-gradient container ml-5 mr-5 mb-5 p-5 my-5 border rounded border-success"> 

	<h2 class="bland"> 				
		<div class="imgcontainer">
			<img src="medi-mouz.png" alt="Avatar" class="avatar">
		</div> Verifying details... <a href="Medi-Mouz_LogIn.html" class="link-info">Please wait..</a></p> 

		
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'Medi-Mouz', 'admin@medi-mouz2021','medi-mouz');

// get the post records
$_SESSION["uname"] = $_POST['uname'];
$_SESSION["email"] = $_POST['email'];
$_SESSION["password"] = $_POST['password'];

$uname = $_SESSION["uname"];
$email = $_SESSION["email"];
$password = $_SESSION["password"];

// database insert SQL code
$sql = "SELECT COUNT(username) as Usernames FROM `Doctor` WHERE `username` = '$uname' AND `email` = '$email'";

// database 
$result = mysqli_query($con, $sql);
/* Get the number of rows in the result set */
$row_cnt = mysqli_fetch_row($result);
if  ($row_cnt[0] == 1) {
	header("Location: Medi-Mouz_Change_Password_Validate2.php");
}else {
    header("Location: Medi-Mouz_Change_Password_Failed.html");
}

?>
<form method="get" action="Medi-Mouz_Landing.php">
    <input type="hidden" name="uname" value="$uname">
    <input type="submit">
</form>
		</h2>
	</div>
</div>		

</body>
</html>
