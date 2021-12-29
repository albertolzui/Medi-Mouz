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
if ($uname == "") {
	header("location: Medi-Mouz_LogIn.html");
}


$sql = "SELECT Pat_Id, Pat_FName, Pat_LName FROM `patient` WHERE `Pat_FName` = '$fname' AND `Pat_LName` = '$lname'";

// database 
$result = mysqli_query($con, $sql);
/* Get the number of rows in the result set */
$row_cnt = mysqli_fetch_row($result);
$_SESSION["Pat_Id"] = $row_cnt[0];
$Pat_Id = $_SESSION["Pat_Id"];

if ($row_cnt) {
	header("location: Medi-Mouz_newPatient2_update_dependencies.php");
}
	
?>

		</h2>
	</div>
</div>	

</body>
</html>