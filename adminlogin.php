<?php

    //link database
    $serverName = "ACER\SQLEXPRESS";
    $connectionInfo = array( 
    "Database" => "FakeMeatCom",
    "UID" => "sa",
    "PWD" => "123456789"
);

$conn = sqlsrv_connect($serverName, $connectionInfo);

     //เข้าสู่ระบบของadmin.html
     $username = $_POST["username"];
     $password = $_POST["password"];
 
 
     // เช็คว่า username และ password ถูกต้องหรือไม่
     if ($username === "cpe305" && $password === "0000") {
        //sleep(s) ใส่เพื่อเพิ่มความสมจริง5555
        sleep(1);
         include 'index.php';
         // ทำตามที่คุณต้องการหลังจากเข้าสู่ระบบ
     } else {
         echo "Username หรือ Password ไม่ถูกต้อง!";
     }
 

?>

<!-- http://localhost/Web_%20app_CPE305_Project/connect.php -->