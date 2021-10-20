<?php include ('../Includes/header.php');
 include ('../Includes/config.php'); ?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Portal</title>
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
                <p><a href="DoctorProfile.php" class="nav-link">My Profile</a></p>
                <img src="../img/icon.png" class="img-circle" alt="Avatar">
            </div>
      		 <p><a href="DoctorAppointmentHistory.php" class="nav-link btn btn-outline-secondary">Appointment</a></p>
		     <p><a href="MessageInbox.php" class="nav-link btn btn-outline-secondary">Messages</a></p>
		     <p><a href="ViewRequest.php" class="nav-link btn btn-outline-secondary">Prescription</a></p>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12">
                    <div class="well">
                        <div class="row p-info">
                            <div class="col-md-12 col-sm-12">
                               <table border="2" id="info-table" cellpadding="" class="table table-primary table-stripped ">
                                <h3>Personal Info</h3> 
	<?php 
    $a = $_SESSION['Email'];
    $query ="SELECT * FROM doctor  WHERE Email='$a'";
    $sql = mysqli_query($connection,$query); 

	while($data = mysqli_fetch_array($sql))
	{
	?> 		<tr>
	        <td>Name</td>
	        <td><?php echo $data['Name']; ?></td>
		    </tr>
		    <tr>
		        <td>DOB</td>
		        <td><?php echo $data['DOB']; ?></td>
		    </tr>
		    <tr>
		        <td>SSN</td>
		        <td><?php echo $data['SSN']; ?></td>
		    </tr>
		    <tr>
		        <td>Gender</td>
		        <td><?php echo $data['Gender']; ?></td>
		    </tr>
		    <tr>
		        <td>Contact</td>
		        <td><?php echo $data['Contact']; ?></td>
		    </tr>
		    <tr>
		        <td>Education</td>
		        <td><?php echo $data['Education']; ?></td>
		    </tr>
		    <tr>
		        <td>Speciality</td>
		        <td><?php echo $data['Speciality']; ?></td>
		    </tr>
		    <tr>
		        <td>Activity Status</td>
		        <td><?php echo $data['Activity_Status']; ?></td>
		    </tr>
		    <tr>
		        <td>Email</td>
		        <td><?php echo $data['Email']; ?></td>
		    </tr>
	</table>
    </div>
</div> 
<?php } ?> 
							 <div class="mb-2 mt-2">
					            <a class="btn btn-primary " href="DoctorProfileUpdate.php">Update Info</a>
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