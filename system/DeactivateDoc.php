
  <?php
  include ('../Includes/Config.php'); 
$Doctor_ID = $_GET['Doctor_ID']; 

$del = mysqli_query($connection,"UPDATE doctor SET Activity_Status = 'Inactive' WHERE Doctor_ID='$Doctor_ID'"); 

if($del)
{
    mysqli_close($connection); 
    echo "<script>alert('Doctor Data Update, Redirecting..');window.location.href='ListOfDoctor.php#delete';</script>";
}
else
{
    echo "Error updating record"; 
}


?>