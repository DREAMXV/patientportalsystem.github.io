<?php 
include ('../Includes/config.php');
session_start();
// Patient Reg//
if (isset($_POST['btnregister'])) {

    $First_Name = $_POST['First_Name'];
    $Last_Name  = $_POST['Last_Name'];
    $DOB        = $_POST['DOB'];

    $SSN     = $_POST['SSN'];
    $Contact = $_POST['Contact'];
    $Address = $_POST['Address'];

    $Gender     = $_POST['Gender'];
    $Allergies  = $_POST['Allergies'];
    $Email      = $_POST['Email'];
    $Password   = md5($_POST['Password']);    
   
    $Marital_Status    =  $_POST['Marital_Status'];
    $Guardian_Contact  =  $_POST['Guardian_Contact'];
    $Guardian_Name     =  $_POST['Guardian_Name'];
    $Guardian_Relation =  $_POST['Guardian_Relation'];  
    

/////////////////////////Checking Existing Email////////////////////////////////////
    $CheckEmail = "SELECT * FROM Patient WHERE Email='$Email'";
    $result     =  mysqli_query($connection,$CheckEmail);
    $count      =  mysqli_num_rows($result);

    if ($count > 0) 
    { 
     echo "<script>alert('Email exists , Try Again!');window.location.href='PatientRegistration.php';</script>";
    }
/////////////////////////Checking Existing Contact No////////////////////////////////////
    $CheckContact = "SELECT * FROM Patient WHERE Contact='$Contact'";
    $result       =  mysqli_query($connection,$CheckContact);
    $count        =  mysqli_num_rows($result);

    if ($count > 0) 
    { 
     echo "<script>alert('Contact Exists,Try Again!');window.location.href='PatientRegistration.php';</script>";
    }
/////////////////////////Checking Existing Social Security Number////////////////////////////////////
    $CheckSSN   = "SELECT * FROM Patient WHERE SSN='$SSN'";
    $result     =  mysqli_query($connection,$CheckSSN);
    $count      =  mysqli_num_rows($result);

    if ($count > 0) 
    { 
     echo "<script>alert('Social Security Number Exists,Please check the input and try again');window.location.href='PatientRegistration.php';</script>";
    }
/////////////////////////Checking Existing Guardian Contact No////////////////////////////////////
    $CheckGC    = "SELECT * FROM Patient WHERE Guardian_Contact='$Guardian_Contact'";
    $result     =  mysqli_query($connection,$CheckGC);
    $count      =  mysqli_num_rows($result);    

    if ($count > 0) 
    { 
     echo "<script>alert('Contact  Exists,Try Again');window.location.href='PatientRegistration.php';</script>";
    }
////////////////Adding Data if NO Error///////////////////////////
    $dbquery = "INSERT INTO Patient (First_Name    , Last_Name      , DOB,
                                     SSN           , Contact        , Address, 
                                     Gender        , Allergies      , Email,
                                     Password      , Marital_Status , Guardian_Contact,
                                     Guardian_Name , Guardian_Relation  ) 

                VALUES('$First_Name'    , '$Last_Name'      , '$DOB',
                       '$SSN'           , '$Contact'        , '$Address', 
                       '$Gender'        , '$Allergies'      , '$Email',
                       '$Password'      , '$Marital_Status' , '$Guardian_Contact',
                       '$Guardian_Name' , '$Guardian_Relation'  ) ";

    $dataquery = mysqli_query($connection, $dbquery);
    if ($dataquery)
     {
         echo "<script>alert('User Registration Success, Login to access! ');window.location.href='index.php';</script>";
     }
     else
     {
         mysqli_error($connection);
     }
}
 ?>

 <!-- Admin Register -->
