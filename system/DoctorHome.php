 <?php include('../Includes/header.php');

if(!isset($_SESSION['Email'])){
    echo"<script align='center' style='font-family : calibri; color:white; background:#D20D0D; padding:15px;'>window.alert('Access Denied!!');window.location.href='index.php';</script>";
     }

   // echo $_SESSION['Email'] ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Patient Portal - Doctor Home</title>
	<!-- Bootstrap Library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JS Bundle Library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- icons -->
    <script src="https://kit.fontawesome.com/0f00ad16f2.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>  
<div class="container text-center">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default text-left">
                        <div class="panel-body">
                            <p><?php //echo $_SESSION['Email']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="well">
                        <p><a href="DoctorProfile.php" class="nav-link">My Profile</a></p>
                        <img src="../img/icon.png" class="img-circle" alt="Avatar">
                    </div>
                    <p><a href="DoctorAppointmentHistory.php" class="nav-link btn btn-outline-secondary homebtn">Appointment</a></p>
                    <p><a href="MessageInbox.php" class="nav-link btn btn-outline-secondary homebtn">Messages</a></p>
                    <p><a href="ViewRequest.php" class="nav-link btn btn-outline-secondary homebtn">Prescription</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php include ('../Includes/footer.php'); ?>