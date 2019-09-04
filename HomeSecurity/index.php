<?php 
session_start();
unset($_SESSION['id']);
session_destroy();
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <style>
            body {
            font-family: Arial, Helvetica, sans-serif;
            }

            * {
            box-sizing: border-box;
            }

            /* style the container */
            .container {
            position: relative;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px 0 30px 0;
            } 

            /* style inputs and link buttons */
            input,
            .btn {
            width: 100%;
            padding: 12px;s
            border: none;
            border-radius: 4px;
            margin: 5px 0;
            opacity: 0.85;
            display: inline-block;
            font-size: 17px;
            line-height: 20px;
            text-decoration: none; /* remove underline from anchors */
            }

            input:hover,
            .btn:hover {
            opacity: 1;
            }

            /* add appropriate colors to fb, twitter and google buttons */
            .fb {
            background-color: #3B5998;
            color: white;
            }

            .twitter {
            background-color: #55ACEE;
            color: white;
            }

            .google {
            background-color: #dd4b39;
            color: white;
            }

            /* style the submit button */
            input[type=submit] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            }

            input[type=submit]:hover {
            background-color: #45a049;
            }

            /* Two-column layout */
            .col {
            float: center;
            width: 50%;
            margin: auto;
            padding: 0 50px;
            margin-top: 6px;
            }

            .col1 {
            float: left;
            width: 50%;
            margin: auto;
            padding: 0 50px;
            margin-top: 6px;
            }

            /* Clear floats after the columns */
            .row:after {
            content: "";
            display: table;
            clear: both;
            }

            /* vertical line */
            .vl {
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            border: 2px solid #ddd;
            height: 175px;
            }

            /* text inside the vertical line */
            .vl-innertext {
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 50%;
            padding: 8px 10px;
            }

            /* hide some text on medium and large screens */
            .hide-md-lg {
            display: none;
            }

            /* bottom container */
            .bottom-container {
            text-align: center;
            background-color: #666;
            border-radius: 0px 0px 4px 4px;
            }

            /* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 650px) {
            .col {
                width: 100%;
                margin-top: 0;
            }
            /* hide the vertical line */
            .vl {
                display: none;
            }
            /* show the hidden text on small screens */
            .hide-md-lg {
                display: block;
                text-align: center;
            }
            }
    </style>

</head>
    <body>
         <?php
            
            include_once('connect.php');
            
            if (isset($_POST['submit'])) {
                
                $username = $_POST['username'];
                $password = $conn->real_escape_string($_POST['password']);
                $sql = "SELECT *  FROM member 
                WHERE `id` = '".$username."' AND `Mpassword` = '".$password."'";
                $result = $conn->Query($sql);
                #echo print_r($result);
                if($result->num_rows> 0){
                    $rowmem = $result->fetch_assoc();
                    echo $rowmem['name'];
                    $_SESSION['id'] = $rowmem['id'];
                    $_SESSION['name'] = $rowmem['name'];
                    $_SESSION['mem_no'] = $rowmem['mem_no'];
                    // echo $row['name'];
                    if($rowmem['id']=="admin"){  //ถ้าเป็นadmin
                        header('location:admember.php');
                    }else{
                        header('location:profile.php');  //ถ้าไม่ใช่admin
                    }
                }else {
                    echo "Username and Password is invalid";
                }
                
            }
            
        ?>
                
        <div class="container">
            <form action="" method="POST">
                <div>
                <h2 style="text-align:center">Home Security Login</h2>
                <div class="col" >
                
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" >
                    <input type="submit" name="submit" value="Login">
                
                </div>
                </div>
            </form>
        </div>

        <div class="bottom-container">
            <div class="row">
                
                <a href="register.php" style="color:white" class="btn">Sign up</a>
                
                <!---<div class="col1">
                <a href="#" style="color:white" class="btn">Forgot password?</a>
                </div>-->
            </div>
        </div>
 
    </body>
</html>