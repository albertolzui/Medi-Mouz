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
			<span>
			<a href="Medi-Mouz_LoggedOut.php">Log Out</a></span>
		</div>
	</div>
</div>


<div class="mx-auto rounded border-success mt-5" style="width:600px;">

	<div style="background-color:#002f42; height:400px;" class="bg-gradient container ml-5 mr-5 mb-5 p-5 my-5 border rounded border-success"> 

	<h2 class="bland"> 				
		<div class="imgcontainer">
			<img src="medi-mouz.png" alt="Avatar" class="avatar">

<?php
  // Create database connection
$con = mysqli_connect('localhost', 'Medi-Mouz', 'admin@medi-mouz2021','medi-mouz');

$uname = $_SESSION["uname"];
$password = $_SESSION["password"];
$DocId = $_SESSION["DocId"];
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$Pat_Id = $_SESSION["Pat_Id"];
if ($uname == "") {
	header("location: Medi-Mouz_LogIn.html");
}

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($con, $_POST['image_text']);

  	// image file directory
	$target = "images/".basename($image);

	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
	mysqli_query($con, $sql);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  	$msg = "Image uploaded successfully";
	}else{
  	$msg = "Failed to upload image";
	}
}
$result = mysqli_query($con, "SELECT * FROM images");
$rage = mysqli_query($con, "SELECT id, image, image_text FROM `images` WHERE `image_text` = '$image_text'");
$row_cnt = mysqli_fetch_row($rage);
$_SESSION["img_id"] = $row_cnt[0];
$img_id = $_SESSION["img_id"];

if ($row_cnt) {
	header("location: Medi-Mouz_newPatient2_update_dependencies2.php");
}
?>

//<?php
    //while ($row = mysqli_fetch_array($result)) {
      //echo "<div id='img_div'>";
      	//echo "<img src='images/".$row['image']."' >";
      	//echo "<p>".$row['image_text']."</p>";
      //echo "</div>";
    //}
//?>

		</h2>
	</div>
</div>	

</body>
</html>