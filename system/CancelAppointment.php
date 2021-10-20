
  <?php
  include ('../Includes/Config.php'); 
$Appointment_ID = $_GET['Appointment_ID']; 

$del = mysqli_query($connection,"UPDATE appointment SET Appointment_Status = 'Cancelled' WHERE Appointment_ID='$Appointment_ID'"); 

if($del)
{
    mysqli_close($connection); 
    echo "<script>alert('Appointment Cancelled, Redirecting..');window.location.href='AppointmentHistory.php';</script>";
}
else
{
    echo "Error updating record"; 
}


?>