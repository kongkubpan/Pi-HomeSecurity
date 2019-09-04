<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Forms</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<!-- <link href="dashboard.css" rel="stylesheet"> -->
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
<?php
// $servername = "localhost";
// $username="root";
// $password="";
// $dbname="hack";
$mem_no="";
$mem_name="";
$id="";
$password="";
$email="";
$address="";
$city="";
$postcode="";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
include'connect.php';

//get data from the form
function getData()
{
	$data = array();

  $data[0]=$_POST['mem_no'];

	$data[1]=$_POST['mem_name'];
	$data[2]=$_POST['id'];
	$data[3]=$_POST['password'];
	$data[4]=$_POST['email'];
  $data[5]=$_POST['address'];
  $data[6]=$_POST['city'];
  $data[7]=$_POST['postcode'];
	return $data;
}

//search
if(isset($_POST['search']))
{
	$info = getData();
	$search_query="SELECT * FROM `member` WHERE `mem_no` = '$info[0]'";
	$search_result=mysqli_query($conn, $search_query);
		if($search_result)
		{
			if(mysqli_num_rows($search_result))
			{
				while($rows = mysqli_fetch_array($search_result))
				{
					$mem_no = $rows['mem_no'];
					$mem_name = $rows['mem_name'];
					$id = $rows['id'];
					$password = $rows['Mpassword'];
					$email = $rows['mail'];
          $address = $rows['address_name'];
          $city = $rows['city'];
          $postcode = $rows['postcode'];
          
				}
			}else{
				echo("no data are available");
			}
		} else{
			echo("result error");
		}

}

//insert
if(isset($_POST['insert'])){
	$info = getData();
	$insert_query="INSERT INTO `member`(`mem_no`, `mem_name`, `id`, `Mpassword`,`mail`,`address_name`,`city`,postcode) VALUES ('$info[0]','$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]',$info[7])";
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

//delete
if(isset($_POST['delete'])){
	$info = getData();
	$delete_query = "DELETE FROM `member` WHERE `mem_no` = '$info[0]'";
	try{
		$delete_result = mysqli_query($conn, $delete_query);
		if($delete_result){
			if(mysqli_affected_rows($conn)>0)
			{
				echo("data deleted");
			}else{
				echo("data not deleted");
			}
		}
	}catch(Exception $ex){
		echo("error in delete".$ex->getMessage());
	}
}

//edit
if(isset($_POST['update'])){
	$info = getData();
	$update_query="UPDATE `member` SET `mem_name`='$info[1]',`id`='$info[2]',`Mpassword`='$info[3]',`mail`='$info[4]',`address_name`='$info[5]',`city`='$info[6]',postcode='$info[7]' WHERE `mem_no` = '$info[0]'";
	try{
		$update_result=mysqli_query($conn, $update_query);
		if($update_result){
			if(mysqli_affected_rows($conn)>0){
				echo("data updated");
			}else{
				echo("data not updated");
			}
		}
	}catch(Exception $ex){
		echo("error in update".$ex->getMessage());
	}
}

?>

<body>
  <!-- -------------------------------navbar-------------------------------------->
  <?php
    include'adnavbar.php';
  ?>
  <!-- --------------------------------------------------------------------------->

	<div class="container-fluid">
	  <div class="row">
	    <div class="col-lg-4">

          <form method ="post"   action="">

            <div class="form-group row">
                <div class="col-xs-6">
                  <h1>MemberNo</h1>
                  <input type="text" name="mem_no" class="form-control"  value="<?php echo($mem_no);?>" required>
                </div>
            </div>

            <h1>Name</h1>
            <input type="text" name="mem_name"  class="form-control" value="<?php echo($mem_name);?>">
            
            <div class="form-group row">
                <div class="col-xs-6">
                  <h1>ID</h1>
                  <input type="text" name="id" class="form-control"  value="<?php echo($id);?>" required>
                </div>
                <div class="col-xs-6">
                  <h1>Password</h1>
                  <input type="text" name="password" class="form-control" value="<?php echo($password);?>" required>
                </div>
            </div>

            <h1>E-mail</h1>
            <input type="text" name="email"  class="form-control" value="<?php echo($email);?>">

            <h1>Address</h1>
            <input type="text" name="address"  class="form-control" value="<?php echo($address);?>">

            <div class="form-group row">
                <div class="col-xs-6">
                  <h1>City</h1>
                  <input type="text" name="city" class="form-control"  value="<?php echo($city);?>" required>
                </div>
                <div class="col-xs-6">
                  <h1>Postcode</h1>
                  <input type="number" name="postcode" class="form-control"  value="<?php echo($postcode);?>" required>
                </div>
            </div>

            <div>
              <input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add">
              <a href="http://localhost/HomeSecurity/admemberupdate.php"<button class="btn btn-info btn-block btn-lg">Update | Delete | Find</button></a>
            </div>

          </form>
      </div>

      <div class="col-lg-8" ><center>
			  <h2>Member</h2>
          <?php

          include'connect.php';

          $sql = "SELECT * FROM `member`";
          $result = $conn->query($sql);

          echo "<table border='1'>
          <tr>
              <th>MemberNo</th>
              <th>MemName</th>
              <th>ID</th>
              <th>Password</th>
              <th>E-mail</th>
              <th>Address</th>
              <th>City</th>
              <th>Postcode</th>
          </tr>";

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {

                echo "<tr>";
                echo "<tr><td>".$row['mem_no']."</td>";
                echo "<td>".$row['mem_name']."</td>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['Mpassword']."</td>";
                echo "<td>".$row['mail']."</td>";
                echo "<td>".$row['address_name']."</td>";
                echo "<td>".$row['city']."</td>";
                echo "<td>".$row['postcode']."</td>";
                echo "</tr>";


              }
          } else {
              echo "0 results";
          }

          $conn->close();
          ?>
      </div>
  </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

</body>
</html>
