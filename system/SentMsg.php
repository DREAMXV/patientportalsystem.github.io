<?php include ('../Includes/header.php');
	  include ('../Includes/config.php'); 
	  date_default_timezone_set("Asia/Yangon");?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Portal- Sent Message</title>
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
        <div class="col-sm-3 well">
            <div class="well">
                <p><a href="PatientProfile.php" class="nav-link">My Profile</a></p>
                <img src="../img/icon.png" class="img-circle" alt="Avatar">
            </div>
            <p><a href="SearchDoctor.php" class="nav-link btn btn-outline-secondary">Find Doctor</a></p>
            <p><a href="AppointmentHistory.php" class="nav-link btn btn-outline-secondary">Appointment</a></p>
            <p><a href="MessageInbox.php" class="nav-link btn btn-outline-secondary">Messages</a></p>
            <p><a href="PatientMedicalRecord.php" class="nav-link btn btn-outline-secondary">Medical Record</a></p>
            <p><a href="PrescriptionRequestHistory.php" class="nav-link btn btn-outline-secondary">Prescriptions</a></p>
            <p><a href="LabResultHistory.php" class="nav-link btn btn-outline-secondary">Lab Result</a></p>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12">
                    <div class="well">
                        <form method="GET" action="action.php" class="message-form">
                            <div class="message-container">
                                <div class="form-group mb-3" hidden>
                                    <td>Sender</td>
                                    <td><input type="text" name="Sender_Email" value="<?php echo $_SESSION['Email'] ?>" class="form-control" autocomplete="off" readonly> </td>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label"><b>To :</b></label>
                                    <input type="text" name="Receiver_Email" style="width: 50%;" autocomplete="off" class="form-control" value="<?php echo $_GET['Email'] ?>" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label"><b>Title :</b></label>
                                    <input type="text" name="Title" class="form-control" style="width: 50%;" required autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label"><b>Message Content :</b></label>
                                    <textarea type="text" class="form-control" style="width: 50%; margin:auto ;" name="Message_Content" required></textarea>
                                </div>
                                <div class="form-group mb-3" hidden="">
                                    <label class="form-label"><b>Status</b></label>
                                    <input type="text" name="Message_Status" class="form-control" required autocomplete="off" value="New" readonly>
                                </div>
                                <div class="form-group mb-3" hidden="">
                                    <label class="form-label"><b>Date</b></label>
                                    <input type="Date" name="Date_Send" class="form-control" value="<?php echo date('Y-m-d'); ?>" required autocomplete="off" readonly>
                                </div>
                                <div class="form-group mb-3" hidden="">
                                    <label class="form-label"><b>Time</b></label>
                                    <input type="Time" name="Time_Send" class="form-control" value="<?php echo date('H:i'); ?>" required autocomplete="off" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="btnSend" style="width: 50%;" class="btn btn-success">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php include ('../Includes/footer.php'); ?>