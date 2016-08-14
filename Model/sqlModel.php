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
	}

	public function login($username='',$password=''){
		$salt = '5abCWD8v0uqiowXyLcXWQDtSKBCJDqZz7102g7OIjtpu6ThJUbV0S28O8lt27lV';
		$password = md5($password.$salt);

		$db = new PDO("mysql:hostname=localhost; dbname=pBurge", "root","root");
		$sql = "SELECT username FROM pb_users WHERE username = :username AND password = :password";
		$st = $db->prepare($sql);
		$st->execute(array(":username"=>$username,":password"=>$password));
		return $st->fetchAll();
	}

	public function upload($username='',$image_f='',$image_r='',$date_u='', $time_u=''){
		$db = new PDO("mysql:hostname=localhost;dbname=pBurge","root","root");
		$sql = "INSERT INTO pb_uploads(username,image_full,image_resized,date_uploaded,time_uploaded)
				VALUES (:username,:image_f,:image_r,:date_u,:time_u)";
		$st = $db->prepare($sql);
		$st->execute(array(":username"=>$username,":image_f"=>$image_f,":image_r"=>$image_r,":date_u"=>$date_u,":time_u"=>$time_u));
		return $st->fetchAll();
	}

	public function showImages(){
		$db = new PDO("mysql:hostname=localhost;dbname=pBurge", "root","root");
		$st = $db->prepare("select * from pb_uploads");
		$st->execute();
		return $st->fetchAll();
	}

}

?>