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
			<span><a href="Medi-Mouz_Home_Logged_In.html">Home</a> | 
			<a href="Medi-Mouz_Documentation_LoggedIn.html">Documentation</a> 
			| 
			<a href="Medi-Mouz_Team_LoggedIn.html">The Medi-Mouz Team</a>
			| 
			<a href="Medi-Mouz_TermsOfService_LoggedIn.html">Terms of Service</a></span>
		</div>
		<div class="ml-auto w-75 p-2">
			
		</div>
		<div class="ml-auto float-right w-25 p-2">
			<span><a href="Medi-Mouz_LoggedOut.php">Log Out</a>
		</div>
	</div>
</div>



<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'Medi-Mouz', 'admin@medi-mouz2021','medi-mouz');

// get the post records

$uname = $_SESSION["uname"];
$password = $_SESSION["password"];

if ($uname == "") {
	header("location: Medi-Mouz_LogIn.html");
}

// database insert SQL code
$sql = "SELECT DocId, first_name, last_name FROM `doctor` WHERE `username` = '$uname' AND `password` = '$password'";

// database 
$result = mysqli_query($con, $sql);
/* Get the number of rows in the result set */
$row_cnt = mysqli_fetch_row($result);
$_SESSION["DocId"] = $row_cnt[0];
$DocId = $_SESSION["DocId"];
echo  "                 Welcome " . $row_cnt[1] . " "; 
echo " " . $row_cnt[2] . " ";

?>


<div style="background-color:#002f42" class="container-fluid p-3 text-white text-center">
</div>

<div style="background-color:#f2f3f4; margin-top:50px" class="container-fluid p-4 text-white text-center">
<a style="width:410px; color:#f2f3f4; background-color:#00c2cb;" class="btn" href="Medi-Mouz_existing.php" role="button">View Existing Records</a></div>
<!--- <img src="medi-mouz2.png" class="rounded float-end" alt="mm logo"> --->
<div style="background-color:#f2f3f4; margin-top:20px" class="container-fluid p-4 text-white text-center">
<a style="width:410px; color:#f2f3f4; background-color:#00c2cb;" class="btn" href="Medi-Mouz_newPatient.php" role="button">Add New Patient Record</a></div>



</body>
</html>
