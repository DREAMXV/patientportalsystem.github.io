<?php
 include ('../Includes/header.php'); 
 include ('../Includes/config.php'); 
 
 $_SESSION['Appointment_ID'] = $_GET['Appointment_ID'];;

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Portal - Appointment Session</title>
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
	<?php 
 	$pid = $_GET['Patient_ID'];
	$query ="SELECT * FROM patient  WHERE Patient_ID='$pid'";
	$sql = mysqli_query($connection,$query); 
	$row = mysqli_fetch_row($sql)


	?>
<div class="container text-center">
    <div class="row">
        <div class="col-sm-3 well">
            <div class="well">
                <h2>Patient Info</h2>
                <img src="../img/icon.png" class="img-circle" alt="Avatar">
            </div>
            <table id="myTable" class="table table-stripped table-primary table-hover " align="center">
                <tr>
                    <td>First Name :</td>
                    <td><?php echo $row[1]?></td>
                </tr>
                <tr>
                    <td>Last Name :</td>
                    <td><?php echo $row[2]?></td>
                </tr>
                <tr>
                    <td>DOB :</td>
                    <td><?php echo $row[3]?></td>
                </tr>
                <tr>
                    <td>Gender :</td>
                    <td><?php echo $row[7]?></td>
                </tr>
                <tr>
                    <td>Allergies :</td>
                    <td><?php echo $row[8]?></td>
                </tr>
                 <tr>
                    <td>Marital Status :</td>
                    <td><?php echo $row[11]?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="">
                    <div class="well">
                        <div class="record-container">
                            <form action="action.php" method="POST" class="record">
                                <div class="form-group mb-2">
                                    <label class="form-label"><b>Appointment ID</b></label>
                                    <input type="text" name="Appointment_ID" value="<?php echo $_GET['Appointment_ID']; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label"><b>Diagnosis</b></label>
                                    <input type="text" name="Diagnosis" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label"><b>Med Prescription</b></label>
                                    <input type="text" name="Med_Prescription" autocomplete="off" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label"><b>Summary</b></label>
                                    <input type="text" name="Summary" autocomplete="off" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label"><b>Note</b></label>
                                    <input type="text" name="Note" autocomplete="off" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="submit" name="btnRecord" value="Record" style="width: 25%;" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php include ('../Includes/footer.php'); ?>