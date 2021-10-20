<?php include ('../Includes/header.php'); 
      include ('../Includes/config.php'); 

    $id = $_SESSION['Patient_ID'];
    $query = "SELECT * 
                FROM prescription_request p, medical_record m , appointment a 
                WHERE p.Record_ID = m.Record_ID 
                AND m.Appointment_ID = a.Appointment_ID 
                AND a.Patient_ID = '$id'";
    $data  = mysqli_query($connection,$query);
    $total = mysqli_num_rows($data);

   if ($total != 0) 
    {
        ?>

       <table id="myTable" class="table table-stripped table-primary table-hover "  align="center">
        <tr>
            <th>Req ID</th>
            <th>Record ID</th>
            <th>Note</th>
            <th>Status</th>
        </tr>
        <?php 

            while ($result=mysqli_fetch_assoc($data))
             {
                echo "<tr>
                    <td>".$result['Req_ID']."</td>
                    <td class='fullName'>".$result['Record_ID']."</td>
                    <td>".$result['Note']."</td>
                    <td>".$result['Status']."</td>

                
                     </tr>";
            }   
    }?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Portal - Prescription Request History</title>
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
    <input type="text" id="myInput" placeholder="Search by Record ID" class="form-control">
    </div>
 
</table>
</div>
<script src="../js/script.js"></script>   
</body>
</html>

<?php include ('../Includes/footer.php'); ?>