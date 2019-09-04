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
    <title>Setting</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- <link href="/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
    <link href="dashboard.css" rel="stylesheet">
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> ทำให้รูปกลม -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> ...
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                    <a class="nav-link active" href="profile.php">
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
          <!------------- MENU bar--------------->

          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Profile</h1>
            </div> -->
      
            <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
            <!-- <h6 class="h2" >เดี๋ยวพี่ทำหน้าเดียว อิอิ</h6>      -->
            <!---------------------------------------------------------------> 
            <?php
                require './connect.php';
                if ($_SESSION['id']==""){
                    header('location:index.php');
                  }
                //require './index.php';
                //include_once('index.php');
                echo $a=$_SESSION['mem_no']; // ส่ง SESSION เข้าตัวแปล
               
                $sql = " SELECT * FROM member WHERE mem_no = '$a' ";
                $sesult = mysqli_query($conn,$sql);
                $member = mysqli_fetch_assoc($sesult);

                $sql = " SELECT * FROM picture WHERE mem_no = '$a' ";
                $sesult = mysqli_query($conn,$sql);
                $picture = mysqli_fetch_assoc($sesult);
                
                // echo $_SESSION['id'];
                // echo $_SESSION['password'];
                // echo $_SESSION['mem_no'];
                //echo $rowmem['id'];          
            ?>
            <!----------------------แก้ไขอัพเดทข้อมูล--------------------------> 
            <?php
                if (isset($_POST['submit'])){
                
                //$mem=$_POST['MemberID'];
                $id=$_POST['Username'];
                $pass=$_POST['Password'];
                $email=$_POST['Email'];
                $name=$_POST['Name'];
                $address=$_POST['Address'];
                $city=$_POST['City'];
                $postcode=$_POST['Postcode'];
                
                
                $sql =" UPDATE member set mem_name='$name',id='$id',mail='$email',address_name='$address',city='$city',postcode=$postcode, Mpassword='$pass' WHERE mem_no = '$a' ";
                $sesult = mysqli_query($conn,$sql);

                    if($sesult){
                        echo "๊UPDATE ข้อมูล เรียบร้อย";                   
                    }
                header('location:profile.php');
                // echo $mem;    
                // echo $id;
                // echo $email;
                // echo $name;
                // echo $address;
                // echo $city;
                // echo $postcode;

                // $sql = " SELECT * FROM member WHERE mem_no = '$a' ";
                // $sesult = mysqli_query($conn,$sql);
                // $member = mysqli_fetch_assoc($sesult);

                }

                
            ?>
            <!---------------------------------------------------------------> 

            <!--------------------------------------------------------------->      
            <div class="section-image" data-image="../../assets/img/bg5.jpg" ;="">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <form class="form" method="post" action="profile.php" enctype="multipart/form-data" >
                                <div class="card ">
                                    <div class="card-header ">
                                        <div class="card-header">
                                            <h4 class="card-title">Profile</h4>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Member ID</label>
                                                    <input type="text" name="MemberID" class="form-control" disabled="" placeholder="MemberID" value= <?php echo $member['mem_no'];?> >
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="Username" class="form-control" placeholder="Username" value= <?php echo $member['id'];?> >
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Password</label>
                                                    <input type="text" name="Password" class="form-control" placeholder="Email" value = <?php echo $member['Mpassword'];?> >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="Name" class="form-control" placeholder="" value= '<?php echo $member['mem_name'];?>' >
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" name="Email" class="form-control" placeholder="Email" value = <?php echo $member['mail'];?> >
                                                </div>
                                            </div>
                                        </div>
                                        


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="Address" class="form-control" value= '<?php echo $member['address_name'];?>' >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="City" class="form-control" placeholder="City" value= <?php echo $member['city'];?> >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input type="number" name="Postcode" class="form-control" placeholder="" value= <?php echo $member['postcode'];?> >
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            <!-- </form> -->
                            
                        </div>

                                <div class="col-md-4">
                                    <div class="text-center">
                                        <img src=<?php echo 'Pic/' . $picture['name'] ?> class="avatar img-circle img-thumbnail" alt="avatar">
                                        <h6>Upload a different photo...</h6>
                                        <input type="file" name="file_img" class="text-center center-block file-upload">
                                        <button type="submit" name="inputpic" class="btn btn-info btn-fill pull-right">Upload PIC</button>
                                    </div></hr><br>
                                </div>


                            </form>
                            <!-- </form> -->

                        <!-- อัพโฟดรูปภาพ ----------------------------------------->
                        <?php
                            if(isset($_POST['inputpic']))
                            {   

                                $msg = "";
                                $msg_class = "";
                                echo "<pre>", print_r($_POST), "</pre>";
                                echo "<pre>", print_r($_FILES), "</pre>";
                                // die();
                                $profileImageName = time() . '-' . $_FILES["file_img"]["name"];
                                // For image upload
                                $target_dir = "Pic/";
                                $target_file = $target_dir . basename($profileImageName);
                                
                                echo $profileImageName.'<br>';
                                echo $target_dir.'<br>';
                                echo $target_file.'<br>';
                                

                                // VALIDATION
                                // validate image size. Size is calculated in Bytes
                                    if($_FILES['file_img']['size'] > 200000) 
                                    {
                                    $msg = "Image size should not be greated than 200Kb";
                                    $msg_class = "alert-danger";
                                    }
                                // check if file exists
                                    if(file_exists($target_file)) 
                                    {
                                    $msg = "File already exists";
                                    $msg_class = "alert-danger";
                                    }

                                // Upload image only if no errors
                                    if (empty($error)) 
                                    {
                                        $sql = " SELECT * FROM picture WHERE mem_no = '$a' ";
                                        $sesult = mysqli_query($conn,$sql);
                                        $picture = mysqli_fetch_assoc($sesult);
                                        
                                        

                                        if(move_uploaded_file($_FILES["file_img"]["tmp_name"], $target_file)) 
                                        {
                                            $sqlpic = " UPDATE `picture` SET `name` = '$profileImageName', `image` = '$target_dir' WHERE `picture`.`mem_no` = '$a' ";
                                            //$sqlpic = "INSERT INTO `picture` (`no`, `name`, `image`, `mem_no`) VALUES (NULL, 'name20', 'image20', '$a') ";
                                            if(mysqli_query($conn,$sqlpic)){
                                                header('location:profile.php');
                                                echo $msg = "Image uploaded and saved in the Database";
                                                echo $msg_class = "alert-success";
                                            } else {
                                                echo $msg = "There was an error in the database";
                                                echo $msg_class = "alert-danger";
                                            }
                                        } else {
                                            echo $error = "There was an error uploading the file";
                                            echo $msg = "alert-danger";
                                        }
                                    }   

                            }

                        ?>
                        <!--------------------------------------------------------------->

                        <script type="text/javascript">
                            $(document).ready(function() { 
                            var readURL = function(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                        
                                    reader.onload = function (e) {
                                        $('.avatar').attr('src', e.target.result);
                                    }
                            
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $(".file-upload").on('change', function(){
                                readURL(this);
                            });
                            });	
                        </script>

                    </div>
                </div>
            </div>
            <!--------------------------------------------------------------->
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