<?php include ('../Includes/header.php'); 
      include ('../Includes/Config.php'); 
      $todaydate = date('Y-m-d');
      $id = $_SESSION['Doctor_ID'];
      echo $todaydate;
/////////////////Count Daily Apointment/////////////////////
    $sql="SELECT count(*) FROM appointment WHERE Doctor_ID='$id' AND Appointment_Date = '$todaydate' AND Appointment_Status = 'Booked'";
    $result=mysqli_query($connection,$sql);
    $appointment=mysqli_fetch_array($result);



    $query = "SELECT * FROM appointment WHERE Doctor_ID = '$id' AND Appointment_Status = 'Booked' AND Appointment_Date = '$todaydate'      ORDER BY Appointment_ID ASC";
    $data  = mysqli_query($connection,$query);
    $total = mysqli_num_rows($data);

   if ($total != 0) 
    {
        ?>

       <table id="myTable" class="table table-stripped table-primary table-hover "  align="center">
        <tr>
            <th>Appointment ID</th>
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

                    <td>".$result['Appointment_ID']."</td>
                    <td class='fullName'>".$result['Patient_ID']."</td>
                    <td>".$result['Appointment_Date']."</td>
                    <td>".$result['Appointment_Time']."</td>
                    <td>".$result['Appointment_Status']."</td>  

                    <td><a class='btn btn-warning' onClick=\"javascript: return confirm('Please confirm changes');\"  href='EnterAppointment.php? 
                        Appointment_ID=$result[Appointment_ID] &
                        Patient_ID=$result[Patient_ID]'> Enter Appointment </a>    </td>   
                     </tr>";
            }   
    }?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Portal - Appointment History</title>
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
    <h4>Number of Appointment Today : <span><?php echo $appointment[0]; ?></span></h4>
    <div class="form-group mb-3">
    <input type="text" id="myInput" placeholder="Search by Patient ID" class="form-control">
    </div>
</div>
</table>
<script src="../js/script.js"></script>   
</body>
</html>

<?php include ('../Includes/footer.php'); ?>