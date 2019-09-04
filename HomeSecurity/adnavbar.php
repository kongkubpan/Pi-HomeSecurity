<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet"  href="/HomeSecurity/bootstrap/bootstrap.min.css">
    <script src="http://localhost/HomeSecurity/bootstrap/bootstrap.min.js"></script>

    <style>
        body{
            font-family: Courgette;
        }
        .submit{
            background-color: purple;
            color:white;
            text-size:24px;
            padding: 6px;
            border-radius: 5px;
            border:1px solid white;
            font-size: 24px;
        }
        .submit:hover{
            background-color: white;
            color: purple;
            box-shadow: 0px 0px 20px white;
        }
        h1{
            font-size: 14px;
        }

        td,th{
            padding: 4px;
            text-align: center;
        }
    </style>

</head>
<body>
    <div class="container-fliud">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">HomeSecurity Admin</a>
                </div>

                <div class="collapse navbar-collapse" id="nav">
                <ul class="nav navbar-nav">
                    <li class=""><a href="#">Admin</a></li>
                    <li><a href="http://localhost/HomeSecurity/admember.php">Member </a></li>
                    <!-- <li><a href="http://localhost/HomeSecurity/admemberupdate.php">Member update </a></li> -->
                    <li><a href="http://localhost/HomeSecurity/adcamera.php">Camera </a></li>
                    <!-- <li><a href="http://localhost/HomeSecurity/adcameraupdate.php">Camera Update </a></li> -->
                    <li><a href="http://localhost/HomeSecurity/adcameratype.php">Camera Type </a></li>
                    <!-- <li><a href="http://localhost/HomeSecurity/adcameratypeupdate.php">Camera Type Update </a></li> -->
                    <li><a href="http://localhost/HomeSecurity/aduser.php">User </a></li>
                    <!-- <li><a href="http://localhost/HomeSecurity/aduserupdate.php">User Update </a></li> -->
                    <li><a href="http://localhost/HomeSecurity/adlocationcam.php">Location Camera </a></li>
                    <!-- <li><a href="http://localhost/HomeSecurity/adlocationcamupdate.php">Location Camera Update </a></li> -->
                    <li><a href="http://localhost/HomeSecurity/adcontact.php">Contact </a></li>
                    <!-- <li><a href="http://localhost/HomeSecurity/adcontactupdate.php">Contact Update </a></li> -->
                    <li><a href="http://localhost/HomeSecurity/adcontrollock.php">Control Lock </a></li>
                    <!-- <li><a href="http://localhost/HomeSecurity/adcontrollockupdate.php">Control Lock Update </a></li> -->
                    <li class="active"><a href="http://localhost/HomeSecurity">Logout</a></li>
                </ul>
                </div>
            </div>
        </nav>
    </div>
    
</body>
</html>