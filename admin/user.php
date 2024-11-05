<?php include("include/header.php"); 
if(!isset($_SESSION['loggedUserId'])) {
    echo "<script> window.location.href = '../login.php';</script>";
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">

<h2 class="mb-4">Detalles de usuario</h2>


<!-- Model For adding new User  -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" id="addUserBtn">
<i class="fa fa-user-plus" aria-hidden="true"></i> Añadir nuevo usuario</button>

<!-- Modal Add User -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añador Usuario</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add New User Form  -->
        <form id="model-addUser" method="POST" action="admin_functions.php" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                        <div class="container mb-4">
                            <div class="picture-container">
                                <div class="picture">
                                <img src="../assets/picture/icons/user.png" class="picture-src" id="wizardPicturePreview" title="">
                                <input type="file" id="wizard-picture" class="" name="profileImage" required>
                            </div>
                        <h6 class="">Seleccion la Imagen</h6>
                        
                    </div>
                   
                  </div>
               

                    <!-- First Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Last Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0" >
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                   
                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                      
                        <input id="phoneNumber" type="tel" name="contactno" pattern="[3,6][0-9]{9}" placeholder="Telefono" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>


                    <!-- Job -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="gender" name="gender" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option value="">Genero</option>
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>                            
                            <option value="Otro">Otro</option>                            

                        </select>
                    </div>
                    <!-- Rol -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="rol" name="rol" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option value="">Rol</option>
                            <option value="Admin">Admin</option>
                            <option value="Cliente">Cliente</option>                                                

                        </select>
                    </div>

                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="passwordConfirmation" type="password" name="conformPassword" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md" required>
                    </div>
            <!-- Submit Button -->
               <div class="form-group col-lg-12 mx-auto mb-0">
                        <button id="adduser" type="submit" class="btn btn-success btn-block py-2" name="addUser">
                            <span class="font-weight-bold">Crear Cuenta</span>
                        </button>
                    </div>
                </div>
                 
            
            </form>
        
         </div>
         <div class="modal-footer">
              
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
         </div>
     
    </div>
  </div>
</div>

<!-- Modal Update for  User -->
<div class="modal" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update user details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- update New User Form  -->
        <form id="model-updateUser" method="POST" action="admin_functions.php" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                        <div class="container mb-4">
                            <div class="picture-container">
                                <div class="picture">
                                <img  class="picture-src" id="updatePicture" title="" />
                                <input type="file" id="wizardUpdate-picture" class="" name="profileImage" required>
                            </div>
                        <h6 class="">Seleccion la Imagen</h6>
                        
                    </div>
                   
                </div>
               

                    <!-- First Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="updatefirstName" type="text" name="firstName" placeholder="Nombres" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Last Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="updatelastName" type="text" name="lastname" placeholder="Apellidos" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0" >
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="updateemail" type="email" name="email" placeholder="Email" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                   
                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                      
                        <input id="updatephoneNumber" type="tel" name="contactno" pattern="[3,6][0-9]{9}" placeholder="Telefono" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>


                    <!-- genero -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="updategender" name="gender" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option value="">Selecciona el Genero</option>
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                       <!-- Job -->
                       <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="updateRol" name="rol" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option disabled="" selected="">Escoja un Rol</option>
                            <option value="Cliente">Cliente</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>

          
                </div>
                <!-- Submit Button -->
                <input type="hidden" id="userID" name="updateUserID">
                <div class="form-group col-lg-12 mx-auto mb-0">
                        <button id="updateUser" type="submit" class="btn btn-primary btn-block py-2" name="updateUser" >
                            <span class="font-weight-bold">Save Changes</span>
                        </button>
                    </div>
               
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<br>

 <!-- Filter Drop down  -->
<div class="float-right filterBy">
<select name="category" id="userFilter" class="form-control custom-select bg-white border-md filter">
  <option disabled="" selected="">Fitrar por  </option>
  <option value="">Todos</option>
  <option value="Cliente">Cliente</option>
  <option value="Admin">Admin</option>
</select>
</div>


 <!-- table for the display the content  -->
<div class="container-fluid" id="contentArea">

        
</div>
  <!-- end of container  -->

</div>
<script src="js/user_function.js" type="text/javascript"></script>


<?php include("include/footer.php"); ?>
