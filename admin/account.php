<?php 
include("include/header.php");
if(!isset($_SESSION['loggedUserId'])) {
    echo "<script> window.location.href = '../login.php';</script>";
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">


<br>


 <!-- table for the display the content  -->
 <div class="container-fluid " id="contentArea">
     <div class="col-9">
         
         <h4 class="mb-4 text-center">Detalles de la Cuenta</h4>
         
         <div class="accountMessage">
            
             </div>
 <!-- update New User Form  -->
 <form id="updateUser" method="POST" action="admin_functions.php" enctype="multipart/form-data" autocomplete="on">
 
 <input type="hidden" id="user_Id" name="updateAccount" value="<?php echo $_SESSION['loggedUserId'];?>">
                <div class="row">
                        <div class="container mb-4">
                            <div class="picture-container">
                                <div class="picture">
                                <img  class="picture-src" id="updatePicture" title="" />
                                <input type="file" id="wizardUpdate-picture" class="" name="profileImage" required>
                            </div>
                        <h6 class="">Cambiar Imagen</h6>
                        
                    </div>
                   
                </div>
               


                    <!-- Last Name -->
                    <div class="input-group col-lg-12 mb-4">
                    <div class="ml-2">
                         <label for="updatelastName">Nombre Completo</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="updatelastName" type="text" name="lastname" placeholder="Nombre Completo" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
           
                  
                   
                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                    <div class="ml-2">
                         <label for="updatephoneNumber">Numero de Contacto</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                       
                      
                        <input id="updatephoneNumber" type="tel" name="contactno" pattern="[3,6][0-9]{9}" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>
                    </div>


                    <!-- Job -->
                    <div class="input-group col-lg-12 mb-4">
                    <div class="ml-2">
                         <label for="updategender">Rol</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="updategender" name="gender" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option value="">Seleccione el Rol</option>
                            <option value="male">Cliente</option>
                            <option value="female">Admin</option>
                        </select>
                    </div>
                    </div>
                    

          
                </div>
         
                <div class="form-group col-lg-6 mx-auto mb-0">
                        <button id="updateUser" type="submit" class="btn btn-primary btn-block py-2" name="updateUser" >
                            <span class="font-weight-bold">Guardar Cambios</span>
                        </button>
                    </div>
               
            
        </form>
        </div>
        <div class="col-9">
        <div class="passwordMessage mt-4">
            
        </div>
        <h5 class="mb-4 mt-5 text-center">Cambiar la Contraseña</h5>
            <form id="change_password" autocomplete="on">
            <input type="hidden" id="userId" name="change_password" value="<?php echo $_SESSION['loggedUserId'];?>">
               <!--old Password -->
               <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="oldPassword" type="password" name="oldPassword" placeholder="Contraseña Actual" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- newPassword  -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="newPassword" type="password" name="newPassword" placeholder="Nueva Contraseña" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                   
                <div class="form-group col-lg-6 mx-auto mb-0">
                        <button id="changePassword" type="submit" class="btn btn-primary btn-block py-2" name="changePassword" >
                            <span class="font-weight-bold">Cambiar Contraseña</span>
                        </button>
                    </div>
            </form>
        </div>
</div>
  <!-- end of container  -->

</div>
<script src="js/account.js" type="text/javascript"></script>


<?php include("include/footer.php"); ?>