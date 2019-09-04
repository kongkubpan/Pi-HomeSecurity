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
    <title>VDO Record</title>
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

        .theme{
          font-size:18px;
          text-align:center;
          border-bottom:1px solid #ccc;
          padding:10px 0px;
          margin-bottom:10px;
          font-weight: bold;
          background-color:#ffffff;
        }

        .media.media-video{
            margin-bottom:10px;
        }
        .media.media-video .thumb{
            position:relative;
            width:250px;
            margin-right:10px;
            text-decoration:none;
        }
        .media.media-video .thumb img{
            width:100%;
        }
        .media.media-video .thumb .duration{
            position:absolute;
            display:block;
            bottom:5px;
            right:5px;
            color:#fff;
            background-color:#000;
            font-size:0.8rem;
            padding:4px;
            -webkit-transition:0.2s linear opacity;
        }
        .media.media-video .thumb:hover .duration{
            opacity:0.3;
        }
        .media.media-video .media-body .media-heading{
            font-size:1.2rem;
            color:#454545;
            text-decoration:none;
        }
        .media.media-video .media-body .media-heading:hover{
            color:#000;
        }
        .media.media-video .media-body .meta{
            color:#999;
        }
        .media.media-video .media-body .meta a{
            color:#777;
        }
        .media.media-video .media-body .desc{
            color:#999;
        }
        .jumbotron{
            background-color:#ffffff;
            border:1px solid #AAA;
            border-bottom:3px solid #BBB;
            padding:5px;
            margin-top:0px;
            overflow:hidden;
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            font-family: 'Roboto', sans-serif;
            -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);    
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
                  <a class="nav-link active" href="vdorecord.php">
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
              <h1 class="h2">VDO Record</h1>
            </div>
      
            <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
            <!-- <h6 class="h2" >ทอฝันเอาหน้านี้ไปทำด้วยพี่ทำไม่เป็น นะ</h6>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/l9mJbpB_wkc"></iframe>
            </div> -->
            
            
            <center><div class="">
              <iframe width="560" height="315" 
                      src="https://www.youtube.com/embed/XcDUkSrh0w0" 
                      frameborder="0" 
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                      allowfullscreen name="preview">
              </iframe>
            </div></center>
            <br>
            <br>
            <br>
            <div class="container">
              <div class="row videos">

              <?php
              require './connect.php';
              if ($_SESSION['id']==""){
                header('location:index.php');
              }
              //print_r ($_SESSION['mem_no']);
              if ($_SESSION['mem_no']=="")
              {
                  echo "ไม่มีข้อมูล VIDEO";
              }
              else
              {
                  $a = $_SESSION['mem_no'];
                  //echo $a;
                  $dir_path = "Video/$a/";
                  $extensions_array = array('jpg','png','jpeg');
                  if(is_dir($dir_path))
                  {
                      $files = scandir($dir_path);
                      
                      for($i = 0; $i < count($files); $i++)
                      {
                          if($files[$i] !='.' && $files[$i] !='..')
                          {
                              // get file name
                              //echo "File Name -> $files[$i]<br>";
                              
                              // get file extension
                              $file = pathinfo($files[$i]);
                              $extension = $file['extension'];
                              //echo "File Extension-> $extension<br>";
                              
                              // check file extension

                          }
                      }
                  }

                ?>

                <?php for($i = 0; $i < (count($files)); $i++) {?>
                  <?php if($files[$i] !='.' && $files[$i] !='..')
                          {?>

                    <div class="jumbotron">
                    <div class="col-md-12">
                        <div class="media media-video">
                            <a href="#" class="media-lef thumb">
                                <img src="https://via.placeholder.com/336x188/FF5D73/fff?text=Video%20Thumbnail">
                                <span class="duration">00:00:00</span>
                            </a>
                            <div class="media-body">
                                <a href="http://localhost/HomeSecurity/Video/<?php echo $a ?>/<?php echo $files[$i] ?>" class="media-heading" target="preview"><?php echo $files[$i] ?></a>
                                <div class="meta"><a href="#" class="author">VideoUploaderUsername</a> • 808K views • 2 years ago</div>
                                <div class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <?php } ?>
                <?php } ?>
              <?php } ?>

              </div>
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
    <script src="feather.js"></script></body>


</body>
</html>