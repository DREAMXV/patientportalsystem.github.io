<?php  include ('../Includes/header.php');

 
?>


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
    <link rel="stylesheet" type="text/css" href="../css/min.css">
</head>
<body class="doc-body"> 
<!-- Start of Lab Upload Page -->
<div class="lab-container">
    <h2><b>Upload Lab Result</b></h2>
    <form action="action.php" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label class="form-label"><b>Appointment ID</b></label>
            <input type="text" name="Record_ID" value="<?php echo $_GET['Appointment_ID'] ?>" autocomplete="off" class="form-control " readonly>
        </div>
        <div class="form-group">
            <label class="form-label"><b>Test Type</b></label>
            <input type="text" name="Test_Type" autocomplete="off" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="form-label"><b>Result File</b></label>
            <input type="File" name="Result_File" autocomplete="off" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <button type="submit" name="btnUpload" class="btn btn-primary">Upload</button>
        </div>
    </form>
</div>
</body>
</html>


<?php include ('../Includes/footer.php'); ?>