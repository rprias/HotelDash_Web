<?php include("include/header.php"); 
if(!isset($_SESSION['loggedUserId'])) {
  echo "<script> window.location.href = '../login.php';</script>";
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">


<br>


 <!-- table for the display the content  -->
 <div class="container-fluid col-11" id="contentArea">
 <h4 class="mb-4 mt-5 ">Company Details</h4>

 <br>
 <div class="Message">
            
</div>
 <!--  Actualiza el nombre de la compañia-->
 <form id="gs_form" method="POST" action="admin_functions.php" enctype="multipart/form-data" autocomplete="off">
 
                <div class="row">
                    <input type="hidden" id="gs_id" name="gs_id">

                    <!-- First Name -->
                    <div class="input-group col-lg-6 mb-4">
                    <div class="ml-2">
                         <label for="companyName">Nomre de la Compañia</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="companyName" type="text" name="companyName"  class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>



                    <!-- Address -->
                    <div class="input-group col-lg-6 mb-4">
                    <div class="ml-2">
                         <label for="address1">Linea de Dirección 1</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="address1" type="text" name="address1" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>  
                    
                    <!-- Address -->
                    <div class="input-group col-lg-4 mb-4">
                    <div class="ml-2">
                         <label for="address2">Linea de Direccion 2</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="address2" type="text" name="address2" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
            <!-- Address -->
                    <div class="input-group col-lg-4 mb-4">
                    <div class="ml-2">
                         <label for="city">Ciudad</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="city" type="text" name="city" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
            <!-- Address -->
                    <div class="input-group col-lg-4 mb-4">
                    <div class="ml-2">
                         <label for="state">Distrito/Departamento</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="state" type="text" name="state" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
             <!-- Address -->
                    <div class="input-group col-lg-3 mb-4">
                    <div class="ml-2">
                         <label for="country">Pais</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="country" type="text" name="country" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
             <!-- Address -->
                    <div class="input-group col-lg-3 mb-4">
                    <div class="ml-2">
                         <label for="zip">Codigo Postal</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="zip" type="text" name="zip" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
              <!-- description -->
                    <div class="input-group col-lg-6 mb-4">
                    <div class="ml-2">
                         <label for="description">Descripción</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="description" type="text" name="description" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>

                    <!-- second form   -->

                    <h4 class="mb-4 mt-5 ml-4">Detalles de Contacto</h4>
                    
                    <br>

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                    <div class="ml-2">
                         <label for="email">Email</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0" >
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
                  
                   
                    <!-- Phone Number -->
                    <div class="input-group col-lg-6 mb-4">
                    <div class="ml-2">
                         <label for="phoneNumber">Numero de Telefono</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                       
                      
                        <input id="phoneNumber" type="tel" name="phoneNumber" pattern="[3,6][0-9]{9}" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>
                    </div>


                    <!-- Phone Number -->
                    <div class="input-group col-lg-6 mb-4">
                    <div class="ml-2">
                         <label for="teleNumber">Telefono Alterno</label>
                     </div>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                       
                      
                        <input id="teleNumber" type="tel" name="teleNumber" pattern="[0-9]{9}" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>
                    </div>


                   
                    

          
                </div>
         
                <div class="form-group col-lg-6 mx-auto mb-0">
                        <button id="updateUser" type="submit" class="btn btn-primary btn-block py-2" name="save" >
                            <span class="font-weight-bold">Guardar Cambios</span>
                        </button>
                    </div>
               
            
        </form>
</div>
  <!-- end of container  -->

</div>
<script src="js/general_setting.js" type="text/javascript"></script>


<?php include("include/footer.php"); ?>