<?php 
    if (isset($_POST['btnRegister'])) {
        $Name     = $_POST['Name'];
        $Email    = $_POST['Email'];
        $Password = md5($_POST['Password']);
        
// Checking Duplicating Email //
    $CheckEmail = " SELECT * FROM admin a, patient p , doctor d WHERE Email='$Email'";
    $result     = mysqli_query($connection,$CheckEmail);
    $count      = mysqli_num_rows($result);

    if ($count > 0) 
    { 
      echo "<script>window.alert('Email Exists,Try Again.')</script>";
      echo "<script> window.location='AdminRegister.php' </script>";
    }else{
        $dbquery = "INSERT INTO admin (Name, Email, Password) 
                    VALUES('$Name', '$Email', '$Password')";
                
    $dataquery =mysqli_query($connection, $dbquery);
    if ($dataquery)
     {
        echo "<script>window.alert('Registration Success , Redirecting to Login.') </script>";
        echo "<script>window.location='index.php' </script>";
     }
     else
     {
         mysqli_error($connection);
     }
    }    
}
 ?> <!-- End of Admin Register -->

<!-- Pat UPdate -->
<?php 
    if (isset($_GET['btnUpdate'])) {
    $Patient_ID = $_GET['Patient_ID'];
    $First_Name = $_GET['First_Name'];
    $Last_Name  = $_GET['Last_Name'];
    $DOB        = $_GET['DOB'];

    $SSN     = $_GET['SSN'];
    $Contact = $_GET['Contact'];
    $Address = $_GET['Address'];

    $Gender     = $_GET['Gender'];
    $Allergies  = $_GET['Allergies'];
    $Email      = $_GET['Email'];
      
    $Marital_Status    =  $_GET['Marital_Status'];
    $Guardian_Contact  =  $_GET['Guardian_Contact'];
    $Guardian_Name     =  $_GET['Guardian_Name'];
    $Guardian_Relation =  $_GET['Guardian_Relation'];  

    $query= "
        UPDATE patient SET First_Name='$First_Name',
                           Last_Name='$Last_Name',
                           DOB='$DOB',
                           SSN='$SSN',
                           Contact='$Contact',
                           Address='$Address',
                           Gender='$Gender',
                           Allergies='$Allergies',
                           Email='$Email',
                           Marital_Status='$Marital_Status',
                           Guardian_Contact='$Guardian_Contact',
                           Guardian_Name='$Guardian_Name',
                           Guardian_Relation='$Guardian_Relation'
        WHERE Patient_ID='$Patient_ID'
        ";
   $data=mysqli_query($connection,$query);

       if ($data)
       {
        echo "<script>alert('Data Updated');window.location.href='PatientProfile.php';</script>";
       }   
  else
  {
    echo "<font color='red'>Update Failed,Try Again </font> ";
  }
}
 ?>
 <!-- Login -->
 <?php 
    if (isset($_POST['btnsignin'])) 
        {
            $Email    =  $_POST['Email'];   
            $Password =  md5($_POST['Password']);

            $query  = "SELECT * FROM Admin   WHERE Email   = '$Email'";
            $query2 = "SELECT * FROM Patient WHERE Email   = '$Email'";
            $query3 = "SELECT * FROM Doctor  WHERE Email   = '$Email'";
            
            $resultAdmin   = mysqli_query($connection, $query);
            $resultPatient = mysqli_query($connection, $query2);
            $resultDoctor  = mysqli_query($connection, $query3);
            
    ///////////////////////////CHECKING ADMIN LOGIN/////////////////////////////
        if(mysqli_num_rows($resultAdmin)>0){
        while($row   = mysqli_fetch_assoc($resultAdmin)){
            $dbAdmin_ID = $row['Admin_ID'];
            $dbname  = $row['Name'];
            $dbemail = $row['Email'];
            $dbpass  = $row['Password'];
        }
        if($Email == $dbemail && $Password == $dbpass){
            $_SESSION['Admin_ID' ]=$dbAdmin_ID;
            $_SESSION['Email']=$dbemail;
             
            echo "<script>alert('Logging In');window.location.href='AdminHome.php';</script>";
        }
        else
        {
            echo "<script>alert('Email and Password does not match.');window.location.href='index.php'</script>";
        }
///////////////////////////CHECKING PATIENT LOGIN////////////////////////////////////////////////   

}elseif(mysqli_num_rows($resultPatient)>0){
    while($row    = mysqli_fetch_assoc($resultPatient)){
        $dbPatient_ID = $row['Patient_ID'];
        $dbFirst_Name = $row['First_Name'];
        $dbLast_Name  = $row['Last_Name'];
        $dbDOB        = $row['DOB'];

        $dbSSN     = $row['SSN'];
        $dbContact = $row['Contact'];
        $dbAddress = $row['Address'];
        $dbGender  = $row['Gender'];

        $dbAllergies        = $row['Allergies'];
        $dbemail            = $row['Email'];
        $dbpass             = $row['Password'];
        $dbMarital_Status   = $row['Marital_Status'];
        
        $dbGuardian_Contact  = $row['Guardian_Contact'];
        $dbGuardian_Name     = $row['Guardian_Name'];
        $dbGuardian_Relation = $row['Guardian_Relation'];

    }
    if($Email == $dbemail && $Password == $dbpass){
        $_SESSION['Email']  = $dbemail;
        $_SESSION['Patient_ID']    = $dbPatient_ID;
    
        echo "<script>alert('Logging In');window.location.href='PatientHome.php';</script>";
    }else{
        echo "<script>alert('Email and Password does not match.');window.location.href='index.php'</script>";
        }
}
elseif(mysqli_num_rows($resultDoctor)>0){
    while($row = mysqli_fetch_assoc($resultDoctor)){
        $dbDoctor_ID = $row['Doctor_ID'];
        $dbname = $row['Name'];
        $dbDOB  = $row['DOB'];
        $dbSSN  = $row['SSN'];

        $dbGender     = $row['Gender'];
        $dbContact    = $row['Contact'];
        $dbEducation  = $row['Education'];
        $dbSpeciality = $row['Speciality'];

        $dbActivityStatus = $row['Activity_Status'];
        $dbemail          = $row['Email'];
        $dbpass           = $row['Password'];

        }
        if($Email == $dbemail && $Password == $dbpass){
            $_SESSION['Email'] = $dbemail;
            $_SESSION['Doctor_ID']  = $dbDoctor_ID;
            
            echo "<script>alert('Logging In');window.location.href='DoctorHome.php';</script>";
            
        }else{
         echo "<script>alert('Email and Password does not match.');window.location.href='index.php'</script>";
        }
        
}else{
    echo "<script>alert('Account does not Exist.');window.location.href='index.php'</script>";
}
    }
  ?>




 <!-- Doc Reg -->
 <?php 
 if (isset($_POST['btnCreate'])) {
    $Name = $_POST['Name'];
    $DOB  = $_POST['DOB'];
    $SSN  = $_POST['SSN'];

    $Gender   = $_POST['Gender'];
    $Contact  = $_POST['Contact'];
    $Education = $_POST['Education'];

    $Speciality = $_POST['Speciality'];
    $Activity_Status = $_POST['Activity_Status'];
    $Email      = $_POST['Email'];
    $Password   = md5($_POST['Password']);  

/////////////////////////Checking Existing Email////////////////////////////////////
    $CheckdEmail = " SELECT * FROM doctor WHERE Email='$Email'";
    $result     = mysqli_query($connection,$CheckdEmail);
    $count      = mysqli_num_rows($result);

  if ($count > 0) 
  { 
    echo"<script>alert('Email Existing,Try Again');window.location.href='DoctorRegistration.php';</script>";
  }
/////////////////////////Checking Existing Social Security Number////////////////////////////////////
    $CheckdSSN = " SELECT * FROM doctor WHERE SSN='$SSN'";
    $result     = mysqli_query($connection,$CheckdSSN);
    $count      = mysqli_num_rows($result);

  if ($count > 0) 
  { 
    echo"<script>alert('SSN Exists,Try Again');window.location.href='DoctorRegistration.php';</script>";
  }
/////////////////////////Checking Existing Contact Number////////////////////////////////////
    $CheckdCN = " SELECT * FROM doctor WHERE Contact='$Contact'";
    $result     = mysqli_query($connection,$CheckdCN);
    $count      = mysqli_num_rows($result);

  if ($count > 0) 
  { 
    echo"<script>alert('Contact Exists,Try Again');window.location.href='DoctorRegistration.php';</script>";
  }
////////////////Adding Data if NO Error///////////////////////////

    $dbquery = "INSERT INTO doctor (Name   ,   DOB     , SSN, 
                                    Gender ,   Contact , Education,
                                    Speciality,Activity_Status,Email  ,  Password) 

                    VALUES('$Name'   ,   '$DOB'     , '$SSN', 
                           '$Gender' ,   '$Contact' , '$Education',
                           '$Speciality','$Activity_Status','$Email'  ,  '$Password')";

    $dataquery =mysqli_query($connection, $dbquery);
    if ($dataquery)
     {
         echo "<script>alert('Doctor Registration Success, Redirecting..');window.location.href='AdminHome.php';</script>";
     }
     else
     {
         mysqli_error($connection);
     }
}
  ?>

