<?php 
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dash Board</title>
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
        
      </style>
</head>


<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Home Security</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" id="signout" href="index.php">Sign out</a>
          </li>
        </ul>
    </nav>
      
      <div class="container-fluid">
        <div class="row">
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="dashboard.php">
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
      
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Dash Board</h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                
              </div>
            </div>
      
            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
      
            <h2>List</h2>

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

            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>MEMBER ID</th>
                    <th>CAMERA NAME</th>
                    <th>CAMERA TYPE</th>
                    <th>LOCATION ON</th>
                    <th>LOCATION NAME</th>
                    <th>IP ADDRESS</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if ($result) { 
                      while ($record=mysqli_fetch_assoc($result)){ ?>
                  
                      <tr>
                        <td> <?php echo $record['mem_no'] ?></td>
                        <td> <?php echo $record['cam_name'] ?></td>
                        <td> <?php echo $record['camtype_no'] ?></td>
                        <td> <?php echo $record['location_no'] ?></td>
                        <td> <?php echo $record['location_name'] ?></td>
                        <td> <?php echo $record['ip address'] ?></td>
                      </tr>
                      
                    <?php }?> 
                    <?php }?>
                    
                </tbody>
              </table>
            </div>

          </main>
        </div>
      </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="dashboard.js"></script></body>


</body>
</html>