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
 
// Get member data 
$memberData = $userData = array(); 
if(!empty($_GET['id'])){ 
    // Include database configuration file 
    require_once 'include.php'; 
     
    // Fetch data from SQL server by row ID 
    $sql = "SELECT * FROM Members WHERE MemberID = ".$_GET['id']; 
    $query = $conn->prepare($sql); 
    $query->execute(); 
    $memberData = $query->fetch(PDO::FETCH_ASSOC); 
} 
$userData = !empty($sessData['userData'])?$sessData['userData']:$memberData; 
unset($_SESSION['sessData']['userData']); 
 
$actionLabel = !empty($_GET['id'])?'Edit':'Add'; 
 
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

<!DOCTYPE html> <!--หน้าsign-in ที่ไม่ใช่admin-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เนื้อปลอม รับสมัครพนักงานหลายอัตรา</title>
    <link rel="icon " href="./all_photo_use/logo_title.ico">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header class="p-4 bg-warning text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="system.html" class="nav-link p-2 text-white">
                <font style="vertical-align: inherit;">
                  <img src="./all_photo_use/logo_title.ico" width="90rem" height="80rem">
                </font>
              </a></li>
          </ul>
        </div>
      </div>
    </header>
  </body>

<body class="bg-dark">  
    <div class="container">
        <main>
            <!--แสดงวันที่-->
          <!--  <div class="p-3 text-white" id="datetime"></div> -->

            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="./logo_title.png" width="13%" height="13%">
                <h2>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;" class="text-white">หน้ารับสมัคร</font>
                    </font>
                </h2>
                <p class="lead text-white">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">กรุณา กรอกให้ครบถ้วน!!</font>
                        <font style="vertical-align: inherit;"></font>
                    </font>
                </p>
            </div>

            <!--div class=" row-3 "-->
            <div class="col-md-7 text-white col-lg-7">
                <h4>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">กรอกข้อมูลของคุณ</font>
                    </font>
                </h4>
            </div>

            <br>

         <form action="submit.php" method="post">

                <!--ชือ-->
                <div class="text-white"> <!--p-3 row text-white g-5 col-4-->
                        <label for="FirstName" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">ชื่อ :</font>
                            </font>
                        </label>
                        <input type="text" class="form-control"  name="FirstName" placeholder="Firstname" value="<?php echo !empty($userData['FirstName'])?$userData['FirstName']:''; ?>" required="">
                </div>

                <br>

                <!--นามสกุล-->
                <div class="text-white"> <!--p-3 text-white col-4-->
                    <label for="LastName" class="form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">นามสกุล :</font>
                        </font>
                    </label>
                    <input type="text" class="form-control" id="LastName" name="LastName" placeholder="LastName" value="<?php echo !empty($userData['LastName'])?$userData['LastName']:''; ?>" required="">
                </div>

                <br>

                <!--วัน/เดือน/ปีเกิด-->
                <div class="text-white">
                    <label for="username" class="form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">วัน/เดือน/ปีเกิด :</font>
                        </font>
                    </label>
                    <div class="input-group has-validation">
                        <input type="date" class="form-control" id="Bdate" name="Bdate" placeholder="dd/mm/yyyy" value="<?php echo !empty($userData['Bdate'])?$userData['Bdate']:''; ?>" required="">
                    </div>
                </div>

                <br>

                <!--Email-->
                <div class="text-white">
                    <label for="username" class="form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Email :</font>
                        </font>
                    </label>
                    <div class="input-group has-validation">
                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="<?php echo !empty($userData['Email'])?$userData['Email']:''; ?>" required="">
                    </div>
                </div>

                <br>

                <!--เบอร์โทร-->
                <div class=" text-white">
                    <label for="username" class="form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">เบอร์โทร :</font>
                        </font>
                    </label>
                    <div class="input-group has-validation">
                        <input type="number" class="form-control" id="Tel" name="Tel"
                            placeholder="Phonenumber" value="<?php echo !empty($userData['Tel'])?$userData['Tel']:''; ?>" required="">
                    </div>
                </div>

                <br>

                <!--แผนก-->
                <div class="text-white ">
                    <label for="position" class="form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">แผนก :</font>
                        </font>
                    </label>
                    <select type="text" class="form-control" id="Department" name="Department" placeholder="Department" value="<?php echo !empty($userData['Department'])?$userData['Department']:''; ?>" required="">
                        <option value="Accounting">Accounting</option>
                        <option value="Kitchen">Kitchen</option>
                        <option value="Cleaning">Cleaning</option>
                        <option value="Maketing">Maketing</option>
                        <option value="Operation">Operation</option>
                        <option value="Sales">Sales</option>
                    </select>
                </div>

                <br>

                <!--สาขาที่ต้องการสมัคร-->
                <div class="text-white">
                    <label for="department" class="form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">สาขาที่ต้องการสมัคร :</font>
                        </font>
                    </label>
                    <select type="text" class="form-control" id="Branch" name="Branch"
                        placeholder="Department" value="<?php echo !empty($userData['Branch'])?$userData['Branch']:''; ?>" required="">
                        <option value="kanchanaburi">Kanchanaburi</option>
                        <option value="koh_samui">Koh_Samui</option>
                        <option value="chumphon">Chumphon</option>
                    </select>
                </div>

                <br>

                <div>
                    <input class="btn btn-warning" type="submit" name="userSubmit" value="บันทึก">

                    <input class="btn btn-secondary" type="button" value="กลับไปยังหน้าแรก" onclick="location.href='System.html  '">
                </div>
         </form>
            <!--/div-->
        </main>
    </div>
</body>

</html>

<!-- http://localhost/Web_%20app_CPE305_Project/connect.php --> <!-- ctrl + click-->