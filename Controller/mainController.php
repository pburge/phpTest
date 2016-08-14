<?php
session_start();
define ('SITE_ROOT', realpath(dirname(__FILE__)));

require('Model/viewModel.php');
require('Model/sqlModel.php');
require('Model/resizeModel.php');

$view = new View();
$sql = new Model();
$img = new imgResize();

if(isset($_GET["action"])){
	$action = $_GET["action"];
}else{
	$action = "";
}

if($action == ""){
	$data = $sql->showImages();
	
	$view->getView("View/tpl/header");
	$view->getView("View/tpl/home",$data);
	$view->getView("View/tpl/footer");
}else if($action == 'newaccount') {
	$view->getView("View/tpl/header");
	$view->getView("View/tpl/registration");
	$view->getView("View/tpl/footer");
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
		// v------------------v remove when done testing login
	}/*else if(!empty($sql->dupeCheck($_POST["username"],$_POST["email"]))) {
		$view->getView("View/tpl/header");
		echo 'Duplicate username and/or email detected!';
		$view->getView("View/tpl/footer");

	}*/else{
		$sql->register($_POST["username"],$_POST["email"],$_POST["password"]);
		$view->getView("View/tpl/header");
		$view->getView("View/tpl/registered");
		$view->getView("View/tpl/footer");
	}
}else if ($action == 'login') {
	if($sql->login($_POST["username"],$_POST["password"])){
		$view->getView("View/tpl/header");
		$view->getView("View/tpl/loggedInHome");
		$view->getView("View/tpl/footer");
	}else{
		$view->getView("View/tpl/header");
		echo 'access denied. please check your username or password and try again';
		$view->getView("View/tpl/footer");
	}
}else if($action == 'upload'){
	
	$uploaddir = '/var/www/html/phpTest/img/';
	$uploadfile = $uploaddir . rand(1,50) . basename($_FILES["userfile"]["name"]);
	$resize_file = "img/resize_" . rand(1,50) . basename($_FILES["userfile"]["tmp_name"]);

	$extension = pathinfo($uploadfile, PATHINFO_EXTENSION);

	if(move_uploaded_file($_FILES["userfile"]["tmp_name"],$uploadfile)){
		$new_file = $resize_file.'.'.$extension;
		$img->imageResize($uploadfile,$new_file,200,200);
		$sql->upload('dwa',$uploadfile,$new_file,date("Y-m-d"),date("h:ia"));

		$view->getView("View/tpl/header");
		$view->getView("View/tpl/success");
		$view->getView("View/tpl/footer");

	}else{
		echo "file not uploaded.<br>";
	}
	
}

?>