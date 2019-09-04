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
                $result1 = mysqli_query($conn,$sql);
                $result2 = mysqli_query($conn,$sql);
                $result3 = mysqli_query($conn,$sql);

                //$memberANDlocal = mysqli_fetch_assoc($result);
                
                
                //print_r ($result);
                //print_r ($memberANDlocal);

                // SELECT *  FROM camera AS d1
                // INNER JOIN camera_usage_status  AS d2
                // ON  (d1.location_no = d2.location_no) 
                // INNER JOIN locationcam  AS d3
                // ON  (d1.location_no = d3.location_no) WHERE `mem_no` LIKE 'M001'

            ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alam</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- <link href="/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
    <link href="dashboard.css" rel="stylesheet">
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

        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 33px;    
      }

      .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }

      input:checked + .slider {
        background-color: #2196F3;
      }

      input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      /* Rounded sliders */
      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }

      .btn {
      border: 2px solid black;
      background-color: white;
      color: black;
      padding: 14px 28px;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
      }

      /* Green */
      .success {
        border-color: #4CAF50;
        color: green;
      }

      .success:hover {
        background-color: #4CAF50;
        color: white;
      }

      /* Blue */
      .info {
        border-color: #2196F3;
        color: dodgerblue;
      }

      .info:hover {
        background: #2196F3;
        color: white;
      }

      /* Orange */
      .warning {
        border-color: #ff9800;
        color: orange;
      }

      .warning:hover {
        background: #ff9800;
        color: white;
      }

      /* Red */
      .danger {
        border-color: #f44336;
        color: red;
      }

      .danger:hover {
        background: #f44336;
        color: white;
      }

      /* Gray */
      .default {
        border-color: #e7e7e7;
        color: black;
      }

      .default:hover {
        background: #e7e7e7;
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
                  <a class="nav-link" href="camera.php">
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
                  <a class="nav-link active" href="alam.php">
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
              <h1 class="h2">Alam Setting</h1>
            </div>
            <div class="row">

              <div class="">
                <div class="card" style="width: 30rem;">
                  <div class="card-header">
                    <h3>Alert List</h3>
                  </div>

                  <ul class="list-group list-group-flush" ><h5>
                      <li class="list-group-item" style="padding-top:15px;height: 54px;" >Buzzer Alert</li>
                      <li class="list-group-item" style="padding-top:20px;height: 54px;" >SMS Send</li>

                  </h5></ul>

                </div>
                </div>
                <!-- -----------------------------------------คอลลั่ม----------------------------------------- -->
                <div class="">
                  <div class="card" style="width: 21rem;"><center>
                    <div class="card-header">
                      <h3>Control</h3>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="padding-top:5px;height: 64px;" >
                        <div class="row">
                            <div class="column" style="width: 10rem;">
                                <button class="btn success" onclick="ennablebuzzer()" >Enable</button>
                            </div>
                            <div class="column" style="width: 10rem;">
                                <button class="btn danger" onclick="disablebuzzer()" >Disable</button>
                            </div>
                        </div>
                        </li>
                        <li class="list-group-item" style="padding-top:5px;height: 65px; " >
                        <div class="row">
                        <div class="column" style="width: 10rem;">
                                <button class="btn success" onclick="ennablemms()" >Enable</button>
                            </div>
                            <div class="column" style="width: 10rem;">
                                <button class="btn danger" onclick="disablemms()" >Disable</button>
                            </div>
                        </div>
                        </li>
                    </ul>

                    <script>
                          function ennablebuzzer() { //ฟังชั่น ออนคลิก
                              <?php if ($result) { 
                              while ($record=mysqli_fetch_assoc($result)){ ?>
                                  var <?php echo $record['location_no'] ?> = new XMLHttpRequest();
                                  <?php echo $record['location_no'] ?>.open("GET","http://<?php echo $record['ip address'] ?>/buzzeron.php");
                                  <?php echo $record['location_no'] ?>.send();
                                  console.log("Change status");
                              <?php }?> 
                              <?php }?>

                          }
                          function disablebuzzer() { //ฟังชั่น ออนคลิก
                              <?php if ($result1) { 
                              while ($record=mysqli_fetch_assoc($result1)){ ?>
                                  var <?php echo $record['location_no'] ?> = new XMLHttpRequest();
                                  <?php echo $record['location_no'] ?>.open("GET","http://<?php echo $record['ip address'] ?>/buzzeroff.php");
                                  <?php echo $record['location_no'] ?>.send();
                                  console.log("Change status");
                              <?php }?> 
                              <?php }?>
                          }               
                          function ennablemms() { //ฟังชั่น ออนคลิก
                              <?php if ($result2) { 
                              while ($record=mysqli_fetch_assoc($result2)){ ?>
                                  var <?php echo $record['location_no'] ?> = new XMLHttpRequest();
                                  <?php echo $record['location_no'] ?>.open("GET","http://<?php echo $record['ip address'] ?>/mmson.php");
                                  <?php echo $record['location_no'] ?>.send();
                                  console.log("Change status");
                              <?php }?> 
                              <?php }?>

                          }
                          function disablemms() { //ฟังชั่น ออนคลิก
                              <?php if ($result3) { 
                              while ($record=mysqli_fetch_assoc($result3)){ ?>
                                  var <?php echo $record['location_no'] ?> = new XMLHttpRequest();
                                  <?php echo $record['location_no'] ?>.open("GET","http://<?php echo $record['ip address'] ?>/mmsoff.php");
                                  <?php echo $record['location_no'] ?>.send();
                                  console.log("Change status");
                              <?php }?> 
                              <?php }?>
                          }               

                          
                    </script>

                  </center></div>
                </div>


            </div>

            <!-- ------------------------------------------------------------------------------------------- -->
            <!-- --------------------------------------------------------------------------------------- -->

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