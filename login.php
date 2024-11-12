<?php
 
 include('include/header.php');

 
 ?>
<!-- Navbar-->

<div class="container">
    <div class="row align-items-center my-5">   
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="assets/picture/icons/thumbs-up.png" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Ingrese para Reservar</h1>
            <p class="font-italic text-muted mb-0">La información facilitada a continuación se utilizará para acceder a su cuenta Hotel Dash Bogota.</p>
           
            </p>
        </div>

        <!-- Registeration Form -->
        <div class="col-md-3 col-lg-5 ml-auto">
        <div class="login-form">
         <form action="validation.php" method="POST" enctype="multipart/form-data" >
        <h2 class="text-center mb-4">Ingresa tus datos</h2>
        <?php
                if (isset($_GET["error"])) {
                    echo '<div class="text-danger text-center">' . $_GET["error"] . '</div>';
                }
        ?>   
        <div class="form-group mt-3">
        	<div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="fa fa-user"></span>
                    </span>                    
                </div>
                <input type="text" class="form-control" name="email" placeholder="Direccion de Correo" required="required">				
            </div>
        </div>
		<div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>                    
                </div>
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">				
            </div>
        </div>    
        <div class="clearfix mb-3">
            <label class="float-left form-check-label"><input type="checkbox"> Recordar mis datos</label>
            <a href="#" class="float-right">Olvidaste tu Contraseña?</a>
        </div>

        <div class="form-group ">
            <button type="submit" name="user_login" class="btn btn-primary login-btn btn-block">Ingresa</button>
        </div>
 
		<div class="or-seperator"><i>o</i></div>
        <p class="text-center">Inicia sesión con tu cuenta de redes sociales</p>
        <div class="text-center social-btn">
            <a href="#" class="btn btn-secondary"><i class="fa fa-facebook"></i>&nbsp; Facebook</a>
            <a href="#" class="btn btn-info"><i class="fa fa-twitter"></i>&nbsp; Twitter</a>
			<a href="#" class="btn btn-danger"><i class="fa fa-google"></i>&nbsp; Google</a>
        </div>
    </form>
    <p class="text-center text-muted small">Aun no tienes Cuenta? <a href="signup.php">Registrate Aqui!</a></p>
</div>
        </div>
    </div>
</div>



<?php include('include/footer.php')?>
<!-- validation -->

<?php

?>

