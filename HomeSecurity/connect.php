<?php
    $conn = new mysqli('localhost','root','','database');
    if ($conn->connect_errno){
        die("Connection failed". $conn->connect_error);
    }
    mysqli_query($conn,"set character set utf8");
    
?>