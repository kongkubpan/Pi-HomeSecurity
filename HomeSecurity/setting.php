<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setting</title>
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
                  <a class="nav-link" href="alam.php">
                    <span data-feather="alert-triangle"></span>
                    Alam
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="setting.php">
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
              <h1 class="h2">Setting</h1>
            </div>
      
            <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
            <!-- <h6 class="h2" >เดี๋ยวพี่ทำหน้าเดียว อิอิ</h6>             -->

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