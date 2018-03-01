<?php
session_start();
include("include/util.php");

$dbpath = dbpath();
$login= $_POST["login"];
$password = $_POST["password"];
$loginpath = "$dbpath/$login";
//check login:
$accounts = glob("$dbpath/*");
if(empty( trim($login) ) ){//empty login
	header("Location: error.php?type=nologin");
	die();
}
else{
	foreach ($accounts as $account) {
	//1 check account
		if($account === "$dbpath/$login"){
			$info=file("$loginpath/info.txt",FILE_IGNORE_NEW_LINES);
			//2 check password
			if($info[0] === $password){//psw right
				$_SESSION["login"] =$login;//remumber value only if the psw is right
				header("Location: notes.php");
				die();
			}
			else{//psw error
				header("Location: error.php?type=login2");
				die();
			}
		}
	}
	//account error
	header("Location: error.php?type=login1");
}		
?>