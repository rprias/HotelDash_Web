<?php
 
 include('include/header.php');
 include('../include/dbConnect.php');
 
 ?>
 <!-- Jquery Time Picker  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <!-- Jquery Date Picker  -->
  <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'rel='stylesheet'>
      
    <script src=
                "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
    <!-- Jquery Date Picker End -->
<?php

if(!isset($_SESSION['loggedUserId'])) {
  header('Location:../login.php');
 }
 

$roomTypeId = $_POST['roomTypeId'];
$query_selectRoom  = "select * from room_type where RoomTypeId = '$roomTypeId'";
$result = mysqli_query($con,$query_selectRoom);
while($row = mysqli_fetch_assoc($result)){


?>
<div class="container">
    <div class="row align-items-center my-5">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="../assets/picture/icons/thumbs-up.png" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Agenda tu estadia</h1>
            <p class="font-italic text-muted mb-0">La siguiente información sera usada para realizar tu agendamiento en el Hotel Dash.</p>
           
        </div>

        <!-- Booking Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="client_functions.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                    <div class="container mb-4">
                        <h2 class="text-center">Haz Tu Reserva</h2>
                        <?php
                        if (isset($_GET["error"])) {
                        echo '<div class="text-danger text-center">' . $_GET["error"] . '</div>';
                        }
                        ?>

                    </div>

                    <input type = "hidden" name = "roomTypeId" value ="<?php echo $roomTypeId ?>" />
            

                    <!--roomType-->
                    <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="roomType">Tipo de Habitacion</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class='fas fa-door-open'></i>
                            </span>
                        </div>
                        <input id="roomType" type="text" name="roomType" value="<?php echo $row['RoomType'] ?>" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>
                    </div>

                    <!-- roomCost -->
                    <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="roomCost">Costo de la habitacion por noche</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-usd"></i>
                            </span>
                        </div>
                        <input id="roomCost" type="text" value="<?php echo $row['Cost'] ?>" name="roomCost" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>
                    </div>

                    <!-- Direccion de Correo Electronico -->
                    <div class="form-group col-lg-12 mb-4">
                     
                     <div class="ml-2">
                         <label for="email">Confirma tu direccion de Correo</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0" >
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" placeholder="Direccion de Correo Electronico" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    </div>
                   
                    <!-- Phone Number -->
                    <div class="form-group col-lg-12 mb-4">
                     
                     <div class="ml-2">
                         <label for="phoneNumber">Numero telefonico</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                      
                        <input id="contactno" type="tel" name="contactno" pattern="[6,3][0-9]{9}" placeholder="Numero Telefonico" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>
                    </div>


                    <!-- number of guest -->
                    <div class="form-group col-lg-12 mb-4">
                     
                     <div class="ml-2">
                         <label for="no_of_guest">Numero de Invitados</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="no_of_guest" name="no_of_guest" class="form-control custom-select bg-white border-left-0 border-md" required>
                            <option value="" selected="true" disabled="true">Maximo 4 Ocupantes</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    </div>
                  
                    <!--checkin -->
                    <div class="form-group col-lg-6 mb-4">
                     
                    <div class="ml-2">
                        <label for="checkIn">Fecha de Check-In</label>
                    </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input id="checkIn" type="text" name="checkIn" placeholder="dd/mm/aaaa" class="form-control bg-white " required>
                    </div>
                    </div>

                    <!--checkOut-->
                    <div class="form-group col-lg-6 mb-4">
                        <div class="ml-2">
                        <label for="checkOut">Fecha de Check-Out</label>
                        </div>
                        <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                       
                        <input id="checkOut" type="text" name="checkOut" placeholder="dd/mm/aaaa" class="form-control bg-white " required>
                        </div>
                    </div>

                     <!-- total roomCost -->
                     <div class="form-group col-lg-6 mb-4">
                     
                     <div class="ml-2">
                         <label for="roomCost">Costo Total</label>
                     </div>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-usd"></i>
                            </span>
                        </div>
                        <input id="totalCost" type="text" name="totalCost" value="0" class="form-control bg-white border-left-0 border-md" required readonly>
                    </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2" name="bookRoom" >
                            <span class="font-weight-bold">Reserva</span>
                        </button>
                    </div>


                </div>
                </form>
        </div>
    </div>
</div>

          <?php          }
                    
?>


<script  src="js/dateValidation.js"></script>
<?php include('include/footer.php')?>
