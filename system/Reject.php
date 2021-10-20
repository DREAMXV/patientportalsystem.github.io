
  <?php
  include ('../Includes/Config.php'); 
$Req_ID = $_GET['Req_ID']; 

$del = mysqli_query($connection,"UPDATE prescription_request SET Status = 'Rejected' WHERE Req_ID='$Req_ID'"); 

if($del)
{
    mysqli_close($connection); 
    echo "<script>alert('Request Rejected, Redirecting..');window.location.href='ViewRequest.php';</script>";
}
else
{
    echo "Error updating record"; 
}


?>