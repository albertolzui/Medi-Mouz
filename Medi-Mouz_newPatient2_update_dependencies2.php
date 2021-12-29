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
$img_id = $_SESSION["img_id"];
if ($uname == "") {
	header("location: Medi-Mouz_LogIn.html");
}

$sql = "INSERT INTO `patient_images` (`Pat_Id`, `img_id`) VALUES ('$Pat_Id', '$img_id')";

// insert in database 
$rs = mysqli_query($con, $sql);

if ($rs) {
	header("location: Medi-Mouz_existing.php");
}


?>

		</h2>
	</div>
</div>	

</body>
</html>