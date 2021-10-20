<?php 
	include ('../Includes/header.php');
	include ('../Includes/config.php');

	$query = "SELECT * FROM doctor";
    $data  = mysqli_query($connection,$query);
    $total = mysqli_num_rows($data);

   if ($total != 0) 
    {
    	?>
    	<div class="table-responsive-sm">
    	<table id="myTable" class="table table-stripped table-primary table-hover "  align="center">
		<tr>
			<th>Doctor_ID</th>
			<th>Name</th>
			<th>DOB</th>
			<th>SSN</th>
			<th>Gender</th>
			<th>Contact</th>
			<th>Education</th>
			<th>Speciality</th>
			<th>Activity Status</th>
			<th>Email</th>
			<th>Action</th>
			<th>Action</th>
			<th colspan="2">Action</th>
		</tr>
 <br>

		<?php 

			while ($result=mysqli_fetch_assoc($data))
			 {
				echo "<tr>

					<td>".$result['Doctor_ID']."</td>
					<td class='fullName'>".$result['Name']."</td>
					<td>".$result['DOB']."</td>
					<td>".$result['SSN']."</td>
					<td>".$result['Gender']."</td>
					<td>".$result['Contact']."</td>
					<td>".$result['Education']."</td>
					<td>".$result['Speciality']."</td>
					<td>".$result['Activity_Status']."</td>		
					<td>".$result['Email']."</td>
					
					<td><a class='btn btn-success' href='EditDoctor.php? 
						    	Doctor_ID=$result[Doctor_ID] & 
								Name=$result[Name] &
								DOB=$result[DOB] &
								SSN=$result[SSN] &
								Gender=$result[Gender] &
								Contact=$result[Contact] &
								Education=$result[Education] &
								Speciality=$result[Speciality] &
								Activity_Status=$result[Activity_Status] &
								Email=$result[Email]'> Edit </a> 
					<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Please confirm changes');\" href='DeactivateDoc.php? 
						    Doctor_ID=$result[Doctor_ID]'> Deactivate </a>	</td>
					<td><a class='btn btn-warning' href='CreateDoctorSchedule.php? 
						    Doctor_ID=$result[Doctor_ID]'> Add Schedule </a>	</td>		
					 </tr>";
			}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Patient Portal-Doctor List</title>
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
	<div class="form-group mb-3">
	<input type="text" id="myInput" placeholder="Search by Name" class="form-control">
	</div>
 
</table>
</div>
<script src="../js/script.js"></script>   
</body>
</html>

<?php include ('../Includes/footer.php'); ?>