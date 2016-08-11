<?php
session_start();
require('View/changeView.php');
require('Model/sqlModel.php');

$view = new View();
$sql = new Model();

if(isset($_GET["action"])){
	$action = $_GET["action"];
}else{
	$action = "";
}

if($action == ""){
	$view->getView("View/tpl/header",$data);
	$view->getView("View/tpl/home",$data);
	$view->getView("View/tpl/footer",$data);
}else if($action == "register"){
	// the "p" before each var stands for preg.

	$un = $_POST["username"];
	$pun = '/^[a-zA-Z0-9]+$/';
	
	//this regex might be a little overkill...
	$em = $_POST["email"];
	$pem = '/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/';
	
	$pw = $_POST["password"];
	$ppw = '/^[a-zA-Z0-9]+$/';
	
	if(!preg_match($pun, $un)){
		$view->getView("View/tpl/header");
		echo "invalid username entered.";
		$view->getView("View/tpl/footer");

	}else if(!preg_match($pem, $em)){
		$view->getView("View/tpl/header");
		echo "invalid email entered";
		$view->getView("View/tpl/footer");

	}else if(!preg_match($ppw, $pw)){
		$view->getView("View/tpl/header");
		echo "invalid password";
		$view->getView("View/tpl/footer");

	}else{
		$sql->register($_POST["username"],$_POST["email"],$_POST["password"]);
		$view->getView("View/tpl/header");
		$view->getView("View/tpl/loggedInHome");
		$view->getView("View/tpl/footer");
	}
}

?>