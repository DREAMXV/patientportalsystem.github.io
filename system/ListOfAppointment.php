<?php 
	include ('../Includes/header.php');
	include ('../Includes/Config.php'); 

	$query = "SELECT * FROM appointment";
    $data  = mysqli_query($connection,$query);
    $total = mysqli_num_rows($data);

   if ($total != 0) 
    {
    	?>

    	<table id="myTable" class="table table-stripped table-primary table-hover "  align="center">
		<tr>
			<th>Appointment ID</th>
			<th>Doctor ID</th>
			<th>Patient ID</th>
			<th>Appointment Date</th>
			<th>Appointment Time</th>
			<th>Appointment Status</th>
			<th>Action</th>
		</tr>

		<?php 

			while ($result=mysqli_fetch_assoc($data))
			 {
				echo "<tr>

					<td class='fullName'>".$result['Appointment_ID']."</td>
					<td>".$result['Doctor_ID']."</td>
					<td>".$result['Patient_ID']."</td>
					<td>".$result['Appointment_Date']."</td>
					<td>".$result['Appointment_Time']."</td>
					<td>".$result['Appointment_Status']."</td>	

					<td><a class='btn btn-warning' onClick=\"javascript: return confirm('Please confirm changes');\" 
                    href='UploadLabResult.php? 
                    Appointment_ID=$result[Appointment_ID] &
                    Doctor_ID=$result[Doctor_ID]'> Upload Lab </a> 
					 </tr>";
			}	
    }
?>

<!DOCTYPE html>
 <html>
 <head>
     <title>Appointment Info</title>
     <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
     <!-- Bootstrap Library -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!-- JS Bundle Library -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <!-- icons -->
     <script src="https://kit.fontawesome.com/0f00ad16f2.js" crossorigin="anonymous"></script>
     <!-- CSS -->
     <link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
<body>
<div class="form-group mb-3">
    <input type="text" id="myInput" placeholder="Search by Appointment ID" class="form-control">
</div>
<script src="../js/script.js"></script>
</table>
</body>
</html>

<?php include ('../Includes/footer.php'); ?>