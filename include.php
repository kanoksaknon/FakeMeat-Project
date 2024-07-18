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
}   

catch( PDOException $e ) {   
   die( "Error connecting to SQL Server: ".$e->getMessage() );    
}

?>