<!-- Edit Doc -->
<?php 
  // $_GET['Name'];
  // $_GET['DOB'];
  // $_GET['SSN'];
  // $_GET['Gender'];

  // $_GET['Contact'];
  // $_GET['Education'];
  // $_GET['Speciality'];
  // $_GET['Email'];

  if(isset($_GET['Update']))
   {
    $Doctor_ID = $_GET['Doctor_ID'];
    $Name  = $_GET['Name'];
    $DOB   = $_GET['DOB'];

    $SSN     = $_GET['SSN'];
    $Gender  = $_GET['Gender'];

    $Contact     =  $_GET['Contact'];
    $Education   =  $_GET['Education'];
    $Speciality  =  $_GET['Speciality'];
    $Activity_Status  =  $_GET['Activity_Status'];
    $Email       =  $_GET['Email'];

   $query= "
            UPDATE doctor SET Name='$Name',DOB='$DOB',SSN='$SSN',Gender='$Gender',
            Contact='$Contact',Education='$Education',Speciality='$Speciality',Activity_Status='$Activity_Status',Email='$Email'
            WHERE Doctor_ID='$Doctor_ID'
            ";
   $data=mysqli_query($connection,$query);

       if ($data)
       {
        echo "<script>alert('Data Updated');window.location.href='ListOfDoctor.php';</script>";
       }   
  else
  {
    echo "<font color='red'>Update Failed,Try Again </font> ";
  }
}
 ?>

 <!-- MEssge -->
 <?php  
   date_default_timezone_set("Asia/Yangon");
    
    if (isset($_GET['btnSend'])) {
        $Sender_Email = $_GET['Sender_Email'];
        $Receiver_Email = $_GET['Receiver_Email'];
        $Title = $_GET['Title'];
        $Message_Content = $_GET['Message_Content'];
        $Message_Status = $_GET['Message_Status'];
        $Date_Send = $_GET['Date_Send'];
        $Time_Send = $_GET['Time_Send'];

    $dbquery = "INSERT INTO message (Sender_Email,Receiver_Email,Title,Message_Content,Message_Status,Date_Send,Time_Send) 
                VALUES('$Sender_Email','$Receiver_Email','$Title','$Message_Content','$Message_Status','$Date_Send','$Time_Send')";

    $dataquery =mysqli_query($connection, $dbquery);
    if ($dataquery)
     {
         echo "<script>alert('Message Sent!');window.location.href='MessageInbox.php';</script>";
     }
     else
     {
         mysqli_error($connection);
     }
 }
      ?>

