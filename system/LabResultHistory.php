<?php 
	include ('../Includes/header.php');
	include ('../Includes/Config.php'); 
    $id = $_SESSION['Patient_ID'];

	$query = "SELECT * 
				FROM appointment a , lab_result l 
				WHERE a.Appointment_ID = l.Appointment_ID
				AND a.Patient_ID = '$id'";
    $data  = mysqli_query($connection,$query);
    $total = mysqli_num_rows($data);

   if ($total != 0) 
    {
    	?>

    	<table id="myTable" class="table table-stripped table-primary table-hover "  align="center">
		<tr>
			<th hidden>Result_ID</th>
			<th>Appointment ID</th>
			<th>Test Type</th>
			<th>File</th>
			<th>Action</th>
		</tr>

		<?php 

			while ($result=mysqli_fetch_assoc($data))
			 {
				echo "<tr>
					<td hidden>".$result['Result_ID']."</td>
					<td class='fullName'>".$result['Appointment_ID']."</td>
					<td>".$result['Test_Type']."</td>
					<td>".$result['Result_File']."</td>

					<td><a class='btn btn-warning' onClick=\"javascript: return confirm('Please confirm download');\" 
                    href='download.php? 
                    Result_ID=$result[Result_ID]'> Download </a> 
					 </tr>";
			}	
    }
?>

<!DOCTYPE html>
 <html>
 <head>
     <title>Patient Portal - Lab Result</title>
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