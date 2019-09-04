<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Control Lock Update</title>
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

  return $data;
}

//search
if(isset($_POST['search']))
{
  $info = getData();
  $search_query="SELECT * FROM `control_lock` WHERE `lock_no` = '$info[0]'";
  $search_result=mysqli_query($conn, $search_query);
	if($search_result)
	{
	  if(mysqli_num_rows($search_result))
	  {
		while($rows = mysqli_fetch_array($search_result))
		{
		  $a = $rows['lock_no'];
		  $b = $rows['lock_name'];
		  $c = $rows['lock_ipaddress'];
		  $d = $rows['lock_status'];
		  $e = $rows['mem_no'];
		  
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
  $insert_query="INSERT INTO `control_lock`(`lock_no`, `lock_name`, `lock_ipaddress`,`lock_status`, `mem_no`) VALUES ('$info[0]','$info[1]','$info[2]','$info[3]','$info[4]')";
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
  $delete_query = "DELETE FROM `control_lock` WHERE `lock_no` = '$info[0]'";
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
  $update_query="UPDATE `control_lock` SET `lock_name`='$info[1]',`lock_ipaddress`='$info[2]',`lock_status`='$info[3]',`mem_no`='$info[4]' WHERE `lock_no` = '$info[0]'";
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
				<h1>LockNo</h1>
				<input type="text" name="a" class="form-control"  value="<?php echo($a);?>" required>
			  </div>
		  </div>

		  <h1>LockName</h1>
		  <input type="text" name="b"  class="form-control" value="<?php echo($b);?>">

		  <div class="form-group row">
			  <div class="col-xs-6">
				<h1>Lock IP Address</h1>
				<input type="text" name="c" class="form-control"  value="<?php echo($c);?>" >
			  </div>
		  </div>


		  <div class="form-group row">
			  <div class="col-xs-6">
				<h1>LockStatus</h1>
				<input type="text" name="d" class="form-control"  value="<?php echo($d);?>">
			  </div>
			  <div class="col-xs-6">
				<h1>MemberNo</h1>
				<input type="text" name="e" class="form-control" value="<?php echo($e);?>" >
			  </div>
		  </div>

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
			  <h2>Control Lock</h2>
          <?php

          include'connect.php';

          $sql = "SELECT * FROM `control_lock`";
          $result = $conn->query($sql);

          echo "<table border='1'>
          <tr>
              <th>lock_no</th>
              <th>lock_name</th>
              <th>lock_IPAddress</th>
              <th>lock_status</th>
              <th>mem_no</th>
          </tr>";

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {

                echo "<tr>";
                echo "<tr><td>".$row['lock_no']."</td>";
                echo "<td>".$row['lock_name']."</td>";
                echo "<td>".$row['lock_ipaddress']."</td>";
                echo "<td>".$row['lock_status']."</td>";
                echo "<td>".$row['mem_no']."</td>";
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
