<?php 
session_start();
    include '../Includes/Config.php';
    
$Result_ID = $_GET['Result_ID'];
$select    = "SELECT * FROM lab_result where Result_ID='$Result_ID' ";
$query     = mysqli_query($connection, $select);
$Fetch     = mysqli_fetch_array($query);

$doc = $Fetch['Result_File'];
$files = $doc;
 
 # create new zip opbject
 $zip = new ZipArchive();
 
 # create a temp file & open it
 $tmp_file = tempnam('.','');
 $zip->open($tmp_file, ZipArchive::CREATE);
 
 # loop through each file
 foreach($files as $file)
 {
 
 # download file
 $download_file = file_get_contents($file);
 
 #add it to the zip
 $zip->addFromString(basename($file),$download_file);
 
 }
 
 # close zip
 $zip->close();

 


 
 # send the file to the browser as a download
 header('Content-disposition: attachment; filename=LabResult.zip');
 header('Content-type: application/zip');
 readfile($tmp_file);

 

echo "<script>window.location='MedicalRecordView.php'</script>";
?>