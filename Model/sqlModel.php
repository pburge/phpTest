<?php

class Model{
	public function register($username='',$email='',$password=''){
		$salt = '5abCWD8v0uqiowXyLcXWQDtSKBCJDqZz7102g7OIjtpu6ThJUbV0S28O8lt27lV';
		$password = md5($password.$salt);

		$db = new PDO("mysql:hostname=localhost; dbname=pBurge", "root","root");
		$sql = "INSERT INTO pb_users(username,email,password)
				VALUES(:username,:email,:password)";
		$st = $db->prepare($sql);
		$st->execute(array(":username"=>$username,":email"=>$email,":password"=>$password));
	}

}

?>