<?php
session_start();
?>

		
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

$sql = "INSERT INTO `doctor_records_patient` (`Doc_ID`, `Pat_ID`) VALUES ('$DocId', '$Pat_Id')";

// insert in database 
$rs = mysqli_query($con, $sql);

if ($rs) {
	header("location: Medi-Mouz_newPatient2_image_upload.php");
}


?>

		</h2>
	</div>
</div>	

</body>
</html>