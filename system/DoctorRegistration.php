<?php include ('../Includes/header.php');
if(!isset($_SESSION['Email'])){
    echo"<script>window.alert('Access Denied!!');window.location.href='index.php';</script>";
} 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Patient Portal-Doctor Registration</title>
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
        <h1>Doctor Registration</h1>
        <hr>
        <form action="action.php" method="POST">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group mb-3">
                        <label class="form-label"><b>Name</b></label>
                        <input type="text" name="Name" autocomplete="off" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"><b>DOB</b></label>
                         <input type="date" name="DOB" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"><b>Gender</b></label>
                        <select name="Gender" class="form-control form-select select" required>
                            <option disabled selected value hidden></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"><b>SSN</b></label>
                        <input type="text" name="SSN" autocomplete="off" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"><b>Email</b></label><br>
                        <input type="Email" name="Email" style="text-transform:lowercase;" pattern="^[a-zA-Z0-9]+@gmail\.com$" class="form-control" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group mb-3">
                        <label class="form-label"><b>DOB</b></label>
                        <input type="Date" name="DOB" autocomplete="off" class="form-control" min='1950-01-01' max="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"><b>Speciality</b></label>
                        <select name="Speciality" class="form-control form-select select" required>
                            <option disabled selected value hidden></option>
                            <option value="Allergists">Allergists</option>
                            <option value="Cardiologists">Cardiologists</option>
                            <option value="Dermatologists">Dermatologists</option>
                            <option value="Endocrinologists">Endocrinologists</option>
                            <option value="Gastroenterologists">Gastroenterologists</option>
                            <option value="Geriatric">Geriatric Medicine</option>
                            <option value="Internal Medicine">Internal Medicine</option>
                            <option value="Nephrologists">Nephrologists</option>
                            <option value="Neurologists">Neurologists</option>
                            <option value="Obstetrician/gynecologists">Obstetrician/gynecologists</option>
                            <option value="Oncologists">Oncologists</option>
                            <option value="Ophthalmologists">Ophthalmologists</option>
                            <option value="Otolaryngologists">Otolaryngologists</option>
                            <option value="Pediatricians">Pediatricians</option>
                            <option value="Psychiatrists">Psychiatrists</option>
                            <option value="Pulmonologists">Pulmonologists</option>
                            <option value="Radiologists">Radiologists</option>
                            <option value="Rheumatologists">Rheumatologists</option>
                            <option value="Urologists">Urologists</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label"><b>Activity Status</b></label>
                        <input type="text" name="Activity_Status" autocomplete="off" class="form-control" value="Active" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"><b>Contact</b></label>
                        <input type="text" name="Contact" autocomplete="off" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label"><b>Password</b></label><br>
                        <input name="Password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group ">
                <button type="submit" name="btnCreate" class="btn btn-primary">Create an account</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php include ('../Includes/footer.php'); ?>


