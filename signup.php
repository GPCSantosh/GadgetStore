<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

<style type="text/css">
/* General Styling */
body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url('https://wallpapercave.com/wp/7l4Jmqt.jpg'); /* Replace with your image URL */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
}

/* Semi-transparent overlay to darken the background */
body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Adjust opacity for readability */
    z-index: -1;
}

/* Container for the form */
#box {
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
    width: 350px;
    padding: 20px;
    text-align: center;
    z-index: 1;
}

/* Heading Style */
#box div {
    font-weight: bold;
    font-size: 30px;
    color: white;
}

/* Input Fields */
#text {
    width: 85%;
    padding: 10px;
    margin: 8px 0;
    display: inline-block;
    border: none;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.8);
    font-size: 16px;
    color: #333;
}

/* Button Style */
#button {
    background-color: #ff5722;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#button:hover {
    background-color: #e64a19;
}

/* Link Style */
a {
    text-decoration: none;
    color: white;
    font-size: 14px;
    transition: color 0.3s;
}

a:hover {
    color: #ffcc00;
}
</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name" placeholder="UserName"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>