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
        <table id="myTable" class="table table-stripped table-primary table-hover " cellpadding ="25px" align="center">
        <tr>
            <th>Doctor ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Speciality</th>
            <th>Education</th>
            <th>Email</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
        <?php 

            while ($result=mysqli_fetch_assoc($data))
             {
                echo "<tr>

                    <td>".$result['Doctor_ID']."</td>
                    <td >".$result['Name']."</td>
                    <td>".$result['Gender']."</td>
                    <td>".$result['Contact']."</td>
                    <td class='fullName'>".$result['Speciality']."</td>  
                    <td>".$result['Education']."</td>
                    <td>".$result['Email']."</td>
                    
                    <td><a class='btn btn-warning' href='Appointment.php? 
                                Doctor_ID=$result[Doctor_ID] & 
                                Name=$result[Name] &
                                Gender=$result[Gender] &
                                Contact=$result[Contact] &
                                Education=$result[Education] &
                                Speciality=$result[Speciality] &
                                Email=$result[Email]'> Get Appointment </a> 
                    <td><a class='btn btn-warning' href='SentMsg.php? 
                            Email=$result[Email]'> Message </a>          
                     </tr>";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
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
    <input type="text" id="myInput" placeholder="Search by Speciality" class="form-control">
    </div>
 
</table>

</div>
<script src="../js/script.js"></script>   
</body>
</html>

<?php include ('../Includes/footer.php'); ?>