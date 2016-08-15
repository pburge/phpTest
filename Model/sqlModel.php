<?php

class Model{

	public function dupeCheck($user,$email){
		$db = new PDO("mysql:hostname=localhost; dbname=pBurge", "root","root");
		$sql = "SELECT username,email FROM pb_users WHERE username = :username OR email = :email";
		$st = $db->prepare($sql);
		$st->execute(array(":username"=>$user,":email"=>$email));
		return $st->fetchAll();
	}

	public function register($username='',$email='',$password=''){
		$salt = '5abCWD8v0uqiowXyLcXWQDtSKBCJDqZz7102g7OIjtpu6ThJUbV0S28O8lt27lV';
		$password = md5($password.$salt);

		$db = new PDO("mysql:hostname=localhost; dbname=pBurge", "root","root");
		$sql = "INSERT INTO pb_users(username,email,password)
				VALUES(:username,:email,:password)";
		$st = $db->prepare($sql);
		$st->execute(array(":username"=>$username,":email"=>$email,":password"=>$password));
		if(!isset($_SESSION["user"])){
			$_SESSION["user"] = $username;
		}
	}

	public function login($username='',$password=''){
		$salt = '5abCWD8v0uqiowXyLcXWQDtSKBCJDqZz7102g7OIjtpu6ThJUbV0S28O8lt27lV';
		$password = md5($password.$salt);

		$db = new PDO("mysql:hostname=localhost; dbname=pBurge", "root","root");
		$sql = "SELECT username FROM pb_users WHERE username = :username AND password = :password";
		$st = $db->prepare($sql);
		$st->execute(array(":username"=>$username,":password"=>$password));

		if(!isset($_SESSION["user"])){
			$_SESSION["user"] = $username;
		}

		return $st->fetchAll();
	}

	public function upload($username='',$image_f='',$image_r='',$date_u='', $time_u='',$description=''){
		$db = new PDO("mysql:hostname=localhost;dbname=pBurge","root","root");
		$sql = "INSERT INTO pb_uploads(username,image_full,image_resized,date_uploaded,time_uploaded,description)
				VALUES (:username,:image_f,:image_r,:date_u,:time_u,:description)";
		$st = $db->prepare($sql);
		$st->execute(array(":username"=>$username,":image_f"=>$image_f,":image_r"=>$image_r,":date_u"=>$date_u,":time_u"=>$time_u,":description"=>$description));
		return $st->fetchAll();
	}

	public function showAllImages(){
		$db = new PDO("mysql:hostname=localhost;dbname=pBurge", "root","root");
		$st = $db->prepare("select * from pb_uploads");
		$st->execute();
		return $st->fetchAll();
	}

	public function showUserImages($username=''){
		$db = new PDO("mysql:hostname=localhost;dbname=pBurge", "root","root");
		$st = $db->prepare("select * from pb_uploads where username = :username");
		$st->execute(array(":username"=>$username));
		return $st->fetchAll();
	}
}

?>