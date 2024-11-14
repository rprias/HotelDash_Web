<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Jquery Time Picker  -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <!-- Jquery Date Picker  -->
  <link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/
ui-lightness/jquery-ui.css'
        rel='stylesheet'>
      
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>
    <!-- Jquery Date Picker End -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!-- Google Fonts  -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">

<!-- font awesome  -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/292f8aaa1c.js" crossorigin="anonymous"></script>

<!-- Styling -->
 <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->

<link rel="stylesheet" href="../assets/css/clientStyle.css">
<link rel="stylesheet" href="../assets/css/booking_card.css">
<link rel="stylesheet" href="../assets/css/nav-tabs.css">


</head>
<body>

 
<?php 
include('../include/functions.php');
include('../include/general.php');

if(isset($_SESSION['loggedUserId'])) {
    $id = $_SESSION['loggedUserId'];
    $s="select * from  users_details where UserId='$id' ";
    $result=mysqli_query($con,$s) or die ('failed to query');
    $user_details= mysqli_fetch_assoc($result);
   
}
  
  if(isset($user_details['Email'])){
  ?>
   <!-- navbar segunda (de cara al usuario registrado)  -->
   <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <div class="container">
      <a class="navbar-brand " href="#"> <i class="fa-solid fa-hotel"></i><?php echo $general_setting['Name'] ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link"  href="../index.php">Hotel
                </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../about.php"> Quienes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gallery.php">Galeria</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../service.php">Servicios</a>
          </li>
        
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reservar
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="room.php">Habitaciones</a>
            <a class="dropdown-item" href="event.php">Salones de Eventos</a>
            <a class="dropdown-item" href="mybooking.php">Mis Reservas</a>
            
          </div>
          </li>   
        
          <li class="nav-item">
            <a class="nav-link" href="../events.php">Salones de Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact.php">Contáctenos</a>
          </li>
          </ul >
          
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="http://localhost/HotelDash_Web/assets/picture/profiles/<?php echo $user_details['ProfileImage']; ?>" width="40" height="40" class="rounded-circle" alt="Perfil de Usuario" />
          <?php echo $user_details['Nombre']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="dashboard.php">Mis Reservas</a>
          <a class="dropdown-item" href="account.php">Editar Datos</a>
          <a class="dropdown-item" href="../destroy.php">Salir</a>
        </div>
      </li>   
        </ul>
        
      </div>
    </div>
  </nav>

  
 <?php } else{ ?>
  
    <!-- Navigation -->
     <!-- navbar segunda (de cara al usuario no registrado)  -->
 
<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <div class="container">
    <a class="navbar-brand " href="#"> <i class="fa-solid fa-hotel"></i><?php echo $general_setting['Name'] ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item Active">
            <a class="nav-link"  href="../index.php">Hotel
                </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../about.php"> Quienes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gallery.php">Galeria</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../service.php">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../events.php">Salones de Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact.php">Contáctenos</a>
          </li>
          </ul >
          <ul class="navbar-nav ml-auto">
           <li class="nav-item">
            <a class="nav-link " style="font-size: 18px !important;" href="../login.php">Ingreso</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 18px !important;" href="../signup.php">Registro</a>
          </li>
      
        </ul>
      </div>
    </div>
  </nav>


 <?php } ?>