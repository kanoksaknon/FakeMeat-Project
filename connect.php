<?php

// SQL server configuration 
$serverName = "ACER\SQLEXPRESS"; 
$dbUsername = "sa"; 
$dbPassword = "123456789"; 
$dbName     = "FakeMeatCom"; 
 
// Create database connection 
try {   
   $conn = new PDO( "sqlsrv:Server=$serverName;Database=$dbName", $dbUsername, $dbPassword);    
   $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
   //เชื่อมสำเร็จจะเข้าหน้านี้
   //usleep(ms) ใส่เพื่อเพิ่มความสมจริง
    usleep(500000);
    include 'system.html';  
}   

catch( PDOException $e ) {   
   die( "Error connecting to SQL Server: ".$e->getMessage() );    
}

?>

<!-- http://localhost/Web_%20app_CPE305_Project/connect.php --> <!--ctrl + click-->