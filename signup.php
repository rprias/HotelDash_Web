<?php

include('include/header.php');

?>
<!-- Navbar-->

<div class="container">
    <div class="row align-items-center my-5">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="assets/picture/icons/thumbs-up.png" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Crea una Cuenta</h1>
            <p class="font-italic text-muted mb-0">La información facilitada a continuación se utilizará para acceder a
                su cuenta Hotel Dash.</p>

            </p>
        </div>

        <!-- Formulario de Registro -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="register.php" method="POST" enctype="multipart/form-data" autocomplete="on">
                <div class="row">
                    <div class="container mb-4">
                        <div class="picture-container">
                            <div class="picture">
                                <img src="assets/picture/icons/user.png" class="picture-src" id="wizardPicturePreview"
                                    title="">
                                <input type="file" id="wizard-picture" class="" name="profileImage" required>
                            </div>
                            <h6 class="">Escoje una Foto</h6>

                        </div>
                        <?php
                        if (isset($_GET["error"])) {
                            echo '<div class="text-danger text-center">' . $_GET["error"] . '</div>';
                        }
                        ?>
                    </div>
                    <!-- DcoTipo -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <select id="dcoTipo" type="text" name="dcoTipo" placeholder="Tipo de Documento"
                            class="form-control bg-white border-left-0 border-md" required>
                            <option value="CC">Tipo de Documento</option>
                            <option value="CC">Cédula de ciudadanía</option>
                            <option value="CE">Cédula de extranjería</option>
                            <option value="DIE">Documento de identificación extranjero</option>
                            <option value="NUIP">NUIP</option>
                            <option value="PP">Pasaporte</option>
                            <option value="PEP">Permiso especial de permanencia</option>
                        </select>
                    </div>
                    <!-- Numero de Documentos-->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="NoDocu" type="text" name="noDocu" placeholder="Numero de Documento"
                            class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Nombres Completos -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="Nombre" type="text" name="nombre" placeholder="Nombre Completo"
                            class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" placeholder="Email Address"
                            class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                        <input id="phoneNumber" type="tel" name="contactno" pattern="[3,6][0-9]{9}"
                            placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3"
                            required>
                    </div>


                    <!-- Genero -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="genero" name="genero"
                            class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option value="">Selecciona tu genero</option>
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>

                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password"
                            class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="passwordConfirmation" type="password" name="conformPassword"
                            placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md"
                            required>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2" name="user_registration">
                            <span class="font-weight-bold">Crea tu Cuenta</span>
                        </button>
                    </div>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                    <!-- Social Login -->
                    <div class="form-group col-lg-12 mx-auto">
                        <a href="#" class="btn btn-danger btn-block py-2 btn-facebook">
                            <i class="fa fa-facebook-f mr-2"></i>
                            <span class="font-weight-bold">Continua con Google</span>
                        </a>
                        <a href="#" class="btn btn-primary btn-block py-2 btn-twitter">
                            <i class="fa fa-twitter mr-2"></i>
                            <span class="font-weight-bold">Continua con Facebook</span>
                        </a>
                    </div>

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Ya estas registrado? <a href="login.php"
                                class="text-primary ml-2">Ingresa</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


<?php include('include/footer.php') ?>