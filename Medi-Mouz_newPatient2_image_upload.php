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
  <script src="Medi-Mouz.js"></script>
</head>
<body style="background-color:#f2f3f4">

<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'Medi-Mouz', 'admin@medi-mouz2021','medi-mouz');

// get the post records

$uname = $_SESSION["uname"];
$password = $_SESSION["password"];
$DocId = $_SESSION["DocId"];
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$Pat_Id = $_SESSION["Pat_Id"];
if ($uname == "") {
	header("location: Medi-Mouz_LogIn.html");
}

?>

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
			<span><a href="Medi-Mouz_Home_Logged_In">Home</a> | 
			<a href="Medi-Mouz_Documentation.html">Documentation</a> 
			| 
			<a href="Medi-Mouz_Team.html">The Medi-Mouz Team</a>
			| 
			<a href="Medi-Mouz_TermsOfService.html">Terms of Service</a></span>
		</div>
		<div class="ml-auto w-75 p-2">
			
		</div>
		<div class="ml-auto float-right w-25 p-2">
			<span>
			<a href="Medi-Mouz_LoggedOut.php">Log Out</a></span>
		</div>
	</div>
</div>
<div style="background-color:#002f42" class="container-fluid p-3 text-white text-center">
</div>

<div class="mx-auto rounded border-success mt-5" style="width:600px;">

	<div style="background-color:#002f42;" class="bg-gradient container ml-5 mr-5 mb-5 p-5 my-5 border rounded border-success"> 
	<h2 style="color:white" class="bland2"> Create new patient record <br> Step 2- Upload Medical Imaging<br><a href="Medi-Mouz_existing.php">Skip this step</a></h2>
		<div style="color:white" class="p-5">
		
		<form action="Medi-Mouz_newPatient2_image_upload_insert.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="size" value="1000000">
			<div class="mb-5">
				<input type="file" name="image">
			</div>
			<div class="mb-5">
				<textarea 
					id="text" 
					cols="40" 
					rows="4" 
					name="image_text"
					class="form-control"		
					placeholder="Say something about this image..."></textarea>
			</div>
			<br>
				<button style="width:410px; background-color:#00c2cb;" type="submit" name ="upload" class="btn">SAVE   &nbsp       AND &nbsp      CONTINUE</button>
			<br><br>
		</form>

		</div>
	</div>
</div>





</body>
</html>
