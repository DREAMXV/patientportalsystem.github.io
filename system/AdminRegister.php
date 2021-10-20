<?php include ('../Includes/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Patient Portal - Admin Register</title>
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
      <!-- Start of Admin Register Form -->
 <div class="admin-container">
     <h1>Admin Registeration</h1>
     <form method="POST" action="action.php" class="admin-form">
         <div class="form-group ">
             <label class="form-label"><b>Name</b></label>
             <input type="text" name="Name" autocomplete="off" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" required>
         </div>
         <div class="form-group ">
             <label class="form-label"><b>Email</b></label>
             <input type="Email" name="Email" pattern="^[a-zA-Z0-9]+@gmail\.com$" style="text-transform:lowercase;" autocomplete="off" class="form-control" required>
         </div>
         <div class="form-group ">
             <label class="form-label"><b>Password</b></label>
             <input name="Password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" class="form-control" required>
         </div>
         <div class="form-group">
             <input type="submit" name="btnRegister" value="Register" class="btn btn-primary">
         </div>
     </form>
 </div>
 <!-- End of Register Form -->
</body>
</html>

<?php include ('../Includes/footer.php'); ?>