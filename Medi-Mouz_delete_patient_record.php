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
			<span><a href="Medi-Mouz_Logged_In.html">Home</a> | 
			<a href="Medi-Mouz_Documentation.pdf" target="_blank">Documentation</a> 
			| 
			<a href="Medi-Mouz_Team_LoggedIn.html">The Medi-Mouz Team</a>
			| 
			<a href="Medi-Mouz_TermsOfService_LoggedIn.html">Terms of Service</a></span>
		</div>
		<div class="ml-auto w-75 p-2">
			
		</div>
		<div class="ml-auto float-right w-25 p-2">
			<span><a href="Medi-Mouz_landing.php">Dashboard</a>
			|
			<a href="Medi-Mouz_LoggedOut.php">Log Out</a></span>
			

		</div>
	</div>
</div>

<div style="background-color:#002f42" class="container-fluid p-3 text-white text-center">
</div>

<div class="mx-auto rounded border-success mt-5" style="width:1000px;">

	<div style="background-color:#002f42; height:600px;" class="bg-gradient container ml-5 mr-5 mb-5 p-5 my-5 border rounded border-success"> 

	<h2 class="bland"> 				
		<div style="padding:2px 5px 2px 120px; width:600px" class="imgcontainer">
			<img src="medi-mouz.png" alt="Avatar" class="avatar">
		<br><br>
		</div>
				</h2>

		<h1 style="font-size:20px; font-family: Calibri, sans-serif;">
			<div style="font-size:20px; margin-top:60px; width:900px; color:white" class="bg-gradient container-fluid ml-0 mr-5 mb-5 p-5 my-5 border rounded border-success text-left">

				<p style="font-size:16px; padding:2px 5px 2px 300px; width:600px"> 
				<a href="Medi-Mouz_existing.php" class="link-info">View other records</a></p> 
			
			<?php
// Create database connection
$con = mysqli_connect('localhost', 'Medi-Mouz', 'admin@medi-mouz2021','medi-mouz');
$uname = $_SESSION["uname"];
$DocId = $_SESSION["DocId"];
$pfname = $_SESSION["fname"];
$plname = $_SESSION["lname"];
		

				
//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
$sql = "DELETE FROM `patient` WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
$result = mysqli_query($con, $sql);
			
if ($result) {
	$done = " <font-size ='10px'>Patient's record have successfully been deleted </font>";
	echo $done;
}

?>
			</div>
		</div></h1>


	</div>




</body>
</html>