<!-- Create Schedule Doctor -->
<?php 
    if (isset($_POST['btnCreateSchedule'])) {
        $Doctor_ID = $_POST['Doctor_ID'];
        $Available_Date = $_POST['Available_Date'];
        
    $CreateQuery = "INSERT INTO doctorschedule (Doctor_ID,Available_Date) 
                VALUES('$Doctor_ID','$Available_Date')";

    $dquery =mysqli_query($connection, $CreateQuery);
    if ($dquery)
     {
         echo "<script>alert('Schedule Added!');window.location.href='AdminHome.php';</script>";
     }
     else
     {
         mysqli_error($connection);
     }
 }
 ?>

 <!-- Get Appointment -->

 <?php 
if (isset($_POST['btnGetAppointment'])) {
    $Doctor_ID   = $_POST['Doctor_ID'];
    $Patient_ID  = $_POST['Patient_ID'];

    $Appointment_Date   = $_POST['Appointment_Date'];
    $Appointment_Time   = $_POST['Appointment_Time'];
    $Appointment_Status = $_POST['Appointment_Status'];

/////////////////////////Checking Existing Time Slot////////////////////////////////////
    $CheckSlot = " SELECT * FROM appointment WHERE Appointment_Time='$Appointment_Time' AND Doctor_ID='$Doctor_ID'";
    $result     = mysqli_query($connection,$CheckSlot);
    $count      = mysqli_num_rows($result);

    if ($count > 0) 
    { 
    echo"<script>alert('Appointment Time Slot Exists');window.location.href='SearchDoctor.php';</script>";

    }else{
    $dbquery = "INSERT INTO appointment (Doctor_ID,Patient_ID,Appointment_Date,Appointment_Time,Appointment_Status) 

                    VALUES('$Doctor_ID','$Patient_ID','$Appointment_Date','$Appointment_Time','$Appointment_Status')";

     $dataquery =mysqli_query($connection, $dbquery);
    if ($dataquery)
     {
         echo "<script>alert('Appointment Booking Success, Redirecting..');window.location.href='PatientHome.php';</script>";
     }
     else
     {
         mysqli_error($connection);
     }
 }
}
  ?>

