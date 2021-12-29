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
			<a href="Medi-Mouz_newPatient.php">Create New Record</a></span>
		</div>
	</div>
</div>


<div class="mx-auto rounded border-success mt-5" style="width:600px;">

	<div style="background-color:#002f42; height:400px;" class="bg-gradient container ml-5 mr-5 mb-5 p-5 my-5 border rounded border-success"> 

	<h2 class="bland"> 				
		<div class="imgcontainer">
			<img src="medi-mouz.png" alt="Avatar" class="avatar">
		</div> Record successfully created.<br> <a href="Medi-Mouz_existing.php" class="link-info">View all existing records</a></p> 
		
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'Medi-Mouz', 'admin@medi-mouz2021','medi-mouz');

// get the post records
$uname = $_SESSION["uname"];
$password = $_SESSION["password"];
$DocId = $_SESSION["DocId"];
$hfname = $_POST['hfname'];
$_SESSION["fname"] = $_POST['fname'];
$_SESSION["lname"] = $_POST['lname'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$sex = $_POST['flexRadioDefault'];
$mstat = $_POST['mstat'];
$allergies = $_POST['allergies'];
$vax = $_POST['vax'];
$weight = $_POST['weight'];
$ssn = $_POST['ssn'];
$ins_nr = $_POST['ins_nr'];
$chkup = $_POST['chkup'];
$appt = $_POST['appt'];
$pnum = $_POST['pnum'];
$pocc = $_POST['pocc'];
$phadd = $_POST['phadd'];
$email = $_POST['email'];
$hpi = $_POST['hpi'];
$pmh = $_POST['pmh'];
$obj = $_POST['obj'];
$assess = $_POST['assess'];
$plan = $_POST['plan'];
$invs = $_POST['invs'];
$ddx = $_POST['ddx'];
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
if ($uname == "") {
	header("location: Medi-Mouz_LogIn.html");
}

// database insert SQL code
$sql = "INSERT INTO `patient` (`hfname`, `Pat_FName`, `Pat_LName`, `dob`, `Pat_Age`, `Pat_Sex`, `mstat`, `Pat_Allergies`, `Pat_Vac_Status`, `Pat_Weight`, `Pat_SSN`, `Pat_Ins_Nr`, `chkup`, `appt`, `pnum`, `pocc`, `phadd`, `email`, `hpi`, `pmh`, `obj`, `assess`, `plan`, `invs`, `ddx`) VALUES ('$hfname','$fname','$lname', '$dob', '$age', '$sex', '$mstat', '$allergies', '$vax', '$weight', '$ssn', '$ins_nr', '$chkup', '$appt', '$pnum', '$pocc', '$phadd', '$email', '$hpi', '$pmh', '$obj', '$assess', '$plan', '$invs', '$ddx')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs) {
	header("Location: Medi-Mouz_newPatient2.php");
}

?>

		</h2>
	</div>
</div>	

</body>
</html>