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

    <!-- CSS y JS de jQuery y jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/292f8aaa1c.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/gallery.css">
    <link rel="stylesheet" href="assets/css/form_style.css">

    <style>
        /* Estilo personalizado para la barra de navegación */
        #navbar_top {
            background-color: #d7b49c; /* Color de café claro */
        }
        .navbar-nav .nav-link {
            color: black; /* Cambia el color del texto a negro */
        }
        .navbar-brand {
            color: black; /* Cambia el color del texto del brand a negro */
        }
        .navbar-nav .nav-item.active .nav-link {
            font-weight: bold; /* Mantiene el texto en negrita para el elemento activo */
            color: black; /* Asegura que el color del texto activo sea negro */
        }
    </style>
</head>
<body>

<!-- Navegación para usuarios logueados -->
<?php 
include('functions.php');
include('general.php');

if(isset($_SESSION['loggedUser  Id'])) {
    $id = $_SESSION['loggedUser  Id'];
    $s = "SELECT * FROM users_details WHERE UserId='$id'";
    $result = mysqli_query($con, $s) or die('failed to query');
    $user_details = mysqli_fetch_assoc($result);
}
  
$current_page = basename($_SERVER['PHP_SELF']); // Obtiene el nombre del archivo actual

if(isset($user_details['Nombre'])) {
?>
    <!-- Navbar para usuario logueado -->
    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-hotel"></i><?php echo $general_setting['Name'] ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse ="navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="index.php">Hotel</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'nosotros.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="nosotros.php">Quienes Somos</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'Galeria.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="Galeria.php">Galeria</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'Servicios.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="Servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item dropdown <?php echo in_array($current_page, ['client/room.php', 'client/event.php', 'client/mybooking.php']) ? 'active' : ''; ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Reservar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="client/room.php">Habitaciones</a>
                            <a class="dropdown-item" href="client/event.php">Salon de Eventos</a>
                            <a class="dropdown-item" href="client/mybooking.php">Mis Reservas</a>
                        </div>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'Eventos.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="Eventos.php">Salon de Eventos</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'Contacto.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="Contacto.php">Contáctenos</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="http://localhost/HotelDash_Web/assets/picture/profiles/<?php echo $user_details['ProfileImage']; ?>" width="40" height="40" class="rounded-circle" alt="Perfil de Usuario" />
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

<?php } else { ?>
    <!-- Navegación para usuario no logueados -->
    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-hotel"></i><?php echo $general_setting['Name'] ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Hotel</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'nosotros.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="nosotros.php">Quienes Somos</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'Galeria.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href ="Galeria.php">Galeria</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'Servicios.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="Servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'Eventos.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="Eventos.php">Salones de Eventos</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'Contacto.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="Contacto.php">Contáctenos</a>
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
<?php } ?>
</body>
</html>