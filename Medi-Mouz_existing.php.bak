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
			<a href="Medi-Mouz_Documentation_LoggedIn.html">Documentation</a> 
			| 
			<a href="Medi-Mouz_Team_LoggedIn.html">The Medi-Mouz Team</a>
			| 
			<a href="Medi-Mouz_TermsOfService_LoggedIn.html">Terms of Service</a></span>
		</div>
		<div class="ml-auto w-75 p-2">
			
		</div>
		<div class="ml-auto float-right w-25 p-2">
			<span><a href="Medi-Mouz_newPatient.php">Add New</a>
			|
			<a href="Medi-Mouz_LoggedOut.php">Log Out</a></span>
		</div>
	</div>
</div>

<div style="background-color:#002f42" class="container-fluid p-3 text-white text-center">
</div>

<div class="mx-auto rounded border-success mt-5" style="width:800px;">

	<div style="background-color:#002f42; height:1200px;" class="bg-gradient container ml-5 mr-5 mb-5 p-5 my-5 border rounded border-success"> 

	<h2 class="bland"> 				
		<div style="padding:2px 5px 2px 60px; width:500px" class="imgcontainer">
			<img src="medi-mouz.png" alt="Avatar" class="avatar">
		<br><br>
		</div><p style="padding:2px 5px 2px 60px; width:500px; font-size:16px"> These are the patient records that you currently administer.<br> 
		<a href="Medi-Mouz_newPatient.php" class="link-info">Click here to create new record</a></p> 
				</h2>

		<h1 style="font-size:20px" class="bland">
			<div style="font-size:20px; margin-top:100px; width:500px; color:white" class="bg-gradient container-fluid ml-5 mr-5 mb-5 p-5 my-5 border rounded border-success text-left"><p style="color:#00c2cb">Patient Full Name(s):<br></p>
				<?php
				// Create database connection
				$con = mysqli_connect('localhost', 'Medi-Mouz', 'admin@medi-mouz2021','medi-mouz');

				$uname = $_SESSION["uname"];
				$DocId = $_SESSION["DocId"];


				if ($uname == "") {
					header("location: Medi-Mouz_LogIn.html");
				}
				
				$entry = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry))
					{	
					$column = (array)$row;	
					$breach = implode("   ", $column);
					$bloom = substr($breach,0,9);
					if ($bloom == "Pat_Id   ") {
						$bloom = "P/Nr.";
						//echo $bloom . " ";
					}
					if ($bloom == "Pat_FName") {
						$bloom = "First Name";
						//echo $bloom . " ";
					}
					if ($bloom == "Pat_LName") {
						$bloom = "Last Name";
						//echo $bloom . " ";
					}
					if ($bloom == "Pat_Age  ") {
						break;
					}				
					echo $bloom . "  &nbsp; &nbsp; &nbsp; &nbsp;   ";
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql = "SELECT DISTINCT patient.Pat_Id, doctor.DocId, patient.Pat_FName, patient.Pat_LName FROM `patient`, `doctor` INNER JOIN `doctor_records_patient` WHERE doctor_records_patient.Doc_ID = doctor.DocId AND doctor_records_patient.Pat_ID = patient.Pat_Id AND doctor.DocId = '$DocId'";
				$result = mysqli_query($con, $sql);

				while($row = mysqli_fetch_array($result))
					{
					echo $row['Pat_Id'] . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " . $row['Pat_FName'] . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " . $row['Pat_LName']; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}


				?>
			</div><div style="font-size:20px; margin-top:100px; width:500px" class="bg-gradient container-fluid ml-5 mr-5 mb-5 p-5 my-5 border rounded border-success text-left"><p style="color:#00c2cb">Input first and last name here to fetch record:<br></p>
			<form action="Medi-Mouz_fetch_patient_record.php" method="post" enctype="multipart/form-data">

				<div class="mb-5">
					<label for="fname" class="form-label">Patient's First Name:</label>
					<input type="text" placeholder="Enter patient's first name" name="fname" class="form-control" required>
				</div>
				<div class="mb-5">
					<label for="lname" class="form-label">Patient's Last Name/Surname:</label>
					<input type="text" placeholder="Enter patient's Last Name/Surname:" name="lname" class="form-control" required>
				</div>
				<button style=" font-size:20px; width:400px; background-color:#00c2cb;" type="submit" class="btn">Fetch   &nbsp       Patient &nbsp      Record</button>
				<br><br>
			</form>
			</div>
		</div></h1>
	</div>
</div>	



</body>
</html>