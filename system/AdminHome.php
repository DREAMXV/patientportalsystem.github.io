<?php 
	include ('../Includes/header.php');

	// if(!isset($_SESSION['Email'])){
 //    echo"<script>window.alert('Access Denied!!');window.location.href='index.php';</script>";
	// }
 	include ('../Includes/config.php');


// Count Doctor //
	$sql="SELECT count(*) FROM doctor";
	$result=mysqli_query($connection,$sql);
	$doctor=mysqli_fetch_array($result);

// Count Patient //
	$sql="SELECT count(*) FROM patient";
	$result=mysqli_query($connection,$sql);
	$patient=mysqli_fetch_array($result);

// Count Admin //
	$sql="SELECT count(*) FROM admin";
	$result=mysqli_query($connection,$sql);
	$admin=mysqli_fetch_array($result);

// Count Appointment // 
	$sql="SELECT count(*) FROM appointment";
	$result=mysqli_query($connection,$sql);
	$appointment=mysqli_fetch_array($result);

// Chart //
	$dataPoints = array( 
	array("y" => $patient[0], "label" => "Patient" ),
	array("y" => $doctor[0], "label" => "Doctor" ),
	array("y" => $appointment[0], "label" => "Appointment" )
);
 ?>

<!DOCTYPE html>
<html>
<head>

<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "dark2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Patient Portal Data"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		dataPoints: [
			{ y: <?php echo $patient[0] ?>, label: "Patient" },
			{ y: <?php echo $doctor[0] ?>, label: "Doctor" },
			{ y: <?php echo $appointment[0] ?>, label: "Appointment" }
		]
	}]
});
chart.render();

}
</script>

	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Patient Portal-Admin Home</title>
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
<div class="container-fluid">
    <div class="row content">
        <div class="well">
            <h2>Site Analytics</h2>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="well">
                    <h4>Total Admin</h4>
                    <p><a class='btn btn-secondary btn-lg' href='#'><i class="fas fa-user-cog fa-lg"></i> <?php echo $admin[0]; ?></a></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="well">
                    <h4>Total Doctor</h4>
                    <p> <a class='btn btn-success btn-lg' href='ListOfDoctor.php'><i class='fas fa-user-md fa-lg'></i> <?php echo $doctor[0]; ?></a> </p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="well">
                    <h4>Total Patient</h4>
                    <p><a class='btn btn-success btn-lg' href='ListOfPatient.php'><i class="fas fa-hospital-user fa-lg"></i> <?php echo $patient[0]; ?></a></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="well">
                    <h4>Total Appointment</h4>
                    <p><a class='btn btn-success btn-lg' href='ListOfAppointment.php'><i class="fas fa-calendar-check fa-lg"></i> <?php echo $appointment[0]; ?></a></p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> <br> <br>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
<?php include ('../Includes/footer.php'); ?>