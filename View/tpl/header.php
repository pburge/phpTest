<?php
//header
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paul Burge</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/material-kit.css" rel="stylesheet"/>
    <link href="css/main.css" rel="stylesheet"/>
</head>
<body>

<!-- Navbar will come here -->
<nav class="navbar navbar-default navbar-fixed-top navbar-color-on-scroll" role="navigation">
	<div class="container">
    	<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
    		</button>
    		<a href="/phpTest/">
    		     <div class="logo-container">
    		          <div class="logo">
    		              <img src="img/logo.png" width="100px" height="80px">
    		          </div>
    		      </div>
    			
    		<div class="ripple-container"></div></a>
    	</div>

    	<div class="collapse navbar-collapse" id="navbar-collapse">
    		<ul class="nav navbar-nav navbar-right" style="padding-top: 15px;">
<!--         		<li>
	        		<form class="form-group" name='login' action="?action=login" method="post" accept-charset="utf-8">
	        			<input class='form-control' type="text" name="username" placeholder='username' autocomplete="false">
	        			<input class='form-control' type="password" name="password" placeholder='password' autocomplete="false">
	        			<button type="submit" class='btn btn-info'>login</button>
	        		</form>
        		</li>  -->    
        		<!-- <li>Login:</li>   		 -->
        		
        		<li>
        		<form name='login' action="?action=login" method="post" accept-charset="utf-8">
        			<div class="col-sm-4">

        				<div class="form-group label-floating">

        					<label class="control-label">Enter Username:</label>
        					<input type="text" class="form-control" name="username">
        				</div>
        			</div>
        			<div class="col-sm-4">
        				<div class="form-group label-floating">
        					<label class="control-label">Enter Password:</label>
        					<input type="password" class="form-control" name="password">
        				</div>
        			</div>
        			<button type="submit" class='btn btn-info'>login</button>
        		</li>
        		</form>
        		<li><a href="?action=newaccount">click here to make a new account</a></li>
    		</ul>
    	</div>

	</div>
</nav>
<!-- end navbar -->

<div class="wrapper">
	<div class="header">

	</div>
	<!-- you can use the class main-raised if you want the main area to be as a page with shadows -->
	<div class="main main-raised">
		<div class="container">