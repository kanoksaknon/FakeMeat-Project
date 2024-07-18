<?php 
 
// Start session 
if(!session_id()){ 
    session_start(); 
} 
 
// Retrieve session data 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
 
// Get status message from session 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
 
// Include database configuration file 
require_once 'include.php'; 
 
// Fetch the data from SQL server 
$sql = "SELECT * FROM Members ORDER BY MemberID DESC"; 
$query = $conn->prepare($sql); 
$query->execute(); 
$members = $query->fetchAll(PDO::FETCH_ASSOC); 
 
?>

<!-- Display status message -->
<?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
<div class="col-xs-12">
    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
</div>
<?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
<div class="col-xs-12">
    <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>

<!DOCTYPE html>
<html lang = "en">
<head>
     <title>เนื้อปลอม ดูรายชื่อคนสมัครทั้งหมด</title>
     <link rel="icon " href="./all_photo_use/logo_title.ico">
     <meta charset="utf-8">

     <!--Bootstrap library-->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
     <!--Stylesheet file-->
     <link rel="stylesheet" href="css/style.css">
</head>

<style>
      body {
        background-image: url('./all_photo_use/Group 91.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-color: #b2b2b2;   
      }
    </style>
    
<body>
     <div class="container">
          <h1>ข้อมูลคนที่สมัครทั้งหมด</h1>
          <div class="row">
    <div class="col-md-12 head">
        <h5>รายชื่อทั้งหมด</h5>
    </div>
    
    <!-- List the members -->
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Department</th>
                <th>Branch</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($members)){ $count = 0; foreach($members as $row){ $count++; ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['LastName']; ?></td>
                <td><?php echo $row['Bdate']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Tel']; ?></td>
                <td><?php echo $row['Department']; ?></td>
                <td><?php echo $row['Branch']; ?></td>
                <td><?php echo $row['Created']; ?></td>
                <td>
                    <a href="submit.php?action_type=delete&id=<?php echo $row['MemberID']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?');">delete</a>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr><td colspan="7">No member(s) found...</td></tr>
            <?php } ?>
        </tbody>
    </table>
</div>
     </div>
     
</body>
</html>

<!-- http://localhost/Web_%20app_CPE305_Project/connect.php --> <!--ctrl + click-->