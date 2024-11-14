<!DOCTYPE html>
<html lang="es">
<head>
<!-- Establece la codificación de caracteres del documento HTML -->
<meta charset="UTF-8"> 

<!-- Indica a Internet Explorer que use el modo de renderizado más reciente -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Configura la ventana de visualización para dispositivos móviles -->
<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Inclusion de FavIcon -->
    <link rel="icon" href="assets/picture/icons/favicon.png" type="image/x-icon">

    <!-- bootstrap  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!-- Google Fonts  -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">

<!-- font awesome  -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">;
<script src="https://kit.fontawesome.com/292f8aaa1c.js" crossorigin="anonymous"></script>

<!-- Styling -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/gallery.css">
<link rel="stylesheet" href="assets/css/form_style.css">
</head>
<body>

 
<?php 
// Incluir archivos de funciones y configuraciones generales
include('functions.php');
include('general.php');

// Verificar si el usuario está logueado mediante la sesión
if(isset($_SESSION['loggedUser Id'])) {
    // Obtener el ID del usuario logueado
    $id = $_SESSION['loggedUser Id'];
    
    // Consulta para obtener detalles del usuario
    $s = "SELECT * FROM users_details WHERE UserId='$id'";
    $result = mysqli_query($con, $s) or die ('failed to query');
    
    // Obtener los detalles del usuario como un array asociativo
    $user_details = mysqli_fetch_assoc($result);
}
  
// Verificar si se han obtenido los detalles del usuario
if(isset($user_details['Nombre'])) {
?>
   <!-- Navbar para usuarios logueados -->
   <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="fa-solid fa-hotel"></i><?php echo $general_setting['Name'] ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Hotel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Quienes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.php">Galería</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="service.php">Servicios</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Reservar
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="client/room.php">Habitaciones</a>
              <a class="dropdown-item" href="client/event.php">Salón de Eventos</a>
              <a class="dropdown-item" href="client/mybooking.php">Mis Reservas</a>
            </div>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="events.php">Salón de Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contáctenos</a>
          </li>
        </ul>
        
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <!-- Mostrar el nombre del usuario logueado -->
              <?php echo $user_details['Nombre']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="client/dashboard.php">Mis Reservas</a>
              <a class="dropdown-item" href="client/account.php">Editar Datos</a>
              <a class="dropdown-item" href="destroy.php">Salir</a>
            </div>
          </li>   
        </ul>
        
      </div>
    </div>
  </nav>
  
<?php 
} else { 
  // Navbar para usuarios no logueados
?>
  
<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="fa-solid fa-hotel"></i><?php echo $general_setting['Name'] ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Hotel</ </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Quienes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.php">Galería</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="service.php">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php">Salones de Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contáctenos</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" style="font-size: 18px !important;" href="login.php">Ingreso</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 18px !important;" href="signup.php">Registro</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php 
} 
?>