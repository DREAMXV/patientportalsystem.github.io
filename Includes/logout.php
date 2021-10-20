<?php 
session_start();
if (isset($_SESSION['Admin_ID'])) {
 	unset($_SESSION['Admin_ID']);
 	echo "<br><center><div id='bye' role='alert'>See You Soon !</div></center>";
	header("Refresh:1.5; url=../system/index.php");
 	}

if (isset($_SESSION['Patient_ID'])) {
 	unset($_SESSION['Patient_ID']);
 	echo "<br><center><div id='bye' role='alert'>See You Soon !</div></center>";
	header("Refresh:1.5; url=../system/index.php");
 	}
if (isset($_SESSION['Doctor_ID'])) {
   unset($_SESSION['Doctor_ID']);
   echo "<br><center><div id='bye' role='alert'>See You Soon !</div></center>";
   header("Refresh:1.5; url=../system/index.php");
   }

 ?>

 <style>
body{
   background-color:cadetblue;
 }

 #bye{
  background-color: black;
  position: relative;
  width: 100%;
  color: white;
  text-align: center;
  font-size: 40px;
 }
 </style>