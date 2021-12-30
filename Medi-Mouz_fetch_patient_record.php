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
			<a href="Medi-Mouz_Documentation.html">Documentation</a> 
			| 
			<a href="Medi-Mouz_Team.html">The Medi-Mouz Team</a>
			| 
			<a href="Medi-Mouz_TermsOfService.html">Terms of Service</a></span>
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

	<div style="background-color:#002f42; height:2600px;" class="bg-gradient container ml-5 mr-5 mb-5 p-5 my-5 border rounded border-success"> 

	<h2 class="bland"> 				
		<div style="padding:2px 5px 2px 120px; width:600px" class="imgcontainer">
			<img src="medi-mouz.png" alt="Avatar" class="avatar">
		<br><br>
		</div><p style="font-size:16px; padding:2px 5px 2px 300px; width:600px"> 
		<a href="Medi-Mouz_existing.php" class="link-info">View other records</a></p> 
				</h2>

		<h1 style="font-size:20px; font-family: Calibri, sans-serif;">
			<div style="font-size:20px; margin-top:60px; width:900px; color:white" class="bg-gradient container-fluid ml-0 mr-5 mb-5 p-5 my-5 border rounded border-success text-left">
				<?php
				// Create database connection
				$con = mysqli_connect('localhost', 'Medi-Mouz', 'admin@medi-mouz2021','medi-mouz');

				$uname = $_SESSION["uname"];
				$_SESSION["fname"] = $_POST['fname'];
				$_SESSION["lname"] = $_POST['lname'];
				$DocId = $_SESSION["DocId"];
				$pfname = $_SESSION["fname"];
				$plname = $_SESSION["lname"];
				$get_Pat_Id = mysqli_query($con, "SELECT Pat_Id, Pat_Vac_Status FROM `patient` WHERE `Pat_FName` = '$pfname' AND `Pat_LName` = '$plname'");
				$row_cnt = mysqli_fetch_row($get_Pat_Id);
				$_SESSION["Pat_id"] = $row_cnt[0];
				$PatId = $_SESSION["Pat_id"];
				
				
				echo "<font color='#00c2cb'> Patient Record for " . $pfname . " " . $plname . "</font><br><br>";

				if ($uname == "") {
					header("location: Medi-Mouz_LogIn.html");
				}
				if ($pfname == "") {
					header("location: Medi-Mouz_existing.php");
				}				
				if ($plname == "") {
					header("location: Medi-Mouz_existing.php");
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
					echo "<font color='#00c2cb'>" . $bloom . "   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . "</font>";
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result = mysqli_query($con, $sql);

				while($row = mysqli_fetch_array($result))
					{
					echo $row['Pat_Id'] . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; " . $row['Pat_FName'] . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . $row['Pat_LName']; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}


				echo "<br>";
				echo "<hr>";				
				echo "<br>";

				$entry2 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry2))
					{	
					$column2 = (array)$row;	
					$breach2 = implode("             ", $column2);
					$bloom2 = substr($breach2,0,14);
					if ($bloom2 == "Pat_Age       ") {
						$bloom2 = "Age";
						//echo $bloom . " ";
					}
					if ($bloom2 == "Pat_Sex       ") {
						$bloom2 = "Sex";
						//echo $bloom . " ";
					}
					if ($bloom2 == "mstat         ") {
						$bloom2 = "Marital Status";
						//echo $bloom . " ";
					}
					if ($bloom2 == "Pat_Id        ") {
						continue;
					}
					if ($bloom2 == "Pat_FName     ") {
						continue;
					}
					if ($bloom2 == "Pat_LName     ") {
						continue;
					}
					if ($bloom2 == "Pat_Allergies ") {
						break;
					}						
					echo "<font color='#00c2cb'>" . $bloom2 . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql2 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result2 = mysqli_query($con, $sql2);

				while($row = mysqli_fetch_array($result2))
					{
					echo $row['Pat_Age'] . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; " . $row['Pat_Sex'] . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . $row['mstat']; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<br>";

				$entry3 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry3))
					{	
					$column3 = (array)$row;	
					$breach3 = implode("             ", $column3);
					$bloom3 = substr($breach3,0,14);
					if ($bloom3 == "Pat_Allergies ") {
						$bloom3 = "Allergies";
						//echo $bloom . " ";
					}
					if ($bloom3 == "Pat_Vac_Status") {
						$bloom3 = "Vaccination";
						//echo $bloom . " ";
					}
					if ($bloom3 == "Pat_Weight    ") {
						$bloom3 = "Weight";
						//echo $bloom . " ";
					}
					if ($bloom3 == "Pat_Id        ") {
						continue;
					}
					if ($bloom3 == "Pat_FName     ") {
						continue;
					}
					if ($bloom3 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom3 == "Pat_Age       ") {
						continue;
					}
					if ($bloom3 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom3 == "mstat         ") {
						continue;
					}
					if ($bloom3 == "Pat_SSN       ") {
						break;
					}						
					echo "<font color='#00c2cb'>" . $bloom3 . "    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql3 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result3 = mysqli_query($con, $sql3);

				while($row = mysqli_fetch_array($result3))
					{
					echo $row['Pat_Allergies'] . "   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . $row['Pat_Vac_Status'] . "   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . $row['Pat_Weight']; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<br>";

				$entry4 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry4))
					{	
					$column4 = (array)$row;	
					$breach4 = implode("             ", $column4);
					$bloom4 = substr($breach4,0,14);
					if ($bloom4 == "Pat_SSN       ") {
						$bloom4 = "Soc. Sec. Nr.";
						//echo $bloom . " ";
					}
					if ($bloom4 == "Pat_Ins_Nr    ") {
						$bloom4 = "Insurance Nr.";
						//echo $bloom . " ";
					}
					if ($bloom4 == "hfname        ") {
						$bloom4 = "Facility";
						//echo $bloom . " ";
					}
					if ($bloom4 == "Pat_Id        ") {
						continue;
					}
					if ($bloom4 == "Pat_FName     ") {
						continue;
					}
					if ($bloom4 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom4 == "Pat_Age       ") {
						continue;
					}
					if ($bloom4 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom4 == "mstat         ") {
						continue;
					}
					if ($bloom4 == "Pat_Allergies ") {
						continue;
					}
					if ($bloom4 == "Pat_Vac_Status") {
						continue;
					}
					if ($bloom4 == "Pat_Weight    ") {
						continue;
					}						
					if ($bloom4 == "dob           ") {
						break;
					}						
					echo "<font color='#00c2cb'>" . $bloom4 . "    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql4 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result4 = mysqli_query($con, $sql4);

				while($row = mysqli_fetch_array($result4))
					{
					echo $row['Pat_SSN'] . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . $row['Pat_Ins_Nr'] . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . $row['hfname']; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<br>";
				
				$entry5 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry5))
					{	
					$column5 = (array)$row;	
					$breach5 = implode("             ", $column5);
					$bloom5 = substr($breach5,0,14);
					if ($bloom5 == "dob           ") {
						$bloom5 = "D.O.B.";
						//echo $bloom . " ";
					}
					if ($bloom5 == "chkup         ") {
						$bloom5 = "Appt. Date";
						//echo $bloom . " ";
					}
					if ($bloom5 == "appt          ") {
						$bloom5 = "Appt. Time";
						//echo $bloom . " ";
					}
					if ($bloom5 == "Pat_Id        ") {
						continue;
					}
					if ($bloom5 == "Pat_FName     ") {
						continue;
					}
					if ($bloom5 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom5 == "Pat_Age       ") {
						continue;
					}
					if ($bloom5 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom5 == "mstat         ") {
						continue;
					}
					if ($bloom5 == "Pat_Allergies ") {
						continue;
					}
					if ($bloom5 == "Pat_Vac_Status") {
						continue;
					}
					if ($bloom5 == "Pat_Weight    ") {
						continue;
					}						
					if ($bloom5 == "Pat_SSN       ") {
						continue;
					}
					if ($bloom5 == "Pat_Ins_Nr    ") {
						continue;
					}
					if ($bloom5 == "hfname        ") {
						continue;
					}											
					if ($bloom5 == "pnum          ") {
						break;
					}						
					echo "<font color='#00c2cb'>" . $bloom5 . "   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql5 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result5 = mysqli_query($con, $sql5);

				while($row = mysqli_fetch_array($result5))
					{	
					$day = $row['chkup'];
					$time = $row['appt'];
					$apptfmt1 = substr($day,0,13);
					//$apptfmt2 = substr($time,17,6);
					
					echo $row['dob'] . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " . $apptfmt1 . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; " . $time; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}					

				echo "<br>";
				echo "<hr>";				
				echo "<br>";

				$entry6 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry6))
					{	
					$column6 = (array)$row;	
					$breach6 = implode("             ", $column6);
					$bloom6 = substr($breach6,0,14);
					if ($bloom6 == "pnum          ") {
						$bloom6 = "Phone Nr.";
						//echo $bloom . " ";
					}
					if ($bloom6 == "pocc          ") {
						$bloom6 = "Occupation";
						//echo $bloom . " ";
					}
					if ($bloom6 == "phadd         ") {
						$bloom6 = "Home Add.";
						//echo $bloom . " ";
					}
					if ($bloom6 == "Pat_Id        ") {
						continue;
					}
					if ($bloom6 == "Pat_FName     ") {
						continue;
					}
					if ($bloom6 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom6 == "Pat_Age       ") {
						continue;
					}
					if ($bloom6 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom6 == "mstat         ") {
						continue;
					}
					if ($bloom6 == "Pat_Allergies ") {
						continue;
					}
					if ($bloom6 == "Pat_Vac_Status") {
						continue;
					}
					if ($bloom6 == "Pat_Weight    ") {
						continue;
					}						
					if ($bloom6 == "Pat_SSN       ") {
						continue;
					}
					if ($bloom6 == "Pat_Ins_Nr    ") {
						continue;
					}
					if ($bloom6 == "hfname        ") {
						continue;
					}															
					if ($bloom6 == "dob           ") {
						continue;
					}
					if ($bloom6 == "chkup         ") {
						continue;
					}
					if ($bloom6 == "appt          ") {
						continue;
					}							
					if ($bloom6 == "email         ") {
						break;
					}						
					echo "<font color='#00c2cb'>" . $bloom6 . "    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql6 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result6 = mysqli_query($con, $sql6);

				while($row = mysqli_fetch_array($result6))
					{
					echo $row['pnum'] . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; " . $row['pocc'] . "   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  " . $row['phadd']; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<br>";

				$entry7 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry7))
					{	
					$column7 = (array)$row;	
					$breach7 = implode("             ", $column7);
					$bloom7 = substr($breach7,0,14);
					if ($bloom7 == "email         ") {
						$bloom7 = "Email.";
						//echo $bloom . " ";
					}
					if ($bloom7 == "Pat_Id        ") {
						continue;
					}
					if ($bloom7 == "Pat_FName     ") {
						continue;
					}
					if ($bloom7 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom7 == "Pat_Age       ") {
						continue;
					}
					if ($bloom7 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom7 == "mstat         ") {
						continue;
					}
					if ($bloom7 == "Pat_Allergies ") {
						continue;
					}
					if ($bloom7 == "Pat_Vac_Status") {
						continue;
					}
					if ($bloom7 == "Pat_Weight    ") {
						continue;
					}						
					if ($bloom7 == "Pat_SSN       ") {
						continue;
					}
					if ($bloom7 == "Pat_Ins_Nr    ") {
						continue;
					}
					if ($bloom7 == "hfname        ") {
						continue;
					}															
					if ($bloom7 == "dob           ") {
						continue;
					}
					if ($bloom7 == "chkup         ") {
						continue;
					}
					if ($bloom7 == "appt          ") {
						continue;
					}							
					if ($bloom7 == "pnum          ") {					
						continue;
					}							
					if ($bloom7 == "pocc          ") {		
						continue;
					}												
					if ($bloom7 == "phadd         ") {					
						continue;
					}												
					if ($bloom7 == "hpi           ") {
						break;
					}						
					echo "<font color='#00c2cb'>" . $bloom7 . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql7 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result7 = mysqli_query($con, $sql7);

				while($row = mysqli_fetch_array($result7))
					{
					echo $row['email'] . "  &nbsp; &nbsp;   " ; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<br>";


				$entry8 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry8))
					{	
					$column8 = (array)$row;	
					$breach8 = implode("             ", $column8);
					$bloom8 = substr($breach8,0,14);
					if ($bloom8 == "hpi           ") {
						$bloom8 = "History PI";
						//echo $bloom . " ";
					}
					if ($bloom8 == "Pat_Id        ") {
						continue;
					}
					if ($bloom8 == "Pat_FName     ") {
						continue;
					}
					if ($bloom8 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom8 == "Pat_Age       ") {
						continue;
					}
					if ($bloom8 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom8 == "mstat         ") {
						continue;
					}
					if ($bloom8 == "Pat_Allergies ") {
						continue;
					}
					if ($bloom8 == "Pat_Vac_Status") {
						continue;
					}
					if ($bloom8 == "Pat_Weight    ") {
						continue;
					}						
					if ($bloom8 == "Pat_SSN       ") {
						continue;
					}
					if ($bloom8 == "Pat_Ins_Nr    ") {
						continue;
					}
					if ($bloom8 == "hfname        ") {
						continue;
					}															
					if ($bloom8 == "dob           ") {
						continue;
					}
					if ($bloom8 == "chkup         ") {
						continue;
					}
					if ($bloom8 == "appt          ") {
						continue;
					}							
					if ($bloom8 == "pnum          ") {					
						continue;
					}							
					if ($bloom8 == "pocc          ") {		
						continue;
					}												
					if ($bloom8 == "phadd         ") {					
						continue;
					}									
					if ($bloom8 == "email         ") {		
						continue;
					}						
					if ($bloom8 == "pmh           ") {
						break;
					}						
					echo "<font color='#00c2cb'>" . $bloom8 . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql8 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result8 = mysqli_query($con, $sql8);

				while($row = mysqli_fetch_array($result8))
					{
					echo $row['hpi'] . "  &nbsp; &nbsp; &nbsp; "; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<br>";

				$entry9 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry9))
					{	
					$column9 = (array)$row;	
					$breach9 = implode("             ", $column9);
					$bloom9 = substr($breach9,0,14);
					if ($bloom9 == "pmh           ") {
						$bloom9 = "Past MH";
						//echo $bloom . " ";
					}
					if ($bloom9 == "Pat_Id        ") {
						continue;
					}
					if ($bloom9 == "Pat_FName     ") {
						continue;
					}
					if ($bloom9 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom9 == "Pat_Age       ") {
						continue;
					}
					if ($bloom9 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom9 == "mstat         ") {
						continue;
					}
					if ($bloom9 == "Pat_Allergies ") {
						continue;
					}
					if ($bloom9 == "Pat_Vac_Status") {
						continue;
					}
					if ($bloom9 == "Pat_Weight    ") {
						continue;
					}						
					if ($bloom9 == "Pat_SSN       ") {
						continue;
					}
					if ($bloom9 == "Pat_Ins_Nr    ") {
						continue;
					}
					if ($bloom9 == "hfname        ") {
						continue;
					}															
					if ($bloom9 == "dob           ") {
						continue;
					}
					if ($bloom9 == "chkup         ") {
						continue;
					}
					if ($bloom9 == "appt          ") {
						continue;
					}							
					if ($bloom9 == "pnum          ") {					
						continue;
					}							
					if ($bloom9 == "pocc          ") {		
						continue;
					}												
					if ($bloom9 == "phadd         ") {					
						continue;
					}									
					if ($bloom9 == "email         ") {		
						continue;
					}		
					if ($bloom9 == "hpi           ") {		
						continue;
					}							
					if ($bloom9 == "obj           ") {
						break;
					}						
					echo "<font color='#00c2cb'>" . $bloom9 . "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql9 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result9 = mysqli_query($con, $sql9);

				while($row = mysqli_fetch_array($result9))
					{
					echo $row['pmh'] . "  &nbsp; &nbsp;  " ; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<br>";

				$entry10 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry10))
					{	
					$column10 = (array)$row;	
					$breach10 = implode("             ", $column10);
					$bloom10 = substr($breach10,0,14);
					if ($bloom10 == "obj           ") {
						$bloom10= "Objective";
						//echo $bloom . " ";
					}
					if ($bloom10 == "Pat_Id        ") {
						continue;
					}
					if ($bloom10 == "Pat_FName     ") {
						continue;
					}
					if ($bloom10 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom10 == "Pat_Age       ") {
						continue;
					}
					if ($bloom10 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom10 == "mstat         ") {
						continue;
					}
					if ($bloom10 == "Pat_Allergies ") {
						continue;
					}
					if ($bloom10 == "Pat_Vac_Status") {
						continue;
					}
					if ($bloom10 == "Pat_Weight    ") {
						continue;
					}						
					if ($bloom10 == "Pat_SSN       ") {
						continue;
					}
					if ($bloom10 == "Pat_Ins_Nr    ") {
						continue;
					}
					if ($bloom10 == "hfname        ") {
						continue;
					}															
					if ($bloom10 == "dob           ") {
						continue;
					}
					if ($bloom10 == "chkup         ") {
						continue;
					}
					if ($bloom10 == "appt          ") {
						continue;
					}							
					if ($bloom10 == "pnum          ") {					
						continue;
					}							
					if ($bloom10 == "pocc          ") {		
						continue;
					}												
					if ($bloom10 == "phadd         ") {					
						continue;
					}									
					if ($bloom10 == "email         ") {		
						continue;
					}		
					if ($bloom10 == "hpi           ") {		
						continue;
					}							
					if ($bloom10 == "pmh           ") {
						continue;
					}						
					if ($bloom10 == "assess        ") {
						break;
					}											
					echo "<font color='#00c2cb'>" . $bloom10. "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql10 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result10 = mysqli_query($con, $sql10);

				while($row = mysqli_fetch_array($result10))
					{
					echo $row['obj'] . "  &nbsp; &nbsp;  " ; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<br>";

				$entry11 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry11))
					{	
					$column11 = (array)$row;	
					$breach11 = implode("             ", $column11);
					$bloom11 = substr($breach11,0,14);
					if ($bloom11 == "assess        ") {
						$bloom11= "Assessment";
						//echo $bloom . " ";
					}
					if ($bloom11 == "Pat_Id        ") {
						continue;
					}
					if ($bloom11 == "Pat_FName     ") {
						continue;
					}
					if ($bloom11 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom11 == "Pat_Age       ") {
						continue;
					}
					if ($bloom11 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom11 == "mstat         ") {
						continue;
					}
					if ($bloom11 == "Pat_Allergies ") {
						continue;
					}
					if ($bloom11 == "Pat_Vac_Status") {
						continue;
					}
					if ($bloom11 == "Pat_Weight    ") {
						continue;
					}						
					if ($bloom11 == "Pat_SSN       ") {
						continue;
					}
					if ($bloom11 == "Pat_Ins_Nr    ") {
						continue;
					}
					if ($bloom11 == "hfname        ") {
						continue;
					}															
					if ($bloom11 == "dob           ") {
						continue;
					}
					if ($bloom11 == "chkup         ") {
						continue;
					}
					if ($bloom11 == "appt          ") {
						continue;
					}							
					if ($bloom11 == "pnum          ") {					
						continue;
					}							
					if ($bloom11 == "pocc          ") {		
						continue;
					}												
					if ($bloom11 == "phadd         ") {					
						continue;
					}									
					if ($bloom11 == "email         ") {		
						continue;
					}		
					if ($bloom11 == "hpi           ") {		
						continue;
					}							
					if ($bloom11 == "pmh           ") {
						continue;
					}						
					if ($bloom11 == "obj           ") {
						continue;
					}											
					if ($bloom11 == "plan          ") {
						break;
					}											
					echo "<font color='#00c2cb'>" . $bloom11. "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql11 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result11 = mysqli_query($con, $sql11);

				while($row = mysqli_fetch_array($result11))
					{
					echo $row['assess'] . "  &nbsp; &nbsp;  " ; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<br>";

				$entry12 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry12))
					{	
					$column12 = (array)$row;	
					$breach12 = implode("             ", $column12);
					$bloom12 = substr($breach12,0,14);
					if ($bloom12 == "plan          ") {
						$bloom12= "Plan";
						//echo $bloom . " ";
					}
					if ($bloom12 == "Pat_Id        ") {
						continue;
					}
					if ($bloom12 == "Pat_FName     ") {
						continue;
					}
					if ($bloom12 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom12 == "Pat_Age       ") {
						continue;
					}
					if ($bloom12 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom12 == "mstat         ") {
						continue;
					}
					if ($bloom12 == "Pat_Allergies ") {
						continue;
					}
					if ($bloom12 == "Pat_Vac_Status") {
						continue;
					}
					if ($bloom12 == "Pat_Weight    ") {
						continue;
					}						
					if ($bloom12 == "Pat_SSN       ") {
						continue;
					}
					if ($bloom12 == "Pat_Ins_Nr    ") {
						continue;
					}
					if ($bloom12 == "hfname        ") {
						continue;
					}															
					if ($bloom12 == "dob           ") {
						continue;
					}
					if ($bloom12 == "chkup         ") {
						continue;
					}
					if ($bloom12 == "appt          ") {
						continue;
					}							
					if ($bloom12 == "pnum          ") {					
						continue;
					}							
					if ($bloom12 == "pocc          ") {		
						continue;
					}												
					if ($bloom12 == "phadd         ") {					
						continue;
					}									
					if ($bloom12 == "email         ") {		
						continue;
					}		
					if ($bloom12 == "hpi           ") {		
						continue;
					}							
					if ($bloom12 == "pmh           ") {
						continue;
					}						
					if ($bloom12 == "obj           ") {
						continue;
					}							
					if ($bloom12 == "assess        ") {
						continue;
					}								
					if ($bloom12 == "invs          ") {
						break;
					}											
					echo "<font color='#00c2cb'>" . $bloom12. "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql12 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result12 = mysqli_query($con, $sql12);

				while($row = mysqli_fetch_array($result12))
					{
					echo $row['plan'] . "  &nbsp; &nbsp;  " ; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<br>";


				$entry13 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry13))
					{	
					$column13 = (array)$row;	
					$breach13 = implode("             ", $column13);
					$bloom13 = substr($breach13,0,14);
					if ($bloom13 == "invs          ") {
						$bloom13= "Investigative Studies";
						//echo $bloom . " ";
					}
					if ($bloom13 == "Pat_Id        ") {
						continue;
					}
					if ($bloom13 == "Pat_FName     ") {
						continue;
					}
					if ($bloom13 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom13 == "Pat_Age       ") {
						continue;
					}
					if ($bloom13 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom13 == "mstat         ") {
						continue;
					}
					if ($bloom13 == "Pat_Allergies ") {
						continue;
					}
					if ($bloom13 == "Pat_Vac_Status") {
						continue;
					}
					if ($bloom13 == "Pat_Weight    ") {
						continue;
					}						
					if ($bloom13 == "Pat_SSN       ") {
						continue;
					}
					if ($bloom13 == "Pat_Ins_Nr    ") {
						continue;
					}
					if ($bloom13 == "hfname        ") {
						continue;
					}															
					if ($bloom13 == "dob           ") {
						continue;
					}
					if ($bloom13 == "chkup         ") {
						continue;
					}
					if ($bloom13 == "appt          ") {
						continue;
					}							
					if ($bloom13 == "pnum          ") {					
						continue;
					}							
					if ($bloom13 == "pocc          ") {		
						continue;
					}												
					if ($bloom13 == "phadd         ") {					
						continue;
					}									
					if ($bloom13 == "email         ") {		
						continue;
					}		
					if ($bloom13 == "hpi           ") {		
						continue;
					}							
					if ($bloom13 == "pmh           ") {
						continue;
					}						
					if ($bloom13 == "obj           ") {
						continue;
					}							
					if ($bloom13 == "assess        ") {
						continue;
					}	
					if ($bloom13 == "plan          ") {
						continue;
					}						
					if ($bloom13 == "ddx           ") {
						break;
					}											
					echo "<font color='#00c2cb'>" . $bloom13. "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql13 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result13 = mysqli_query($con, $sql13);

				while($row = mysqli_fetch_array($result13))
					{
					echo $row['invs'] . "  &nbsp; &nbsp;  " ; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<br>";

				$entry14 = mysqli_query($con, 'SHOW COLUMNS FROM  `patient`');
				while($row = mysqli_fetch_object($entry14))
					{	
					$column14 = (array)$row;	
					$breach14 = implode("             ", $column14);
					$bloom14 = substr($breach14,0,14);
					if ($bloom14 == "ddx           ") {
						$bloom14= "Differential";
						//echo $bloom . " ";
					}
					if ($bloom14 == "Pat_Id        ") {
						continue;
					}
					if ($bloom14 == "Pat_FName     ") {
						continue;
					}
					if ($bloom14 == "Pat_LName     ") {
						continue;
					}						
					if ($bloom14 == "Pat_Age       ") {
						continue;
					}
					if ($bloom14 == "Pat_Sex       ") {
						continue;
					}
					if ($bloom14 == "mstat         ") {
						continue;
					}
					if ($bloom14 == "Pat_Allergies ") {
						continue;
					}
					if ($bloom14 == "Pat_Vac_Status") {
						continue;
					}
					if ($bloom14 == "Pat_Weight    ") {
						continue;
					}						
					if ($bloom14 == "Pat_SSN       ") {
						continue;
					}
					if ($bloom14 == "Pat_Ins_Nr    ") {
						continue;
					}
					if ($bloom14 == "hfname        ") {
						continue;
					}															
					if ($bloom14 == "dob           ") {
						continue;
					}
					if ($bloom14 == "chkup         ") {
						continue;
					}
					if ($bloom14 == "appt          ") {
						continue;
					}							
					if ($bloom14 == "pnum          ") {					
						continue;
					}							
					if ($bloom14 == "pocc          ") {		
						continue;
					}												
					if ($bloom14 == "phadd         ") {					
						continue;
					}									
					if ($bloom14 == "email         ") {		
						continue;
					}		
					if ($bloom14 == "hpi           ") {		
						continue;
					}							
					if ($bloom14 == "pmh           ") {
						continue;
					}						
					if ($bloom14 == "obj           ") {
						continue;
					}							
					if ($bloom14 == "assess        ") {
						continue;
					}	
					if ($bloom14 == "plan          ") {
						continue;
					}						
					if ($bloom14 == "invs          ") {
						continue;
					}											
					echo "<font color='#00c2cb'>" . $bloom14. "  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " . "</font>";
					
					// ^ access the objects properties
				}
				
				echo "<br>";
				//$sql = "SELECT DISTINCT Pat_Id, Pat_FName, Pat_LName FROM `patient` INNER JOIN `doctor_records_patient` INNER JOIN `doctor` WHERE `DocId` = '$DocId'";
				$sql14 = "SELECT * FROM `patient`WHERE patient.Pat_FName = '$pfname' AND patient.Pat_LName = '$plname'";
				$result14 = mysqli_query($con, $sql14);

				while($row = mysqli_fetch_array($result14))
					{
					echo $row['ddx'] . "  &nbsp; &nbsp;  " ; //these are some of the fields that I have stored in my database table patient
					echo "<br>";
					}

				echo "<br>";
				echo "<hr>";				
				echo "<hr>";				
				echo "<br>";
				
				$result15 = mysqli_query($con, "SELECT id, image, image_text FROM images INNER join patient, patient_images WHERE patient.Pat_Id = patient_images.Pat_Id and patient_images.Pat_Id = $PatId");

				while ($row = mysqli_fetch_array($result15)) 
					{
					echo "<div id='img_div'>";
					echo "<img src='images/".$row['image']."' >";
					echo "<p>".$row['image_text']."</p>";
					echo "</div>";
					}


				?>
			</div><div style="font-size:20px; margin-top:60px; width:300px" class="bg-gradient container-fluid ml-5 mr-5 mb-5 p-3 my-5 border rounded border-success text-left"><p align="center" style="background-color:#002f42; font-size:20px"><a align="center" style="color:#00c2cb" class="btn text-center" href="Medi-Mouz_update_patient_record.php" role="button">Update patient record</a><br><a align="center" style="color:#00c2cb" class="btn text-center" href="Medi-Mouz_delete_patient_record.php" role="button">Delete patient record</a><br></p>
			
			</div>
		</div></h1>
	</div>
</div>	



</body>
</html>



			