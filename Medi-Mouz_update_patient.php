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
			<span><a href="Medi-Mouz_Home_Logged_In">Home</a> | 
			<a href="Medi-Mouz_Documentation.pdf" target="_blank">Documentation</a> 
			| 
			<a href="Medi-Mouz_Team_LoggedIn.html">The Medi-Mouz Team</a>
			| 
			<a href="Medi-Mouz_TermsOfService_LoggedIn.html">Terms of Service</a></span>
		</div>
		<div class="ml-auto w-75 p-2">
			
		</div>
		<div class="ml-auto float-right w-25 p-2">
			<span>
			<a href="Medi-Mouz_newPatient.php">Create New Record</a></span>
		</div>
	</div>
</div>


<div class="mx-auto rounded border-success mt-5" style="width:600px;">

	<div style="background-color:#002f42; height:400px;" class="bg-gradient container ml-5 mr-5 mb-5 p-5 my-5 border rounded border-success"> 

	<h2 class="bland"> 				
		<div class="imgcontainer">
			<img src="medi-mouz.png" alt="Avatar" class="avatar">
		</div> Record successfully updated.<br> <a href="Medi-Mouz_existing.php" class="link-info">View all existing records</a></p> 
		
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'Medi-Mouz', 'admin@medi-mouz2021','medi-mouz');

// get the post records
$uname = $_SESSION["uname"];
$password = $_SESSION["password"];
$DocId = $_SESSION["DocId"];
$hfname = $_POST['hfname'];
$age = $_POST['age'];
$vax = $_POST['vax'];
$weight = $_POST['weight'];
$chkup = $_POST['chkup'];
$appt = $_POST['appt'];
$hpi = $_POST['hpi'];
$pmh = $_POST['pmh'];
$obj = $_POST['obj'];
$assess = $_POST['assess'];
$plan = $_POST['plan'];
$ddx = $_POST['ddx'];
$pfname = $_SESSION["fname"];
$plname = $_SESSION["lname"];


if ($uname == "") {
	header("location: Medi-Mouz_LogIn.html");
}

// database insert SQL code
$sql = "UPDATE `patient` SET `Pat_Age` = '$age', `Pat_Vac_Status` = '$vax', `Pat_Weight` = '$weight',  `chkup` = '$chkup', `appt` = '$appt',  `hpi` ='$hpi', `pmh` = '$pmh', `obj` = '$obj', `assess` = '$assess', `plan` = '$plan', `ddx` = '$ddx' WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'" ;

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs) {
	header("Location:Medi-Mouz_fetch_patient_record_from_update.php");
}

?>

		</h2>
	</div>
</div>	

</body>
</html>