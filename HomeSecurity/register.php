<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet"  href="/HomeSecurity/bootstrap/bootstrap.min.css">
    <script src="/HomeSecurity/bootstrap/bootstrap.min.js"></script>

    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box}

        /* Full-width input fields */
        input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        }

        hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
        }

        /* Set a style for all buttons */
        button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        }

        button:hover {
        opacity:1;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
        }

        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn, .signupbtn {
        float: left;
        width: 50%;
        }

        /* Add padding to container elements */
        .container {
        padding: 16px;
        }

        /* Clear floats */
        .clearfix::after {
        content: "";
        clear: both;
        display: table;
        }

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
        .cancelbtn, .signupbtn {
            width: 100%;
        }
        }
    </style>

</head>
<body>

<?php

$a="";
$b="";
$c="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
include'connect.php';

//get data from the form
function getData()
{
  $data = array();

  $data[0]=$_POST['a'];

  $data[1]=$_POST['b'];
  $data[2]=$_POST['c'];
  return $data;
}

//insert
if(isset($_POST['insert'])){
	$info = getData();
	$insert_query="INSERT INTO `member`(`mem_no`, `mem_name`, `id`, `Mpassword`,`mail`,`address_name`,`city`,postcode) VALUES ('','','$info[0]','$info[1]','$info[2]','','','')";
	try{
		$insert_result=mysqli_query($conn, $insert_query);
		if($insert_result)
		{
			if(mysqli_affected_rows($conn)>0){
				echo("data inserted successfully");

			}else{
				echo("data are not inserted");
			}
		}
	}catch(Exception $ex){
		echo("error inserted".$ex->getMessage());
	}
}

?>
    <form method ="post" action="" style="border:1px solid #ccc">
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="a" required>

            <label for="psw"><b>User ID</b></label>
            <input type="text" placeholder="User ID" name="b" required>

            <label for="psw-repeat"><b>Password</b></label>
            <input type="password" placeholder="Password" name="c" required>
            
            <!-- <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label> -->
            
            <!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->

            <div class="clearfix">
            <button type="button" class="cancelbtn" onclick="location.href='index.php' ">Cancel</button>

            <button type="submit" class="signupbtn" name="insert" >Sign Up</button>
            </div>
        </div>
    </form>



    <!-- --------------------------------------------------------------------------------- -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <!-- --------------------------------------------------------------------------------- -->
</body>
</html>