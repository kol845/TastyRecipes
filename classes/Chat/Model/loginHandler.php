


<?php
require './resources/fragments/init.php';
$file = "./database/logindata.txt";
$document = file_get_contents($file);
$lines = explode("\n",$document);


$message="";
if(!empty($_POST["username"])) {
	$loginExists = False;
	foreach($lines as $loginEntity){

		$logindata = explode(":",$loginEntity);
		$logindata[1] =preg_replace('/\s+/', '', $logindata[1]);
		if($logindata[0]==$_POST["username"] and ($logindata[1]==$_POST["password"])){
			$loginExists = True;
			break;
		}

	}
	if($loginExists) {
		session_start();
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['loggedin']= true;
		include VIEWS.'index.php';
	}
	else {
		$message = "Invalid Username or Password!";
		include VIEWS.'login.php';
	}
	}
else{
$message = "Invalid Username or Password!";
include VIEWS.'login.php';
}
?>
