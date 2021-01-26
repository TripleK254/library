<?php
include "includes/functions.php";
include "dbh.inc.php";

session_start();
date_default_timezone_set("Africa/Nairobi");
ob_start();
//ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="icon" type="image/gif" href="<i class='fas fa-book-reader'></i>" />

<title>LMS-social protection</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="fontawesome-free-5.7.2-web/css/all.min.css"><!--Icons-->
<link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap core CSS -->
<link href="sidebar.css" rel="stylesheet"><!-- Custom styles for sidebars -->
<link href="custom.css" rel="stylesheet"><!-- Custom styles for sidebars -->
<script src="includes/jquery/jquery-3.3.1.min.js"></script><!-- jquery -->
<script src="includes/jquery-3.3.1.min.js"></script> 



</head>

<body>
<div class="jumbotronh" style="padding-top: 1%;padding-bottom: 0.05%;background-color: #fff;">
   <img class="img-fluid" style="width: 18%;margin: 0px;padding: 0px;" src="images/logo.jpg"><!--:::::LOGO:::::: -->
</div>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" >
      <div class="sidebar-heading " style="background-color: #343a40;color: #fff;">Online Library</div>
      
           
      <div class="list-group list-group-flush" >
        <div id="navlist" >
        <ul >
        <li> 
          <?php if(isset($_SESSION['id'])) 
                 {
                  echo "<center style='color: #fff;
';><img class='img-profile rounded-circle' src='https://source.unsplash.com/QAB-WJcbgJk/60x60'><br>
              <h5> ".$_SESSION['uname']." </h5></center>";
                 }?>
         </li>
        <li ><a href="index.php" ><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
        <li  ><a href="#" ><i class="fab fa-stripe-s"></i>Social Protection</a>
            <div class="sublist">
        <a href="displaybook.php?d=<?php echo 'Evaluation publication' ?>" >Evaluation publication</a>
        <a href="displaybook.php?d=<?php echo 'Gvt press gazette' ?>" >Gvt press gazette</a>
        <a href="displaybook.php?d=<?php echo 'Poverty studies' ?>" >Poverty studies</a>
        <a href="displaybook.php?d=<?php echo 'Policy documents' ?>" >Policy documents</a>
        <div class='btn-group dropright' >
          <a href="" data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Protection <i class='fas fa-sort-down' style='font-size: 25px;'></i>
          </a>
          <div class='dropdown-menu' >
            <!-- Dropdown menu links -->
                <a class='dropdown-item' style='color: #000;' href="displaybook.php?d=<?php echo 'child protection' ?>" >Child</a>
                <a class='dropdown-item' style='color: #000;' href="displaybook.php?d=<?php echo 'social protection' ?>" >Social protection</a>
          </div>
        </div>
        <a href="displaybook.php?d=<?php echo 'Health' ?>" >Health</a>
        <a href="displaybook.php?d=<?php echo 'Labour and Employer' ?>" >Labour and Employer</a>
        <a href="displaybook.php?d=<?php echo 'Documentaries' ?>" >Documentaries</a>
        <div class='btn-group dropright' >
          <a href='' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
           Country studies <i class='fas fa-sort-down' style='font-size: 25px;'></i>
          </a>
          <div class='dropdown-menu' >
            <!-- Dropdown menu links -->
              <a class='dropdown-item' style='color: #000;' href="displaybook.php?d=<?php echo 'kenya' ?>"  >Kenya</a>
              <a class='dropdown-item' style='color: #000;' href="displaybook.php?d=<?php echo 'ethiopia' ?>"  >Ethiopia</a>
              <a class='dropdown-item' style='color: #000;' href="displaybook.php?d=<?php echo 'south africa' ?>"  >South Africa</a>
          </div>
        </div>

        <div class='btn-group dropright' >
          <a href='' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Studies <i class='fas fa-sort-down' style='font-size: 25px;'></i>
          </a>
          <div class='dropdown-menu' >
            <!-- Dropdown menu links -->
                <a class='dropdown-item' style='color: #000;' href="displaybook.php?d=<?php echo 'studies sitam' ?>" >Sitam</a>

          </div>
        </div>
            </div><!--end of sublist  -->

        </li>
        <?php
        if(isset($_SESSION['id'])) 
            {
              if($_SESSION['id']<2) 
              {
               echo "<li><a href='addbook.php'><i class='fas fa-book-medical'></i>Add Book</a></li>";
              }
           
           }
        ?>
      </ul>
      </div><!--closing the navlist  -->
      </div><!--  -->
    </div><!-- /#sidebar-wrapper -->
    

    <!-- Page Content -->
<div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-dark border-bottom sticky-top">
        <button class="btn btn-secondary" id="menu-toggle">Main Menu</button>
         <!-- ----------------SEARCH BAR------------------ -->
   <nav class='navbar navbar-dark bg-dark' style='float:right;'>
    <form class='form-inline' action='displaybook.php' method='POST'>
      <input class='form-control mr-sm-2' type='search' name='search' placeholder='Search' aria-label='Search' required>
      <button class='btn btn-outline-success my-2 my-sm-0' type='submit' name='searchbook'>Search book</button>
    </form>
  </nav>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                           
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><i class='fas fa-home'></i>HOME <span class="sr-only"></span></a>
            </li>
            <li class='nav-item active'>
              <?php 
              if( !isset($_SESSION['id'])) 
               {
               echo "
               <a class='nav-link' href='register.php'><i class='fas fa-user-plus'></i>Register<span class='sr-only'></span></a>
               ";
               } ?>
            </li>

               <?php
              // +++++++++++++++++++++++++profile++++++++++++++++++++++++++++
               if(isset($_SESSION['id'])) 
                 {
                 echo "
                   <li class='nav-item active'>
                    <a class='nav-link' href='file.php'><i class='fas fa-upload'></i>Upload file <span class='sr-only'></span></a>
                   </li>
                   <li class='nav-item active'>
                    <a class='nav-link' href='file.php'><i class='fas fa-folder-open'></i>File <span class='sr-only'></span></a>
                   </li>
                    <li class='nav-item dropdown' style='color:white;'>
                      <a class='nav-link dropdown-toggle' href='' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' >
                        <i class='far fa-user'></i>";
                            if($_SESSION['id']==1)
                               {
                                echo "ADMIN";
                               }
                               else
                               {
                                echo "PROFILE";
                               }
                                                     
                           
                      echo "
                      </a>
                      <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='resetpass.php'>Settings</a>
                          <div class='dropdown-divider'></div>
                        <form method='POST' action='".logout($conn)."'>
                          <center><li class='navbar-item'><button class='dropdown-item'class='btn btn-light' type='submit' name='submit_logout'>LOGOUT</button></li></center>
                        </form>
                      </div>
                    </li>";//End of dropdown list 
                 }
                else
                 {
                  echo "
                    <li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' href='' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fas fa-sign-in-alt'></i>LOGIN
                      </a>
                      <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='login_user.php'>ADMIN LOGIN</a>
                          <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='login_user.php'>USER LOGIN</a>
                      </div>
                    </li>";//End of dropdown list 
                 }

              ?>
             
          </ul>
        </div>
   </nav><!--closing the nav -->

      





