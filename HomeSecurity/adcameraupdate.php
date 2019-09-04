<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Camera update</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"  href="/HomeSecurity/bootstrap/bootstrap.min.css">
<script src="/HomeSecurity/bootstrap/bootstrap.min.js"></script>

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

$a="";
$b="";
$c="";
$d="";
$e="";
$f="";

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
  $data[3]=$_POST['d'];
  $data[4]=$_POST['e'];
  $data[5]=$_POST['f'];
  return $data;
}

//search
if(isset($_POST['search']))
{
  $info = getData();
  $search_query="SELECT * FROM `camera` WHERE `cam_no` = '$info[0]'";
  $search_result=mysqli_query($conn, $search_query);
	if($search_result)
	{
	  if(mysqli_num_rows($search_result))
	  {
		while($rows = mysqli_fetch_array($search_result))
		{
		  $a = $rows['cam_no'];
		  $b = $rows['location_no'];
		  $c = $rows['mem_no'];
		  $d = $rows['cam_name'];
		  $e = $rows['camtype_no'];
		  $f = $rows['ip address'];
		  
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
  $insert_query="INSERT INTO `camera`(`cam_no`, `location_no`, `mem_no`, `cam_name`,`camtype_no`,`ip address`) VALUES ('$info[0]','$info[1]','$info[2]','$info[3]','$info[4]','$info[5]')";
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
  $delete_query = "DELETE FROM `camera` WHERE `cam_no` = '$info[0]'";
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
  $update_query="UPDATE `camera` SET `location_no`='$info[1]',`mem_no`='$info[2]',`cam_name`='$info[3]',`camtype_no`='$info[4]',`ip address`='$info[5]' WHERE `cam_no` = '$info[0]'";
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
	<!-- ------------------------navbar------------------------------ -->
	<?php
		include'adnavbar.php';	
	?>
  	<!-- ------------------------------------------------------------------------- -->

	  <div class="container-fluid">
	  <div class="row">
	    <div class="col-lg-4">

          <form method ="post"   action="">

            <div class="form-group row">
                <div class="col-xs-6">
                  <h1>CameraNo</h1>
                  <input type="text" name="a" class="form-control"  value="<?php echo($a);?>" required>
                </div>
            </div>

            <h1>LocationNo</h1>
            <input type="text" name="b"  class="form-control" value="<?php echo($b);?>">
            
            <div class="form-group row">
                <div class="col-xs-6">
                  <h1>MemberNo</h1>
                  <input type="text" name="c" class="form-control"  value="<?php echo($c);?>" >
                </div>
                <div class="col-xs-6">
                  <h1>CameraName</h1>
                  <input type="text" name="d" class="form-control" value="<?php echo($d);?>" >
                </div>
            </div>

            <h1>CameratypeNo</h1>
            <input type="text" name="e"  class="form-control" value="<?php echo($e);?>">

            <h1>IP Address</h1>
            <input type="text" name="f"  class="form-control" value="<?php echo($f);?>" >

			<!-- ------------------------------ BUTTON ---------------------------- -->
			<div class="form-group row">
			<hr/>
				<div class="col-xs-4">
					<input type="submit" class="btn btn-primary btn-block btn-lg" name="search" value="Find">
				</div>
				<div class="col-xs-4">
					<input type="submit" class="btn btn-warning btn-block btn-lg" name="update" value="Update">
				</div>
				<div class="col-xs-4">
					<input type="submit" class="btn btn-danger btn-block btn-lg" name="delete" value="Delete">
				</div>
			</div>
			<!-- ------------------------------ BUTTON ---------------------------- -->
			</form>

		</div>
		<!-- ------------------------------ ตาราง ---------------------------- -->

		<div class="col-lg-8"><center>
			  <h2>Camera</h2>
          <?php

          include'connect.php';

          $sql = "SELECT * FROM `camera`";
          $result = $conn->query($sql);

          echo "<table border='1'>
          <tr>
              <th>cam_no</th>
              <th>location_no</th>
              <th>mem_no</th>
              <th>cam_name</th>
              <th>camtype_no</th>
              <th>ip address</th>
          </tr>";

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {

                echo "<tr>";
                echo "<tr><td>".$row['cam_no']."</td>";
                echo "<td>".$row['location_no']."</td>";
                echo "<td>".$row['mem_no']."</td>";
                echo "<td>".$row['cam_name']."</td>";
                echo "<td>".$row['camtype_no']."</td>";
                echo "<td>".$row['ip address']."</td>";
                echo "</tr>";


              }
          } else {
              echo "0 results";
          }

          $conn->close();
		  ?>
		  
	  </div>
	  <!-- -------------------------------------------------------------- -->
  </div>

  	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

</body>
</html>
