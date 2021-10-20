<?php include ('../Includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Patient Portal-Edit Doctor</title>
	<!-- Bootstrap Library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JS Bundle Library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- icons -->
    <script src="https://kit.fontawesome.com/0f00ad16f2.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body class="doc-body">
   <div class="doc-container">
      <h1>Edit Doctor</h1>
      <hr>
      <form action="action.php" method="GET">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group mb-3">
                      <label class="form-label"><b>Doctor ID</b></label>
                      <input type="text" name="Doctor_ID" class="form-control" autocomplete="off" value="<?php echo $_GET['Doctor_ID']; ?>" readonly>
                  </div>
                  <div class="form-group mb-3">
                      <label class="form-label"><b>Education</b></label>
                      <input type="text" name="Education" class="form-control" autocomplete="off" value="<?php echo  $_GET['Education']; ?>" required >
                  </div>
                  <div class="form-group mb-3">
                      <label class="form-label"><b>Gender</b></label>
                      <input type="text" name="Gender" class="form-control" autocomplete="off" value="<?php echo  $_GET['Gender']; ?>" required>
                  </div>
                  <div class="form-group mb-3">
                      <label class="form-label"><b>Social Security No</b></label>
                      <input type="text" name="SSN" class="form-control" autocomplete="off" value="<?php echo $_GET['SSN']; ?>"  required>
                  </div>
                  <div class="form-group mb-3">
                      <label class="form-label"><b>Email</b></label>
                      <input type="Email" name="Email" class="form-control" pattern="^[a-zA-Z0-9]+@gmail\.com$" placeholder="Enter Your Email" autocomplete="off" style="text-transform:lowercase;" value="<?php echo  $_GET['Email']; ?>" required>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group mb-3">
                      <label class="form-label"><b>Name</b></label>
                      <input type="text" name="Name" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" autocomplete="off" value="<?php echo $_GET['Name']; ?>" required>
                  </div>
                  <div class="form-group mb-3">
                      <label class="form-label"><b>Speciality</b></label>
                      <input type="text" name="Speciality" class="form-control" autocomplete="off" value="<?php echo  $_GET['Speciality']; ?>" readonly>
                  </div>
                  <div class="form-group mb-3 ">
                      <label class="form-label"><b>DOB</b></label>
                      <input type="text" value="<?php echo $_GET['DOB']; ?>" name="DOB" class="form-control" autocomplete="off" readonly>
                  </div>
                  <div class="form-group mb-3">
                      <label class="form-label"><b>Contact</b></label>
                      <input type="text" name="Contact" class="form-control" autocomplete="off" value="<?php echo  $_GET['Contact']; ?>" required>
                  </div>
                  <div class="form-group mb-3">
                      <label class="form-label"><b>Activity Status</b></label>
                      <input type="text" name="Activity_Status" class="form-control" autocomplete="off" value="<?php echo $_GET['Activity_Status']; ?>" readonly>
                  </div>
              </div>
          </div>
          <hr>
          <div class="form-group ">
              <button type="submit" name="Update" class="btn btn-primary">Update</button>
          </div>
      </form>
  </div>
</body>
</html>
<?php include('../Includes/footer.php'); ?>