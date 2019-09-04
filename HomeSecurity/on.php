<?php 
session_start();
ob_start();
?>
            <?php
                require './connect.php'; //เรียกไฟลคอนเน็กมาอ่าน ถ้า ERRER จะไม่ RUN ต่อ
                $a = $_SESSION['mem_no'];
                $q = $_REQUEST["q"];
                $date = date("d/m/Y");
                $time = date("H:i:s");


                $sql = "UPDATE `control_lock` SET `lock_status` = '1' WHERE `control_lock`.`lock_no` = '$q'; ";
                $result = mysqli_query($conn,$sql);
                //$memberANDlocal = mysqli_fetch_assoc($result);

                $sql = "INSERT INTO `control_lock_usage_status` (`lockstatus_no`, `date`, `time`, `lock_no`) VALUES (NULL, '$date', '$time', '$q') ";
                $result = mysqli_query($conn,$sql);

            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>