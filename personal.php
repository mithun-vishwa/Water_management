<html>
<head>
<link rel="stylesheet" type="text/css" href="adm.css">
<style>
body{ 
  	border: 10px double black;
    background-image: url("a.jpg");
    background-repeat: no-repeat;
	}
</style>
<title>Coimbatore City Water Wastage Prevention</title>
</head>
<body>
<div class="navbar">
<font size=5>
  <a href="home.html">Home</a>&nbsp &nbsp &nbsp &nbsp
  <div class="dropdown">
  <button class="dropbtn">Complaints</button>
  <div class="dropdown-content">
    <a href="public.html">Personal</a>
    <a href="personal.php">Public</a>
  </div>
  </div>&nbsp &nbsp &nbsp &nbsp
  <a href="about.html">About</a>&nbsp &nbsp &nbsp &nbsp
<br>
</font>
</div>
<h1 align="center">PUBLIC WATER LEAKAGE COMPLAINTS</h1><br>
<h2 align="center">Enter the required details:</h2>
<br><br>
<form style="text-align:center" action="personal.php" method="POST" enctype="multipart/form-data">
<b>
<font color="red" size="4">
Name:
<input type="text" name="name" required>
<br><br>
Email:
<input type="text" name="mail" >
<br><br>
Mobile no:
<input type="text" name="num" maxlength=10>
<br><br>
Complaint description:
<textarea name="desc" rows=5 cols=40 required></textarea>
<br><br>
Address:
<textarea name="add" rows=5 cols=40 required></textarea>
<br><br>
Add Photo:
<input type="file" name="file" accept="image/*">
<br><br>
</b>
</font>
<input type="submit" name="submit1"  >
</form>
<?php
	$servername='localhost';
	$user = 'root';
	$password = '';
	$mysql_database = 'user';
	$msg='Error:Email is  already registered';
	$db = mysqli_connect($servername, $user, $password, $mysql_database);
	if (!$db) {
      die("Connection failed: " .mysqli_connect_error());
			}
			// print_r($_POST);
	if(isset($_POST["submit1"]) && !empty($_FILES["file"]["name"]))
	{
	$name=$_POST['name'];
	$mail=$_POST['mail'];
    $phone=$_POST['num'];
	$description=$_POST['desc'];
	$add=$_POST['add'];
	//File upload
	$targetDir = "uploads/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	$random = time()*uniqid();	
	if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
		{
			$sql="INSERT INTO login() VALUES()";
            // Insert image file name into database
            $insert = $db->query("INSERT into login(name,mail,number,description,addr,file_name, uploaded_on,ref_id) 
			VALUES ('$name','$mail','$phone','$description','$add','".$fileName."', NOW(),$random)");
            if($insert){
				if(mysqli_query($db, $sql))
				{						
				echo "<center><b>Your complaint has been submitted. \n Your reference ID is:".$random."</b></center>";
				}
				else 
				{
				echo "Error: " . $sql . "<br>" . mysqli_error($db);
				}
            }
		}	
	}	
mysqli_close($db);
?>
</body>
</html>	