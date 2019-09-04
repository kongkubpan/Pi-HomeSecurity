<?php 
session_start();
ob_start();
?>
            <?php
                require './connect.php'; //เรียกไฟลคอนเน็กมาอ่าน ถ้า ERRER จะไม่ RUN ต่อ
                if ($_SESSION['id']==""){
                  header('location:index.php');
                }

                $a = $_SESSION['mem_no'];
                // $sql = " SELECT * FROM camera WHERE mem_no = '$a' ";
                // $result = mysqli_query($conn,$sql);
                // $member = mysqli_fetch_assoc($result);
                //print_r ($result);
                //print_r ($member);

                $sql = " SELECT *  FROM camera AS d1
                INNER JOIN locationcam  AS d2
                ON  (d1.location_no = d2.location_no) 
                WHERE `mem_no` LIKE '$a' ";
                $result = mysqli_query($conn,$sql);
                //$memberANDlocal = mysqli_fetch_assoc($result);
                
                
                //print_r ($result);
                //print_r ($memberANDlocal);

                // SELECT *  FROM camera AS d1
                // INNER JOIN camera_usage_status  AS d2
                // ON  (d1.cam_no = d2.cam_no) 
                // INNER JOIN locationcam  AS d3
                // ON  (d1.location_no = d3.location_no) WHERE `mem_no` LIKE 'M001'

            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camera</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- <link href="/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
    <link href="dashboard.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
   <!-- เปิดใช้ฟังชั่น -->
   
    <script type="text/javascript">
        
        $(document).ready(function(){ 

          <?php if ($result) { 
              while ($record=mysqli_fetch_assoc($result)){ ?>     //วนสคริปด้วย PHP โดยนำค่ามาจาก Database การ จอยตาราง

                $('#Right<?php echo $record['cam_no'] ?>').click(function(){  //ฟังชันก์ที่โดนเรียกโดย ID ของปุ่ม
                        var a = new XMLHttpRequest();
                        a.open("GET","http://<?php echo $record['ip address'] ?>/right.php");
                        a.send();
                        var b = new XMLHttpRequest();
                        b.open("GET","http://localhost/HomeSecurity/time.php?q=" + "<?php echo $record['cam_no'] ?>", true);
                        b.send();
                        console.log("Right");

                });

                $('#Center<?php echo $record['cam_no'] ?>').click(function(){
                        var a = new XMLHttpRequest();
                        a.open("GET","http://<?php echo $record['ip address'] ?>/center.php");
                        a.send();
                        var b = new XMLHttpRequest();
                        b.open("GET","http://localhost/HomeSecurity/time.php?q=" + "<?php echo $record['cam_no'] ?>", true);
                        b.send();
                        console.log("Center");

                });

                $('#Left<?php echo $record['cam_no'] ?>').click(function(){
                        var a = new XMLHttpRequest();
                        a.open("GET","http://<?php echo $record['ip address'] ?>/Left.php");
                        a.send();
                        var b = new XMLHttpRequest();
                        b.open("GET","http://localhost/HomeSecurity/time.php?q=" + "<?php echo $record['cam_no'] ?>", true);
                        b.send();
                        console.log("Left");

                });
                <?php }?> 
                <?php }?>
        });
        
    </script>


    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
        
    </style>
</head>


<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Home Security</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="index.php">Sign out</a>
          </li>
        </ul>
    </nav>

    <!-------------------- nav bar ------------------------>
      
    <div class="container-fluid">
        <div class="row">

          <!------------- MENU bar--------------->
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="profile.php">
                      <span data-feather="settings"></span>
                      User Profile
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link active" href="camera.php">
                    <span data-feather="camera"></span>
                    Camera
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="vdorecord.php">
                    <span data-feather="video"></span>
                    VDO Record
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="door.php">
                    <span data-feather="sidebar"></span>
                    Door
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="alam.php">
                    <span data-feather="alert-triangle"></span>
                    Alam
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="setting.php">
                    <span data-feather="settings"></span>
                    Setting
                  </a>
                </li>
              </ul>
              
            </div>
          </nav>  
          <!------------- MENU bar--------------->

          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Camera Control</h1>
            </div>
      
            <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
            <?php
                require './connect.php'; //เรียกไฟลคอนเน็กมาอ่าน ถ้า ERRER จะไม่ RUN ต่อ
                $a = $_SESSION['mem_no'];
                // $sql = " SELECT * FROM camera WHERE mem_no = '$a' ";
                // $result = mysqli_query($conn,$sql);
                // $member = mysqli_fetch_assoc($result);
                //print_r ($result);
                //print_r ($member);

                $sql = " SELECT *  FROM camera AS d1
                INNER JOIN locationcam  AS d2
                ON  (d1.location_no = d2.location_no) 
                WHERE `mem_no` LIKE '$a' ";
                $result = mysqli_query($conn,$sql);
                //$memberANDlocal = mysqli_fetch_assoc($result);
                
                
                //print_r ($result);
                //print_r ($memberANDlocal);

                // SELECT *  FROM camera AS d1
                // INNER JOIN camera_usage_status  AS d2
                // ON  (d1.cam_no = d2.cam_no) 
                // INNER JOIN locationcam  AS d3
                // ON  (d1.location_no = d3.location_no) WHERE `mem_no` LIKE 'M001'

            ?>

            <!-- ------------------!!!!!!----------------------- -->
            <?php if ($result) { 
                while ($record=mysqli_fetch_assoc($result)){ ?>

                <div>
                <center/>
                <h6 class="h2" >Camera Live Strem <?php echo $record['location_name'] ?></h6>
                <img style="-webkit-user-select: none;" src="http://<?php echo $record['ip address'] ?>:5000/video_viewer">
                
                <!-- <iframe width="800" height="600" 
                          src="http://<?php echo $record['ip address'] ?>:5000/video_viewer" 
                          frameborder="0" 
                          name="preview">
                </iframe> -->
                </div>

                <br>
                <br>

                <!------------- Buttons--------------->
                <div><center>
                    <div class="container-fluid">
                    <!-- <form class="form" method="post" action="camera.php" enctype="multipart/form-data" > -->
                      <button type="button" id="Right<?php echo $record['cam_no'] ?>" name="Right<?php echo $record['cam_no'] ?>" class="btn btn-primary"  >Right Button</button>
                      <button type="button" id="Center<?php echo $record['cam_no'] ?>" name="Center<?php echo $record['cam_no'] ?>" class="btn btn-primary"  >Center Button</button>
                      <button type="button" id="Left<?php echo $record['cam_no'] ?>" name="Left<?php echo $record['cam_no'] ?>" class="btn btn-primary" >Left Button</button>
                    <!-- </form> -->
                    </div>
                </center></div>
                <br>
                <br><br>
                <br><br>
                <br><br>
                <br><br>
                <br>
            <?php }?> 
            <?php }?>
            <!------------- !!!!!!! --------------->
            

          </main>
        </div>
    </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
    <script src="feather.js"></script></body>


</body>
</html>