<?php include('../Includes/header.php'); 
      include('../Includes/config.php');
 $DID =$_GET['Doctor_ID'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Portal- Book Appoinment</title>
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
 <div class="app-containter">
    <h1> Book Appointment</h1>
    <hr>
    <form action="action.php" method="POST">
        <div class="form-group mb-3" hidden>
            <label class="form-label"><b>Doctor ID</b></label>
            <input type="text" name="Doctor_ID" value="<?php echo $DID  ?>" class="form-control" readonly>
        </div>
        <div class="form-group mb-3" hidden>
            <label class="form-label"><b>Patient ID</b></label>
            <input type="text" name="Patient_ID" class="form-control" value="<?php echo $_SESSION['Patient_ID'] ?>" readonly>
        </div>
        <div class="form-group mb-3">
            <label class="form-label"><b>Appointment Date</b></label>
            <select name="Appointment_Date" class="form-control form-select select" required> <?php
                   $dbdate = "SELECT Available_Date FROM doctorschedule WHERE Doctor_ID = '$DID' ";
                   $Dresult  = mysqli_query($connection,$dbdate);

                      while ($row=mysqli_fetch_assoc($Dresult)) { ?> <option disabled selected value hidden></option>
                <option> <?php echo $row['Available_Date'] ?> </option> <?php } ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <label class="form-label"><b>Appointment Time</b></label>
            <select name="Appointment_Time" class="form-control form-select select" required>
                <option disabled selected value hidden></option>
                <option value="9:00">9:00</option>
                <option value="9:15">9:15</option>
                <option value="9:30">9:30</option>
                <option value="9:45">9:45</option>
                <option value="10:15">10:15</option>
                <option value="10:30">10:30</option>
                <option value="10:45">10:45</option>
                <option value="11:00">11:00</option>
                <option value="11:15">11:15</option>
            </select>
        </div>
        <div class="form-group mb-3" hidden>
            <label class="form-label"><b>Appointment Status</b></label>
            <input type="text" name="Appointment_Status" autocomplete="off" class="form-control" value="Booked" readonly>
        </div>
        <div class="form-group mb-3">
            <button type="submit" name="btnGetAppointment" class="btn btn-primary">Get Appointment</button>
        </div>
    </form>
</div>
</body>
</html>
<?php include('../Includes/footer.php'); ?>