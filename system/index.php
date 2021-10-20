<?php 

    include ('../Includes/header.php');

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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
     <!--Start of  Login Form-->
     <div class="container title-container">
         <div class="row">
             <div class="col-lg-6">
                 <form action="action.php" class="form-login" method="POST">
                     <h1 class="header-title">Patient Portal</h1>
                     <h2 class="header-2">24 Hours Medical Assistance</h2>
                     <hr>
                     <div class="form-group">
                         <label for="email" class="form-label"><b>Email</b></label><br>
                         <input type="Email" name="Email" style="text-transform:lowercase;" class="form-control" required autocomplete="off"> <br>
                     </div>
                     <div class="form-group mb-2">
                         <label for="password" class="form-label"><b>Password</b></label><br>
                         <input type="password" name="Password" class="form-control" required>
                     </div>
                     <div class="form-group mb-3">
                         <button type="submit" name="btnsignin" class="btn btn-primary">Log In</button>
                     </div>
                     <hr>
                 </form>
             </div>
             <div class="col-lg-6">
                 <img src="../img/Homepage.png">
             </div>
         </div>
     </div>
     <!-- End of Login Form -->
</body>
</html>

<?php include ('../Includes/footer.php'); ?>