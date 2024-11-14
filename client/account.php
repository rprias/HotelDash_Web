<?php 
include("include/header.php");
if(!isset($_SESSION['loggedUserId'])) {
    header('Location:../login.php');
   }
?>
<style>
      /*Profile Pic Start*/
.picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
}
.picture{
    width: 106px;
    height: 106px;
    background-color:  #FFFFFF;
    border: 4px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 0px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.picture:hover{
    border-color: #2ca8ff;
}
.content.ct-wizard-green .picture:hover{
    border-color: #05ae0e;
}
.content.ct-wizard-blue .picture:hover{
    border-color: #3472f7;
}
.content.ct-wizard-orange .picture:hover{
    border-color: #ff9500;
}
.content.ct-wizard-red .picture:hover{
    border-color: #ff3b30;
}
.picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 100%;
}

.picture-src{
    width: 100%;
    
}
</style>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">


<br>


 <!-- table for the display the content  -->
 <div class="container-fluid ml-5" id="contentArea">
     <div class="col-8 ml-5 pl-5">
         
         <h4 class="mb-4 text-center">Detalle de la Cuenta</h4>
         
         <div class="accountMessage">
            
             </div>
 <!-- update New User Form  -->
 <form id="updateUser" method="POST" action="admin_functions.php" enctype="multipart/form-data" >
 
 <input type="hidden" id="user_Id" name="updateAccount" value="<?php echo $_SESSION['loggedUserId'];?>">
                <div class="row">
                        <div class="container mb-4">
                            <div class="picture-container">
                                <div class="picture">
                                <img  class="picture-src" id="updatePicture" title="" />
                                <input type="file" id="wizardUpdate-picture" class="" name="profileImage" required>
                            </div>
                        <h6 class="">Escojer Imagen</h6>
                        
                    </div>
                   
                </div>
               

                    <!-- DcoTipo -->
                    <div class="input-group col-lg-6 mb-4">
                    <div class="ml-2">
                         <label for="updatedcoTipo">Tipo de Documento</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-id-card text-muted"></i>
                            </span>
                        </div>
                    <select id="updatedcoTipo" type="text" name="updatedcoTipo" placeholder="Tipo de Documento" class="form-control bg-white border-left-0 border-md" required>
                    <option value="CC">Cédula de ciudadanía</option>
                            <option value="CE">Cédula de extranjería</option>
                            <option value="DIE">Documento de identificación extranjero</option>
                            <option value="NUIP">NUIP</option>
                            <option value="PP">Pasaporte</option>
                            <option value="PEP">Permiso especial de permanencia</option>
                    </select>
                    </div>
                    </div>



                    <!-- Numero de Documento-->
                    <div class="input-group col-lg-6 mb-4">
                    <div class="ml-2">
                         <label for="updatenoDocu">Numero de Documento</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-id-card text-muted"></i>
                            </span>
                        </div>
                        <input id="updatenoDocu" type="text" name="updatenoDocu" placeholder="Numero de Document" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
           
                    <!-- Nombre -->
                    <div class="input-group col-lg-12 mb-4">
                    <div class="ml-2">
                         <label for="updateemail">Nombre Completo</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0" >
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="updatenombre" type="text" name="updatenombre" placeholder="Direcion de Correo" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
                <!-- Email -->
                    <div class="input-group col-lg-12 mb-4">
                    <div class="ml-2">
                         <label for="updateemail">Email</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0" >
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="updateemail" type="email" name="email" placeholder="Direcion de Correo" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
                  
                   
                    <!-- telefono -->
                    <div class="input-group col-lg-12 mb-4">
                    <div class="ml-2">
                         <label for="updatephoneNumber">Contact No</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                       
                      
                        <input id="updatephoneNumber" type="tel" name="contactno" pattern="[3,6][0-9]{9}" placeholder="Numero de Telefono" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>
                    </div>


                    <!-- Genero -->
                    <div class="input-group col-lg-12 mb-4">
                    <div class="ml-2">
                         <label for="updategender">Genero</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="updategender" name="gender" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>

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
        
        <div class="col-8 ml-5 pl-5">
        <div class="passwordMessage mt-4">
            
        </div>
        <h5 class="mb-4 mt-5 text-center">Cambiar Contraseña</h5>
            <form id="change_password" >
            <input type="hidden" id="userId" name="change_password" value="<?php echo $_SESSION['loggedUserId'];?>">
               <!--old Password -->
               <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="oldPassword" type="password" name="oldPassword" placeholder="Contraseña Antigua" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- newPassword  -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="newPassword" type="password" name="newPassword" placeholder="Contraseña Nueva" class="form-control bg-white border-left-0 border-md" required>
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