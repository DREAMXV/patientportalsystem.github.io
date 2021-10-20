<?php 
	include ('../Includes/header.php');
	include ('../Includes/config.php');

	$query = "SELECT * FROM patient";
    $data  = mysqli_query($connection,$query);
    $total = mysqli_num_rows($data);
 if ($total != 0) 
    {
    ?>
    <div class="table-responsive-sm">
    	<div class="form-group mb-3">
	<input type="text" id="myInput"  placeholder="Search by Name" class="form-control">
	</div>
    	<table id="myTable" class="table table-stripped table-primary table-hover " align="center" >
		<tr>
			<th>Patient_ID</th>
			<th>Name</th>
			<th>DOB</th>
			<th>SSN</th>
			<th>Contact</th>
			<th>Address</th>
			<th>Gender</th>
			<th>Email</th>
			<th>Guardian Contact</th>
			<th>Guardian Name</th>
			<th>Guardian Relation</th>
		</tr>
		<?php 

			while ($result=mysqli_fetch_assoc($data))
			 {
				echo "<tr>

					<td>".$result['Patient_ID']."</td>
					<td class='fullName'>".$result['First_Name']. " ".$result['Last_Name']."</td>
					<td>".$result['DOB']."</td>
					<td>".$result['SSN']."</td>
					<td>".$result['Contact']."</td>
					<td>".$result['Address']."</td>
					<td>".$result['Gender']."</td>
					<td>".$result['Email']."</td>
					<td>".$result['Guardian_Contact']."</td>
					<td>".$result['Guardian_Name']."</td>
					<td>".$result['Guardian_Relation']."</td>
					 </tr>";

			}
		
    }
?>

 <!DOCTYPE html>
 <html>
 <head>
     <title>Patient Info</title>
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
	

</table>
<script src="../js/index.js"></script>
</div>
</body>
</html>
<?php include ('../Includes/footer.php'); ?>