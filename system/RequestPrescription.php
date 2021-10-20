<?php include ('../Includes/header.php');  
      include ('../Includes/config.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Portal - Prescription Request</title>
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
<!-- Start of Req P -->
<h2><b>Prescription Request</b></h2>
<form method="GET" action="action.php">
    <div class="form-group mb-2">
        <label class="form-label"><b>Record ID</b></label>
        <input type="text" name="Record_ID" value="<?php echo $_GET['Record_ID'] ?>" class="form-control" readonly>
    </div>
    <div class="form-group mb-2">
        <label class="form-label"><b>Note</b></label>
        <input type="text" name="Note" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label class="form-label"><b>Status</b></label>
        <input type="text" name="Status" autocomplete="off" class="form-control" value="Pending" readonly>
    </div>
    <div class="form-group">
        <input type="submit" name="btnRequest" value="Request" class="btn btn-primary">
    </div>
</form>
<!-- End of Req Form -->

     </body>
</html>

<?php include ('../Includes/footer.php'); ?>