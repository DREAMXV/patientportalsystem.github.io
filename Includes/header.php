<!-- Site Icon -->
<link rel="icon" href="../img/logo.png"> 
<?php
session_start();


///////////////////Admin Header/////////////////////////////
if (isset($_SESSION['Admin_ID']))
{
    echo "
      <nav class='navbar sticky-top navbar-expand-lg navbar-dark'> 
         <div class='container-fluid'>
        <a class='navbar-brand' href='#'>
        <img src='../img/logo.png' alt='logo-png' width='55' height='55'>Patient Portal</a> 
         <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
         data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false'
         aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav ms-auto'>

                <li class='nav-item'>

                <a class='nav-link active' aria-current='page' href='AdminHome.php'>
                <span class='fas fa-Home fa-lg '></span> Home</a>
                </li>
                <li class='nav-item'>
                   <a class='nav-link' href='DoctorRegistration.php'><i class='fas fa-user-md fa-lg'></i> Doctor Register</a>
                </li>
                <li class='nav-item'>
                   <a class='nav-link' href='../Includes/logout.php'><i class='fas fa-sign-in-alt fa-lg'></i> Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav> ";
}
///////////////////////Patient/////////////////////////////////////////////
elseif (isset($_SESSION['Patient_ID']))
{
    echo "
        <nav class='navbar sticky-top navbar-expand-lg navbar-dark'> 
    <div class='container-fluid'>
        <a class='navbar-brand' href='#'>
            <img src='../img/logo.png' alt='logo-png' class='site-logo'>Patient Portal</a>
         <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
         data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false'
         aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav ms-auto'>
                <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='PatientHome.php'><i class='fas fa-Home fa-lg'></i> Home </a> 
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../Includes/Logout.php'><i class='fas fa-sign-in-alt fa-lg'></i> Logout </a> 
                </li>
            </ul>
        </div>
    </div>
 </nav>";
}
/////////////////Doctor///////////////////////////
else if (isset($_SESSION['Doctor_ID']))
{
    echo "
      <nav class='navbar sticky-top navbar-expand-lg navbar-dark'> 
         <div class='container-fluid'>
        <a class='navbar-brand' href='#'>
        <img src='../img/logo.png' alt='logo-png' width='55' height='55'>Patient Portal</a> 
         <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
         data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false'
         aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav ms-auto'>

                <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='DoctorHome.php'><i class='far fa-user fa-lg'></i> Dashboard</a>
                </li>
                 <li class='nav-item'>
                   <a class='nav-link' href='../Includes/Logout.php'><i class='fas fa-sign-in-alt fa-lg'></i> Log out</a>
                </li>   
            </ul>
        </div>
    </div>
</nav> ";
}
else
{
    echo "
        <nav class='navbar sticky-top navbar-expand-lg navbar-dark'> 
    <div class='container-fluid'>
        <a class='navbar-brand' href='#'>
            <img src='../img/logo.png' alt='logo-png' class='site-logo'>Patient Portal</a>
         <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
         data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false'
         aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav ms-auto'>
                <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='index.php'><i class='fas fa-Home fa-lg'></i> Home </a> 
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='PatientRegistration.php'><i class='fab fa-wpforms fa-lg'></i> Register </a> 
                </li>
            </ul>
        </div>
    </div>
 </nav>";
}
?>
 