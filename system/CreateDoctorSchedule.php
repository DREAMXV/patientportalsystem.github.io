<?php include('../Includes/header.php'); 
      include('../Includes/config.php');
      $D=$_GET['Doctor_ID'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Portal- Create Doctor Schedule</title>
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
<div class="cdoc-container">
    <h1>Create Schedule</h1>
    <hr>
    <form action="action.php" method="POST">
        <div class="form-group mb-3">
            <label class="form-label"><b>Doctor Name</b></label>
            <select name="Doctor_ID" class="form-control form-select select" required> <?php
                   $DocName = "SELECT Name FROM doctor WHERE Doctor_ID = '$D' ORDER BY Name ASC";
                   $Dresult  = mysqli_query($connection,$DocName);

                      while ($row=mysqli_fetch_assoc($Dresult)) { ?> <option value="<?php echo $D ?>"> <?php echo $row['Name'] ?> </option> <?php } ?> </select>
        </div>
        <div class="form-group mb-3">
            <label class="form-label"><b>Available Date</b></label>
            <input type="date" name="Available_Date" autocomplete="off" class="form-control" min="<?php echo date('Y-m-d');?>" required>
        </div>
        <div class="form-group mb-3">
            <button type="submit" name="btnCreateSchedule" class="btn btn-primary">Create Schedule</button>
        </div>
    </form>
</div>
</body>
</html>
<?php include('../Includes/footer.php'); ?>