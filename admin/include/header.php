<?php include('../include/functions.php');
include('../include/general.php');
?>
<!doctype html>
<html lang="es">
  <head>
  	<title>Consola de Administración</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Inclusion de FavIcon -->
    <link rel="icon" href="../assets/picture/icons/favicon.png" type="image/x-icon">

		
		<!-- template  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/css/adminPanel.css">

		<!-- own styling  -->
		<link rel="stylesheet" href="../assets/css/adminStyle.css">
		<link rel="stylesheet" href="../assets/css/form_style.css">
		<link rel="stylesheet" href="../assets/css/gallery.css">
		<link rel="stylesheet" href="../assets/css/booking_card.css">

		<!-- Jquery data tables pagination  -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.11.2/datatables.min.css"/>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.11.2/datatables.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>


  </head>
  <body>
		
	<div class="wrapper d-flex align-items-stretch">


		<nav id="sidebar" class="navbar-dark bg-dark">
			<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-dark">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Menu Desplegable</span>
	        </button>
            </div>


			<div class="p-4 pt-5">
		  		<h1><a href="../index.php" class="logo"><?php echo $general_setting['Name'] ?></a></h1>
	        <ul class="list-unstyled components mb-5" id="nav">
				<li class="nav-item">
					<a class="tab" href="dashboard.php">Cuadro de Mando</a>
				</li>
				<li class="nav-item">
					<a class="tab" href="gallery.php">Galeria</a>
				</li >
				<li class="nav-item">
					<a class="tab" href="user.php">Usuarios</a>
				</li>
	           <li>
	            <a href="#roomSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Alojamientos</a>
	            <ul class="collapse list-unstyled" id="roomSubmenu">
				<li class="nav-item">
                    <a class="tab" href="roomType.php">Tipos de Habitaciones</a>
                </li>
				<li class="nav-item">
                    <a class="tab" href="room.php">Habitaciones</a>
                </li>
				<li class="nav-item">
                    <a class="tab" href="roomBooking.php">Estado de Reservas</a>
                </li>
	
	            </ul>
	          </li>
			  <li>
	            <a href="#eventSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Eventos</a>
	            <ul class="collapse list-unstyled" id="eventSubmenu">
                <li class="nav-item">
                    <a class="tab" href="eventType.php">Tipos de Eventos</a>
                </li>
				<li class="nav-item">
                    <a class="tab" href="event.php">Salones de Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="tab" href="eventBooking.php">Reservas para Eventos</a>
                </li>
	            </ul>
	          </li>
	        
	          <li class="nav-item">
              <!-- <a href="#paymentSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pagos</a>
              <ul class="collapse list-unstyled" id="paymentSubmenu">
			  <li class="nav-item">
                    <a class="tab" href="roomPayment.php">Room Payment</a>
                </li>
                <li class="nav-item">
                    <a class="tab" href="eventPayment.php">Event Payment</a>
                </li>
               
              </ul>
	          </li> -->
	         
			  <li class="nav-item">
              <a class="tab" href="Contact.php">Lista de Mensajes</a>
	          </li>

			  <li class="nav-item">
              <a class="tab" href="account.php">Cuenta Admin</a>
	          </li> 
			  <li class="nav-item">
              <a class="tab" href="general_setting.php">Configuración General</a>
	          </li>  
			  <li class="nav-item">
              <a class="tab" href="../destroy.php">Salir</a>
	          </li>
	        </ul>

	     

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						 
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>


    	</nav>
