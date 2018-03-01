<?php
include("include/util.php");
$dbpath = dbpath();
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$login = trim($_POST["login"]);
$password = $_POST["password"];

$accounts = glob("$dbpath/*");

if(empty(trim($firstname))){
	header("Location: error.php?type=firstname");
}
else if(empty(trim($lastname))){
	header("Location: error.php?type=lastname");
}
else if(empty(trim($login))){
	header("Location: error.php?type=logup");
}
else if(empty(trim($password))){
	header("Location: error.php?type=pwdup");
}
else{
	foreach ($accounts as $account) {
		if($account === "$dbpath/$login"){
			header("Location: error.php?type=logupexists");
			die();
		}
	}
	mkdir("$dbpath/$login");
	mkdir("$dbpath/$login/notes");
	$loginpath = "$dbpath/$login";
	file_put_contents("$loginpath/info.txt","$password\n$firstname\n$lastname");
	header("Location: sign_in_form.php");
}
?>