<!-- Doctor UPdate -->
<?php 
if(isset($_POST['btnDocUpdate']))
   {
    $Doctor_ID =$_POST['Doctor_ID'];
    $Name  =$_POST['Name'];
    $DOB   =$_POST['DOB'];

    $SSN     =$_POST['SSN'];
    $Gender  =$_POST['Gender'];

    $Contact     = $_POST['Contact'];
    $Education   = $_POST['Education'];
    $Speciality  = $_POST['Speciality'];
    $Email       = $_POST['Email'];

   $query= "
            UPDATE doctor SET Name='$Name',DOB='$DOB',SSN='$SSN',Gender='$Gender',
            Contact='$Contact',Education='$Education',Speciality='$Speciality',Email='$Email'
            WHERE Doctor_ID='$Doctor_ID'
            ";
   $data=mysqli_query($connection,$query);

       if ($data)
       {
        echo "<script>alert('Data Updated');window.location.href='DoctorProfile.php';</script>";
       }   
  else
  {
    echo "<font color='red'>Update Failed,Try Again </font> ";
  }
}
 ?>
<!-- Appointemnt Medical Record -->
<?php 
if(isset($_POST['btnRecord']))
   {
    $Appointment_ID =$_POST['Appointment_ID'];
    $Diagnosis  =$_POST['Diagnosis'];
    $Med_Prescription   =$_POST['Med_Prescription'];

    $Summary     =$_POST['Summary'];
    $Note  =$_POST['Note'];
// Checking Appointment ID duplicating data////
    $CheckData = " SELECT * FROM medical_record WHERE Appointment_ID='$Appointment_ID'";
    $result     = mysqli_query($connection,$CheckData);
    $count      = mysqli_num_rows($result);

    if ($count > 0) 
    { 
    echo"<script>alert('Record with Appointment ID Exists');window.location.href='DoctorAppointmentHistory.php';</script>";
    }else{
    $dbquery = "INSERT INTO medical_record (Appointment_ID,Diagnosis,Med_Prescription,Summary,Note) 

                    VALUES('$Appointment_ID','$Diagnosis','$Med_Prescription','$Summary','$Note')";

     $dataquery =mysqli_query($connection, $dbquery);
    if ($dataquery)
     {
        $update = mysqli_query($connection,"UPDATE appointment SET Appointment_Status = 'Completed' WHERE Appointment_ID='$Appointment_ID'"); 
         echo "<script>alert('Data Recorded, Appointment Ended');window.location.href='DoctorAppointmentHistory.php';</script>";
     }
     else
     {
         mysqli_error($connection);
     }
 }
}
 ?>

 <!-- Req Prescriptio -->
 <?php 

