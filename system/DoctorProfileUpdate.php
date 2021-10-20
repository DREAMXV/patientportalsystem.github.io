<?php include ('../Includes/header.php');
if(!isset($_SESSION['Email'])){
    echo"<script>window.alert('Access Denied!!');window.location.href='index.php';</script>";
} 

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Portal- Update Doctor</title>
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
    <?php 
    include ('../Includes/config.php');
    $a = $_SESSION['Email'];
    $query ="SELECT * FROM doctor  WHERE Email='$a'";
    $sql = mysqli_query($connection,$query); 
    while($row = mysqli_fetch_row($sql))
    {
    ?>
 <div class="profile-container">
     <h1> Update Profile</h1>
     <hr>
     <form action="action.php" method="POST">
         <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="form-group mb-2" hidden>
                     <label class="form-label"><b>Doctor ID</b></label>
                     <input type="text" name="Doctor_ID" value="<?php echo $row[0]?>" autocomplete="off" class="form-control" required>
                 </div>
                 <div class="form-group mb-3">
                     <label class="form-label"><b>Name</b></label>
                     <input type="text" name="Name" value="<?php echo $row[1]?>" onkeypress="return /[a-z]/i.test(event.key)" autocomplete="off" class="form-control" required>
                 </div>
                 <div class="form-group mb-3">
                     <label class="form-label"><b>Education</b></label>
                     <input type="text" name="Education" autocomplete="off" value="<?php echo $row[6] ?>" class="form-control" required>
                 </div>
                 <div class="form-group mb-3">
                     <label class="form-label"><b>Gender</b></label>
                     <select name="Gender" class="form-control form-select select" required>
                         <option disabled selected value hidden><?php echo $row[4] ?></option>
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                     </select>
                 </div>
                 <div class="form-group mb-3">
                     <label class="form-label"><b>Email</b></label><br>
                     <input type="Email" name="Email" pattern="^[a-zA-Z0-9]+@gmail\.com$" value="<?php echo $row[9] ?>" class="form-control" style="text-transform:lowercase;" autocomplete="off" readonly>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="form-group mb-3">
                     <label class="form-label"><b>SSN</b></label>
                     <input type="text" name="SSN" autocomplete="off" value="<?php echo $row[3] ?>" class="form-control" required>
                 </div>
                 <div class="form-group mb-3">
                     <label class="form-label"><b>Speciality</b></label>
                     <select name="Speciality" class="form-control form-select select" required>
                         <option disabled selected value hidden><?php echo $row[7] ?></option>
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
                     <label class="form-label"><b>DOB</b></label>
                     <input type="Date" name="DOB" value="<?php echo $row[2] ?>" class="form-control" min='1950-01-01' max="<?php echo date('Y-m-d');?>" required>
                 </div>
                 <div class="form-group mb-3">
                     <label class="form-label"><b>Contact</b></label>
                     <input type="text" name="Contact" value="<?php echo $row[5] ?>" autocomplete="off" class="form-control" required>
                 </div>
             </div>
         </div>
         <hr>
         <div class="form-group ">
             <button type="submit" name="btnDocUpdate" class="btn btn-primary">Update</button>
         </div>
     </form>
 </div>
<?php } ?>
</body>
</html>

<?php include ('../Includes/footer.php'); ?>


