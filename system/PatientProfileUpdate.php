<?php include ('../Includes/header.php');
 include ('../Includes/config.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Patient Portal - Info Update</title>
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
	$a = $_SESSION['Email'];
	$query ="SELECT * FROM patient  WHERE Email='$a'";
	$sql = mysqli_query($connection,$query); 
	while($row = mysqli_fetch_row($sql))
	{
	?>
<div class="reg-container">
    <h1>Update Patient</h1>
    <hr>
    <form action="action.php" method="GET">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-3">
                <div class="form-group mb-3" hidden>
                    <label class="form-label"><b>Patient ID</b></label>
                    <input type="text" name="Patient_ID" value="<?php echo $row[0]?>" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><b>First Name</b></label>
                    <input type="text" name="First_Name" onkeypress="return /[a-z]/i.test(event.key)" value="<?php echo $row[1]?>" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><b>Date of Birth</b></label>
                    <input type="Date" name="DOB" autocomplete="off" class="form-control" min='1950-01-01' max="<?php echo date('Y-m-d');?>" value="<?php echo $row[3]?>" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><b>Contact</b></label><br>
                    <input type="text" name="Contact" value="<?php echo $row[5]?>" autocomplete="off" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><b>Gender</b></label><br>
                    <select name="Gender" class="form-control form-select sel" required>
                        <option selected value="<?php echo $row[7]?>" hidden><?php echo $row[7]?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group mb-3" hidden>
                    <label class="form-label"><b>Email</b></label><br>
                    <input type="Email" name="Email" pattern="^[a-zA-Z0-9]+@gmail\.com$" value="<?php echo $row[9]?>" class="form-control" autocomplete="off" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><b>Marital Status</b></label>
                    <select name="Marital_Status" class="form-control form-select sel" required>
                        <option selected value="<?php echo $row[11]?>" hidden><?php echo $row[11]?></option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Single">Single</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><b>Guardian Name</b></label><br>
                    <input type="text" name="Guardian_Name" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" value="<?php echo $row[13]?>" autocomplete="off" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-3">
                <div class="form-group mb-3">
                    <label class="form-label"><b>Last Name</b></label>
                    <input type="text" name="Last_Name" onkeypress="return /[a-z]/i.test(event.key)" value="<?php echo $row[2]?>" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><b>SSN</b></label><br>
                    <input type="text" name="SSN" autocomplete="off" value="<?php echo $row[4]?>" class="form-control" required>
                </div>
                <div class="form-group mb-3 ">
                    <label class="form-label"><b>Address</b></label><br>
                    <textarea rows="1" class="form-control sel" name="Address" autocomplete="off" required><?php echo $row[6]?></textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><b>Allergies</b></label><br>
                    <input type="text" name="Allergies" onkeypress="return /[a-z]/i.test(event.key)" value="<?php echo $row[8]?>" class="form-control" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><b>Guardian Contact</b></label><br>
                    <input type="text" name="Guardian_Contact" class="form-control" value="<?php echo $row[12]?>" autocomplete="off" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label"><b>Guardian Relation</b></label><br>
                    <input type="text" name="Guardian_Relation" class="form-control" value="<?php echo $row[14]?>" autocomplete="off" required>
                </div>
            </div>
            <hr>
            <div class="form-group mb-3">
                <button type="submit" name="btnUpdate" class="btn btn-primary">Update Info</button>
            </div>
        </div>
    </form>
</div>
<?php } ?>
</body>
</html>

<?php include ('../Includes/footer.php'); ?>