if (isset($_GET['btnRequest'])) {
    $ID = $_GET['Record_ID'];
    $Note      = $_GET['Note'];
    $Status    = $_GET['Status'];

    // Check dup data
    $idcheck = "SELECT * FROM prescription_request WHERE Record_ID = '$ID'";
    $result  = mysqli_query($connection,$idcheck);
    $count   = mysqli_num_rows($result);

    if ($count > 0) {
        echo "<script>alert('User have already Requested Once!');window.location.href='PatientMedicalRecord.php';</script";
    }else{
        $dbquery = "INSERT INTO prescription_request(Record_ID,Note,Status)
                    VALUES('$ID ' , '$Note' ,'$Status')";
        $dataquery = mysqli_query($connection,$dbquery);
        if ($dataquery) {
            echo "<script>alert('Prescription Requested, Redirecting..');window.location.href='PrescriptionRequestHistory.php';</script>";
     }
 }
        }
    

  ?>

  <!-- Upload Result  -->
  <?php     

    if (isset($_POST['btnUpload'])) {
        $Appointment_ID =  $_POST['Record_ID'];
        $Test_Type =  $_POST['Test_Type'];

        $File     = $_FILES['Result_File']['name'];
        $Folder   = "patientLabResult/";
        $FileName = $Folder .'_'. $File;
        $copy     = copy($_FILES['Result_File']['tmp_name'],$FileName);
 
        if (!$copy)
        {
            echo "<p>Cannot Upload</p>";
            exit();
        }      
////////////////Adding Data if NO Error///////////////////////////
    $dbquery   = "INSERT INTO lab_result(Appointment_ID, Test_Type, Result_File) 
                  VALUES('$Appointment_ID', '$Test_Type', '$FileName')";
    $dataquery =  mysqli_query($connection, $dbquery);
    if ($dataquery)
     {
        echo "<script>window.alert('Upload Success') </script>";
        echo "<script>window.location='ListOfAppointment.php' </script>";
     }
     else
     {
         mysqli_error($connection);
     }
}
   ?>


<!-- Message Reply -->
<?php 
    if (isset($_GET['btnReply'])) {
    $Message_ID       = $_GET['Message_ID'];
    $Sender_Email     = $_GET['Sender_Email'];
    $Receiver_Email   = $_GET['Receiver_Email'];

    $Message_Reply    = $_GET['Message_Reply'];
    $Date_Replied     = $_GET['Date_Replied'];
    $Time_Replied     = $_GET['Time_Replied'];

    $Message_Status   = $_GET['Message_Status'];

    $dbquery = "INSERT INTO message_reply(Message_ID   , Sender_Email , Receiver_Email,
                                          Message_Reply, Date_Replied , Time_Replied  ,Message_Status)
                VALUES('$Message_ID'    , '$Sender_Email' , '$Receiver_Email',
                       '$Message_Reply' , '$Date_Replied' , '$Time_Replied'  ,'$Message_Status')";

    $dataquery = mysqli_query($connection,$dbquery);
        if ($dataquery) {
            $updte = mysqli_query($connection,"UPDATE message SET Message_Status = 'Replied' WHERE Message_ID='$Message_ID'");
            $updte3 = mysqli_query($connection,"UPDATE message_reply SET Message_Status = 'Replied' WHERE Message_ID='$Message_ID'"); 
            echo "<script>alert('Message Replied, Redirecting..');window.location.href='MessageInbox.php';</script>";
     }
     else
     {
         mysqli_error($connection);
     }
        }
 ?>