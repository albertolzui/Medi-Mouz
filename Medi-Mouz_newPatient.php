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
	<h2 style="color:white" class="bland2"> Create new patient record</h2>
		<div class="p-5">
		
		<form action="Medi-Mouz_newPatient_insert.php" method="post" enctype="multipart/form-data">
			<div class="mb-5">
				<label for="hfname" class="form-label">Health facility name:</label>
				<input type="text" placeholder="Enter health facility name" name="hfname" class="form-control" required>
			</div>
			<div class="mb-5">
				<label for="fname" class="form-label">Patient's First Name:</label>
				<input type="text" placeholder="Enter patient's first name" name="fname" class="form-control" required>
			</div>
			<div class="mb-5">
				<label for="lname" class="form-label">Patient's Last Name/Surname:</label>
				<input type="text" placeholder="Enter patient's Last Name/Surname:" name="lname" class="form-control" required>
			</div>
			<div class="mb-5">				
				<label for="dob" class="form-label">Patient's Date of Birth:</label>
				<input type="date" id="start" name="dob"
						value="2018-07-22"
						min="1900-01-01" max="2021-12-31" class="form-control">
			</div>
			<div class="mb-5">
				<label for="age" class="form-label">Patient's Current Age:</label>
				<input type="text" placeholder="Enter patient's current age:" name="age" class="form-control" required>
			</div>			
			<div class="mb-5">
				<label for="allergies" class="form-label">Patient is allergic to:</label>
				<input type="text" placeholder="Enter all of patient's known allergies" name="allergies" class="form-control" required>
			</div>
			<div class="mb-5">
				<label for="vax" class="form-label">Patient's Vaccination status:</label>
				<input type="text" placeholder="(Not Vaccinated, Fully Vaccinated or Partially Vaccinated)" name="vax" class="form-control" required>
			</div>			
			<div class="mb-5">
				<label for="weight" class="form-label">Patient's Weight:</label>
				<input type="text" placeholder="Enter patient's Weight in Kilograms (Kg):" name="weight" class="form-control" required>
			</div>			
			<div class="mb-5">
				<label for="ssn" class="form-label">Patient's Social Security Number:</label>
				<input type="text" placeholder="Enter patient's Social Security Number:" name="ssn" class="form-control" required>
			</div>			
			<div class="mb-5">
				<label for="ins_nr" class="form-label">Patient's Insurance Number:</label>
				<input type="text" placeholder="Enter patient's Insurance Number:" name="ins_nr" class="form-control" required>
			</div>
			<div class="mb-3">		
				<label class="form-label">Select patient's gender:</label>		
			</div>
			<div style="color:white" class="form-check">
				<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Male">
				<label class="form-check-label" for="flexRadioDefault1" value="Male">
				Male
				</label>
			</div>
			<div style="color:white" class="form-check">
				<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Female">
				<label class="form-check-label" for="flexRadioDefault2" value="Female">
				Female
				</label>
			</div>
			<div style="color:white" class="form-check mb-5">
				<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="Diverse" checked>
				<label class="form-check-label" for="flexRadioDefault3" value="Diverse">
				Diverse
				</label>
			</div>
			<div style="color:white" class="mb-5">							
				<label for="mstat" class="form-label">Patient's Marital Status:</label><br>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="mstat1" name="mstat" value="Married">
					<label class="form-check-label" for="Married"> Married</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="mstat2" name="mstat" value="Single">
					<label class="form-check-label" for="Single"> Single</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="mstat3" name="mstat" value="Separated">
					<label class="form-check-label" for="Separated"> Separated</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="mstat4" name="mstat" value="Divorced">
					<label class="form-check-label" for="Divorced"> Divorced</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="mstat5" name="mstat" value="Widowed">
					<label class="form-check-label" for="Widowed"> Widowed</label>
				</div>
			</div>			
			<div class="mb-5">
				<label for="pnum" class="form-label">Patient's Phone Number:</label>
				<input type="text" placeholder="Enter patient's phone number:" name="pnum" class="form-control" required>
			</div>			
			<div class="mb-5">
				<label for="pocc" class="form-label">Patient's Occupation:</label>
				<input type="text" placeholder="Enter patient's occupation:" name="pocc" class="form-control" required>
			</div>
			<div class="mb-5">
				<label for="phadd" class="form-label">Patient's home address:</label>
				<input type="text" name="phadd" class="form-control" placeholder="Enter your home address">
			</div>
			<div class="mb-5">
				<label for="email" class="form-label">Patient's email address:</label>
				<input type="email" name="email" class="form-control" placeholder="Enter your email address">
			</div>
			<div class="mb-3">
				<label for="medhis" class="form-label">Patient's Medical History:</label>
			</div>
			<div class="mb-5">
				<label for="hpi" class="form-label">Patient's History of Present Illness:</label>
				<textarea placeholder="Enter notes on history of present illness:" name="hpi" class="form-control" required></textarea>
			</div>
			<div class="mb-5">
				<label for="pmh" class="form-label">Patient's Past Medical History:</label>
				<textarea placeholder="Enter notes on patient's past medical history:" name="pmh" class="form-control" required></textarea>
			</div>
			<div class="mb-5">
				<label for="obj" class="form-label">Objective:</label>
				<textarea placeholder="Enter notes on objective physical examination of patient:" name="obj" class="form-control" required></textarea>
			</div>
			<div class="mb-5">
				<label for="assess" class="form-label">Assessment:</label>
				<textarea placeholder="Enter note on patient assessment:" name="assess" class="form-control" required></textarea>
			</div>			
			<div class="mb-5">
				<label for="plan" class="form-label">Plan:</label>
				<textarea placeholder="Enter notes on treatment plan:" name="plan" class="form-control" required></textarea>
			</div>			

			<div class="mb-5">
				<label for="ddx" class="form-label">Differential Diagnosis:</label>
				<textarea placeholder="Enter notes on Differential Diagnosis:" name="ddx" class="form-control" required></textarea>
			</div>				
			<div class="mb-5">				
				<label for="chkup" class="form-label">Next Check-Up appointment date:</label>
				<input type="date" id="start" name="chkup"
						value="2018-07-22"
						min="2022-01-01" max="2023-06-31" class="form-control">
			</div>
			<div class="mb-5">			
				<label for="appt" class="form-label">Choose a time for your meeting:</label>
				<input type="time" id="appt" name="appt"
						min="09:00" max="18:00" class="form-control" required>
				<small class="form-label">Office hours are 9am to 6pm</small>			
			</div>
			<br>

			
			<button style="width:410px; background-color:#00c2cb;" type="submit" class="btn">SAVE   &nbsp       AND &nbsp      CONTINUE</button>
			<br><br>
		</form>

		</div>
	</div>
</div>





</body>
</html>
