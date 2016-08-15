<?php
session_start();

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
	$data = $sql->showAllImages();

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
		
		echo '<div class="mb20"></div>';
		echo "<h2 class='text-center'>Invalid username entered<br><a href='/phpTest/?action=newaccount'>Please head back and try again!</a></h2>";

		echo '<div class="mb20"></div>';
		
		$view->getView("View/tpl/footer");

	}else if(!preg_match($pem, $em)){
		$view->getView("View/tpl/header");
		
		echo '<div class="mb20"></div>';
		echo "<h2 class='text-center'>Invalid email entered<br><a href='/phpTest/?action=newaccount'>Please head back and try again!</a></h2>";

		echo '<div class="mb20"></div>';
		
		$view->getView("View/tpl/footer");

	}else if(!preg_match($ppw, $pw)){
		$view->getView("View/tpl/header");
		
		echo '<div class="mb20"></div>';
		echo "<h2 class='text-center'>Invalid password<br><a href='/phpTest/?action=newaccount'>Please head back and try again!</a></h2>";

		echo '<div class="mb20"></div>';
		
		$view->getView("View/tpl/footer");
		
	}else if(!empty($sql->dupeCheck($_POST["username"],$_POST["email"]))) {
		$view->getView("View/tpl/header");
		echo "<h2 class='text-center'>Username and/or email is already in use!<br><a href='/phpTest/?action=newaccount'>Please head back and try again!</a></h2>";
		$view->getView("View/tpl/footer");

	}else{
		$sql->register($_POST["username"],$_POST["email"],$_POST["password"]);
		$data = $_SESSION['user'];
		$view->getView("View/tpl/header",$data);
		$view->getView("View/tpl/profile",$data);
		$view->getView("View/tpl/footer");
	}
}else if ($action == 'login') {
	if($sql->login($_POST["username"],$_POST["password"])){

		if ($sql->showUserImages($_SESSION['user'])) {
			$data = $sql->showUserImages($_SESSION['user']);
		}else{
			$data = $_SESSION['user'];
		}

		$view->getView("View/tpl/header",$data);
		$view->getView("View/tpl/profile",$data);
		$view->getView("View/tpl/footer");
	}else{
		session_destroy();
		$view->getView("View/tpl/header");
		echo '<h2 class="text-center">Access Denied.<br><a href="/phpTest">Please check your username or password and try again</a></h2>';
		$view->getView("View/tpl/footer");
	}
}else if ($action == 'profile') {
	$data = $sql->showUserImages($_SESSION['user']);

	$view->getView("View/tpl/header",$data);
	$view->getView("View/tpl/profile",$data);
	$view->getView("View/tpl/footer");

}else if($action == 'upload'){
	
	$uploaddir = 'img/';
	$uploadfile = $uploaddir . rand(1,50) . basename($_FILES["userfile"]["name"]);
	$resize_file = "img/resize_" . rand(1,50) . basename($_FILES["userfile"]["tmp_name"]);

	$extension = pathinfo($uploadfile, PATHINFO_EXTENSION);

	if(move_uploaded_file($_FILES["userfile"]["tmp_name"],$uploadfile)){
		$new_file = $resize_file.'.'.$extension;
		$img->imageResize($uploadfile,$new_file,200,200);
		$sql->upload($_SESSION['user'],$uploadfile,$new_file,date("Y-m-d"),date("h:ia"),$_POST['description']);
		header('Location: /phpTest');
		exit;

	}else{

		$view->getView("View/tpl/header");
		echo '<h2 class="text-center">File not uploaded.<br><a href="/phpTest/?action=profile">Uh oh! Your image might either be too big (Over 5mb)
		<br>or the wrong type! Please go back and try again!</a></h2>';
		$view->getView("View/tpl/footer");
	}
	
}else if($action == 'logout'){
	session_destroy();
	$_SESSION['is_open'] == FALSE;
	$_SESSION["username"] = '';	

		header('Location: /phpTest');

}

?>