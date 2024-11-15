<?php

//---------------------------------------------- User table -----------------------------------------

include("../include/dbConnect.php");

function formatCurrency($amount) {
  return "$ " . number_format($amount, 2, ',', '.');
}
if(isset($_POST['userFilter'])){

  $userTable='';
    if(isset($_POST['msg'])){ 
            $userTable.='<div class="alert alert-success" role="alert">' . $_POST["msg"].' </div>';
          }
      if (isset($_POST["error"])) {
        $userTable.='<div class="alert alert-danger">' . $_POST["error"] . '</div>';
      }
       

        $userTable.='<div class="table-responsive">
        <table class="table table-hover " id="userTable">
<thead class="thead-dark">
    <tr >
      <th scope="col">Imagen</th>
      <th scope="col">Nombre</th>
      <th scope="col">Tipo Documento</th>
      <th scope="col">No. Documento</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th scope="col">Genero</th>
      <th scope="col">Rol</th>
      <th scope="col">Acciones</th>      
    </tr>
  </thead>
  <tbody>';
    

   
    $userFilter = $_POST['userFilter'];
   if($userFilter==""){
    $selectAllUser = "SELECT * FROM users_details where nombre <> ''";
   }else{
    $selectAllUser = "SELECT * FROM users_details WHERE rol like '".$userFilter."'";
   }
   
    $allUser = mysqli_query($con,$selectAllUser);
    $noOfUsers = mysqli_num_rows($allUser);

    if($noOfUsers>=1){
        while($row=mysqli_fetch_assoc($allUser))
        {
           
          $userTable.=' <tr>
                    <td><a href="../assets/picture/profiles/'.$row["ProfileImage"].'" > 
                    <img class="round-img" src="../assets/picture/profiles/'.$row["ProfileImage"].'" alt="Profile"/>
                    </a>
                    </td>
                    <td>'.$row["Nombre"].'</td>
                    <td>'.$row["DcoTipo"].'</td>
                    <td>'.$row["NoDocu"].'</td>
                    <td>'.$row["Email"].'</td>
                    <td>'.$row["ContactNo"].'</td>
                    <td>'.$row["Genero"].'</td>
                    <td>'.$row["Rol"].'</td>
                    <td>
                       
                      <input type="hidden" name="userId" value="'.$row["UserId"].'"/> ';
                      $userTable.="<button class='btn btn-secondary'  name='EditUser' onclick=\" editUser('".$row["UserId"]."') \"> Editar</button>";
                      $userTable.="<button class='btn btn-danger' name='deleteUser' onclick=\"confirm('Confirma el borrado de: ".$row["Nombre"]."') && deleteUser('".$row["UserId"]."')\">Borrar</button>
                    
                    </td>
            </tr>";
        }
      }
    else 
    {
    
      $userTable.='<tr><td colspan="8" style="color:red;text-align:center;">Sin Registros</td></tr>';
    
    }

    $userTable.='</tbody>
    </table></div>';
  echo $userTable;
  }


  //----------------------------------------------  Gallery Action -----------------------------------------
 if(isset($_POST['galleryFilter'])){
  
  $dirname = "../assets/picture/gallery/";
  $images = glob($dirname."*.*");
  $returnData ='' ;
  if(isset($_POST['msg'])){ 
    $returnData.='<div class="col-12 alert alert-success" role="alert">' . $_POST["msg"].' </div>';
  }
if (isset($_POST["error"])) {
$returnData.='<div class="col-12 alert alert-danger">' . $_POST["error"] . '</div>';
}
  foreach($images as $image) {
    $returnData.=' <div class="col-sm-6 col-md-4 col-lg-3 item">
              <div class="hovereffect">
              <img class="img-responsive img-fluid gallery-images img-thumbnail" src="'.$image.'" alt="">
              <div class="overlay">';
              $returnData.="    <a class='info' href='#'  onclick=\"confirm('Desea Borrar la Imagen?') && deleteImage('".$image."')\">Borrar</a>
              </div>
              </div>
          </div>";

  
  }
  
  echo $returnData;

 }

   //---------------------------------------------- Tipo de Habitacion table -----------------------------------------

   if(isset($_POST['roomTypeFilter'])){

    $typeTable='<br><br>';

    if(isset($_POST['msg'])){ 
            $typeTable.='<div class="alert alert-success" role="alert">' . $_POST["msg"].' </div>';
          }
      if (isset($_POST["error"])) {
        $typeTable.='<div class="alert alert-danger">' . $_POST["error"] . '</div>';
      }
       

        $typeTable.='<div class="table-responsive">
        <table class="table table-hover " id="userTable">
<thead class="thead-dark">
    <tr >
      <th scope="col">Imagen</th>
      <th scope="col">Tipo de Habitacion</th>
      <th scope="col">Costo</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
     
      
    </tr>
  </thead>
  <tbody>';
    

   
    $roomTypeFilter = $_POST['roomTypeFilter'];


   switch($roomTypeFilter){
      case 1:  $selectAllType = "SELECT * FROM room_type "; break;
      case 2:  $selectAllType = "SELECT * FROM room_type WHERE Status like 'Activa' ";break;
      case 3:  $selectAllType = "SELECT * FROM room_type WHERE Status like 'Inactiva' ";break;
      case 4:  $selectAllType = "SELECT * FROM room_type WHERE Cost < 500000 ";break;
      case 5:  $selectAllType = "SELECT * FROM room_type WHERE Cost >=500000 AND Cost<=1000000 ";break;
      case 6:  $selectAllType = "SELECT * FROM room_type WHERE Cost >1000000 ";break;
      default: $selectAllType = "SELECT * FROM room_type "; break;
      
   }

    $allType = mysqli_query($con,$selectAllType);
    $noOfType = mysqli_num_rows($allType);

    if($noOfType>=1){
        while($row=mysqli_fetch_assoc($allType))
        {
           
          $typeTable.=' <tr>
                    <td><a href="../assets/picture/RoomType/'.$row["RoomImage"].'" > 
                    <img class="round-img" src="../assets/picture/RoomType/'.$row["RoomImage"].'" alt="Profile"/>
                    </a>
                    </td>
                    <td>'.$row["RoomType"].'</td>
                    <td>'.$row["Cost"].'</td>
                    <td>'.$row["Description"].'</td>
                    <td>'.$row["Status"].'</td>
                   
                    <td>
                       
              <input type="hidden" name="userId" value="'.$row["RoomTypeId"].'"/> ';
              $typeTable.="<button class='btn btn-secondary'  name='EditUser' onclick=\" editRoomType('".$row["RoomTypeId"]."') \"> Editar </button>";
              $typeTable.="<button class='btn btn-danger' name='deleteUser' onclick=\"confirm('Confirma la eliminación de:  ".$row["RoomType"]."') && deleteRoomType('".$row["RoomTypeId"]."')\">Borrar</button>
                     
                    </td>
            </tr>";
        }
      }
    else 
    {
    
      $typeTable.='<tr><td colspan="8" style="color:red;text-align:center;">No hay  registros disponibles </td></tr>';
    
    }

    $typeTable.='</tbody>
    </table></div>';

  echo $typeTable;

   } 

   //---------------------------------------------- Room List table -----------------------------------------

   if(isset($_POST['roomFilter'])){
    $roomTable='<br><br>';
    if(isset($_POST['msg'])){ 
            $roomTable.='<div class="alert alert-success" role="alert">' . $_POST["msg"].' </div>';
          }
      if (isset($_POST["error"])) {
        $roomTable.='<div class="alert alert-danger">' . $_POST["error"] . '</div>';
      }
       

        $roomTable.='<div class="table-responsive">
        <table class="table table-hover " id="userTable">
<thead class="thead-dark">
    <tr >
      <th scope="col">Tipo de Habitacion</th>
      <th scope="col">Costo</th>
      <th scope="col">Numero de Habitación</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
      
    </tr>
  </thead>
  <tbody>';
    

   
    $roomFilter = $_POST['roomFilter'];
   if($roomFilter==""){
    $selectAllRoom = "SELECT rl.RoomId,rt.RoomType,rt.Cost,rl.RoomNumber,rl.Status FROM room_list rl inner join room_type rt on  rl.RoomTypeId = rt.RoomTypeId";
   }else{
    $selectAllRoom = "SELECT rl.RoomId,rt.RoomType,rt.Cost,rl.RoomNumber,rl.Status FROM room_list rl  inner join room_type rt on  rl.RoomTypeId = rt.RoomTypeId WHERE rl.Status like '".$roomFilter."' ";
    
   }

   
    $allRoom = mysqli_query($con,$selectAllRoom);
    $noOfrooms = mysqli_num_rows($allRoom);

    if($noOfrooms>=1){
        while($row=mysqli_fetch_assoc($allRoom))
        {
           
          $roomTable.=' <tr>
                    
                    <td>'.$row["RoomType"].'</td>
                    <td>'.$row["Cost"].'</td>
                    <td>'.$row["RoomNumber"].'</td>
                    <td>'.$row["Status"].'</td>
                   
                    <td>
                       
              <input type="hidden" name="userId" value="'.$row["RoomId"].'"/> ';
              $roomTable.="<button class='btn btn-secondary'  name='EditUser' onclick=\" editRoom('".$row["RoomId"]."') \"> Editar </button>";
              $roomTable.="<button class='btn btn-danger' name='deleteUser' onclick=\"confirm('Desea eliminar la habitación?  ".$row["RoomNumber"]."') && deleteRoom('".$row["RoomId"]."')\">Borrar</button>
                     
                    </td>
            </tr>";
        }
      }
    else 
    {
    
      $roomTable.='<tr><td colspan="8" style="color:red;text-align:center;">No hay  registros disponibles </td></tr>';
    
    }

    $roomTable.='</tbody>
    </table></div>';
  echo $roomTable;
   } 
   
   
   //---------------------------------------------- Room Booking table -----------------------------------------

   if(isset($_POST['roomBooking'])){

    $roomTable='<br><br>';
    if(isset($_POST['msg'])){ 
            $roomTable.='<div class="alert alert-success" role="alert">' . $_POST["msg"].' </div>';
          }
      if (isset($_POST["error"])) {
        $roomTable.='<div class="alert alert-danger">' . $_POST["error"] . '</div>';
      }
       

        $roomTable.='<div class="table-responsive">
        <table class="table table-hover " id="userTable">
<thead class="thead-dark">
    <tr >
      <th scope="col">Usuario</th>
      <th scope="col">Fecha</th>
      <th scope="col">Tipo de Habitacion</th>
      <th scope="col">Numero de Habitacion</th>
      <th scope="col">CheckIn</th>
      <th scope="col">CheckOut</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
      <th scope="col">Detalles</th>
      
    </tr>
  </thead>
  <tbody>';
    
  $filter = $_POST['filter'];

  switch($filter){
    case 1:  $selectBooking =  "SELECT rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_booking rm
                                inner join room_list rl on rl.RoomId = rm.RoomId
                                inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                inner join users_details us on us.Userid = rm.User_id 
                                order by rm.Date desc";
                                break;

    case 2:  $selectBooking =  "SELECT rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_booking rm
                                inner join room_list rl on rl.RoomId = rm.RoomId
                                inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                inner join users_details us on us.Userid = rm.User_id 
                                where rm.Status = 'Booked'
                                order by rm.Date desc";
                                break;

    case 3:  $selectBooking =  "SELECT rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_booking rm
                                inner join room_list rl on rl.RoomId = rm.RoomId
                                inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                inner join users_details us on us.Userid = rm.User_id 
                                where rm.Status = 'Paid'
                                order by rm.Date desc";
                                break;


    case 4:  $selectBooking =  "SELECT rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_booking rm 
                                inner join room_list rl on rl.RoomId = rm.RoomId
                                inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                inner join users_details us on us.Userid = rm.User_id 
                                where rm.Status = 'Cancelled'
                                order by rm.Date desc";
                                break;

    case 5:  $selectBooking =  "SELECT rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_booking rm 
                                inner join room_list rl on rl.RoomId = rm.RoomId
                                inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                inner join users_details us on us.Userid = rm.User_id 
                                where rm.Status = 'Rejected'
                                order by rm.Date desc";
                                break;

    case 6:  $selectBooking =  "SELECT rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_booking rm 
                                inner join room_list rl on rl.RoomId = rm.RoomId
                                inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                inner join users_details us on us.Userid = rm.User_id 
                                where rm.Checkout < CURDATE() AND  rm.Status = 'Paid'
                                order by rm.Date desc";
                                break;

    case 7:  $selectBooking =  "SELECT rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_booking rm 
                                inner join room_list rl on rl.RoomId = rm.RoomId
                                inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                inner join users_details us on us.Userid = rm.User_id 
                                where  rm.Status = 'CheckedOut'
                                order by rm.Date desc";
                                break;

    default: $selectBooking =  "SELECT rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_booking rm 
                                inner join room_list rl on rl.RoomId = rm.RoomId
                                inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                inner join users_details us on us.Userid = rm.User_id 
                                order by rm.Date desc";
                                break;
    
 }

   $booking = mysqli_query($con,$selectBooking);
   $noOfBooking = mysqli_num_rows($booking);

   if($noOfBooking>=1){
       while($row=mysqli_fetch_assoc($booking))
       {
          
         $roomTable.=' <tr>
                   
                   <td>'.$row["Nombre"].'</td>
                   <td>'.$row["Date"].'</td>
                   <td>'.$row["RoomType"].'</td>
                   <td>'.$row["RoomNumber"].'</td>
                   <td>'.$row["CheckIn"].'</td>
                   <td>'.$row["CheckOut"].'</td>
                   <td>'.$row["Amount"].'</td>
                   <td>'.$row["Status"].'</td>
                   
               ';

                          if($row['Status']=="Booked"){
                          $roomTable .=' <td>
                          <a href="#" class="btn btn-primary btn-sm" onclick="setPaid(\''.$row["BookingId"].'\')">Pagar</a>
                          <a href="#" class="btn btn-danger btn-sm" onclick="confirm(\'Esta seguro de querer cancelar esta Reserva?: \') && setReject(\''.$row["BookingId"].'\')">Cancelar</a>
                         
                          </td>	 ';
                          }
                          else if ($row['Status']=="Paid"){
                              $roomTable .='<td><form action="../include/pdf.php" method="POST" >
                              <input type="hidden" value="'.$row['BookingId'].'"  name="bookingId" />
                              <button type="submit" class="btn btn-primary btn-sm">Facturar</button>
                              </form>
                              <button class="btn btn-secondary btn-sm" onclick="confirm(\'Esta seguro de disponibilizar la habitación? \') && setFree(\''.$row["BookingId"].'\')">Libre</button>
                            
                              </td> 	 ';
                          }
                          else if ($row['Status']=="Cancelled"){
                              $roomTable .='       <td>
                              
                              <span>Cancelado por Cliente</span>
                              </td>	';
                          } 
                          else if ($row['Status']=="Rejected"){
                              $roomTable .='         <td>
                              
                              <span>Cancelado por Administrador</span>
                              </td>	';
                          }
                          else{
                              $roomTable .='<td><form action="../include/pdf.php" method="POST" >
                              <input type="hidden" value="'.$row['BookingId'].'"  name="bookingId" />
                              <button type="submit" class="btn btn-primary btn-sm">Facturar</button>
                            
                              </td></form> 	 ';
                          }
                            
                   $roomTable.='  <td><button class="btn btn-light btn-sm"  name="showDetails" onclick=" showDetails(\''.$row["BookingId"].'\') "> Ver Detalle</button></td> </tr>';
       }
     }
   else 
   {
   
     $roomTable.='<tr><td colspan="12" style="color:red;text-align:center;">No hay  registros disponibles </td></tr>';
   
   }

    $roomTable.='</tbody>
                 </table></div>';
    
    echo $roomTable;

   } 

  //  -----------------------------------------  Room Payment ------------------------------------

  if(isset($_POST['roomPayment'])){
     
    $paymentTable='<br><br>';
    if(isset($_POST['msg'])){ 
            $paymentTable.='<div class="alert alert-success" role="alert">' . $_POST["msg"].' </div>';
          }
      if (isset($_POST["error"])) {
        $paymentTable.='<div class="alert alert-danger">' . $_POST["error"] . '</div>';
      }
       

        $paymentTable.='<div class="table-responsive">
        <table class="table table-hover " id="userTable">
<thead class="thead-dark">
    <tr >
      <th scope="col">Usuario</th>
      <th scope="col">Fecha de Pago</th>
      <th scope="col">Tipo de Pago</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Tipo de Habitacion</th>
      <th scope="col">Numero de Habitacion</th>
      <th scope="col">CheckIn</th>
      <th scope="col">CheckOut</th>
      
    </tr>
  </thead>
  <tbody>';
    
  $filter = $_POST['filter'];

  switch($filter){
    case 1:  $selectPayments =  "SELECT rp.*,rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_payment rp
                                inner join room_booking rm on rp.BookingId = rm.BookingId
                                inner join room_list rl on rl.RoomId = rm.RoomId
                                inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                inner join users_details us on us.Userid = rm.User_id 
                                order by rp.PaymentDate desc";
                                break;

    case 2:  $selectPayments =   "SELECT rp.*,rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_payment rp
                                  inner join room_booking rm on rp.BookingId = rm.BookingId
                                  inner join room_list rl on rl.RoomId = rm.RoomId
                                  inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                  inner join users_details us on us.Userid = rm.User_id 
                                  where rp.PaymentType = 'Cash'
                                  order by rp.PaymentDate desc";
                                  break;

    case 3:  $selectPayments =   "SELECT rp.*,rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_payment rp
                                  inner join room_booking rm on rp.BookingId = rm.BookingId
                                  inner join room_list rl on rl.RoomId = rm.RoomId
                                  inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                  inner join users_details us on us.Userid = rm.User_id 
                                  where rp.PaymentType = 'Credit Card'
                                  order by rp.PaymentDate desc";
                                  break;

    case 4:  $selectPayments =  "SELECT rp.*,rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_payment rp
                                  inner join room_booking rm on rp.BookingId = rm.BookingId
                                  inner join room_list rl on rl.RoomId = rm.RoomId
                                  inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                  inner join users_details us on us.Userid = rm.User_id 
                                  where rp.PaymentType = 'Debit Card'
                                  order by rp.PaymentDate desc";
                                  break;

    case 5:  $selectPayments =   "SELECT rp.*,rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_payment rp
                                  inner join room_booking rm on rp.BookingId = rm.BookingId
                                  inner join room_list rl on rl.RoomId = rm.RoomId
                                  inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                  inner join users_details us on us.Userid = rm.User_id 
                                  where rp.PaymentType = 'Net Banking'
                                  order by rp.PaymentDate desc";
                                  break;

    case 6:  $selectPayments =   "SELECT rp.*,rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_payment rp
                                  inner join room_booking rm on rp.BookingId = rm.BookingId
                                  inner join room_list rl on rl.RoomId = rm.RoomId
                                  inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                  inner join users_details us on us.Userid = rm.User_id 
                                  where rp.Amount < 5000
                                  order by rp.PaymentDate desc";
                                  break;

    case 7:  $selectPayments =  "SELECT rp.*,rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_payment rp
                                  inner join room_booking rm on rp.BookingId = rm.BookingId
                                  inner join room_list rl on rl.RoomId = rm.RoomId
                                  inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                  inner join users_details us on us.Userid = rm.User_id 
                                  where rp.Amount  >= 5000 AND rp.Amount <=10000
                                  order by rp.PaymentDate desc";
                                  break;

    case 8:  $selectPayments =  "SELECT rp.*,rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_payment rp
                                  inner join room_booking rm on rp.BookingId = rm.BookingId
                                  inner join room_list rl on rl.RoomId = rm.RoomId
                                  inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                  inner join users_details us on us.Userid = rm.User_id 
                                  where rp.Amount  >= 10000 AND rp.Amount <=15000
                                  order by rp.PaymentDate desc";
                                  break;

    case 9:  $selectPayments =  "SELECT rp.*,rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_payment rp
                                  inner join room_booking rm on rp.BookingId = rm.BookingId
                                  inner join room_list rl on rl.RoomId = rm.RoomId
                                  inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                  inner join users_details us on us.Userid = rm.User_id 
                                  where rp.Amount  > 150000 
                                  order by rp.PaymentDate desc";
                                  break;


    default: $selectPayments =  "SELECT rp.*,rm.*,rt.RoomType,rl.RoomNumber,us.Nombre FROM room_payment rp
                                inner join room_booking rm on rp.BookingId = rm.BookingId
                                inner join room_list rl on rl.RoomId = rm.RoomId
                                inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                                inner join users_details us on us.Userid = rm.User_id 
                                order by rp.PaymentDate desc";
                                break;

 }

   $payments = mysqli_query($con,$selectPayments);
   $noOfPayment = mysqli_num_rows($payments);

   if($noOfPayment>=1){
       while($row=mysqli_fetch_assoc($payments))
       {
          
         $paymentTable.=' <tr>
                   
                   <td>'.$row["Nombre"].'</td>
                   <td>'.$row["PaymentDate"].'</td>
                   <td>'.$row["PaymentType"].'</td>
                   <td>'.$row["Amount"].'</td>
                   <td>'.$row["RoomType"].'</td>
                   <td>'.$row["RoomNumber"].'</td>
                   <td>'.$row["CheckIn"].'</td>
                   <td>'.$row["CheckOut"].'</td>
               
                   
               ';

                
       }
     }
   else 
   {
   
     $paymentTable.='<tr><td colspan="12" style="color:red;text-align:center;">No hay  registros disponibles </td></tr>';
   
   }

    $paymentTable.='</tbody>
                 </table></div>';
    
    echo $paymentTable;
  }
   
  // -------------------------------------------------- Event Type Actions --------------------------------------------------
  if(isset($_POST['eventTypeFilter'])){

    $typeTable='<br><br>';

    if(isset($_POST['msg'])){ 
            $typeTable.='<div class="alert alert-success" role="alert">' . $_POST["msg"].' </div>';
          }
      if (isset($_POST["error"])) {
        $typeTable.='<div class="alert alert-danger">' . $_POST["error"] . '</div>';
      }
       

        $typeTable.='<div class="table-responsive">
        <table class="table table-hover " id="userTable">
<thead class="thead-dark">
    <tr >
      <th scope="col">Imagen</th>
      <th scope="col">Tipo</th>
      <th scope="col">Costo</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
     
      
    </tr>
  </thead>
  <tbody>';
    

   
    $roomTypeFilter = $_POST['eventTypeFilter'];


   switch($roomTypeFilter){
      case 1:  $selectAllType = "SELECT * FROM event_type "; break;
      case 2:  $selectAllType = "SELECT * FROM event_type WHERE Status like 'Activa' ";break;
      case 3:  $selectAllType = "SELECT * FROM event_type WHERE Status like 'Inactiva' ";break;
      case 4:  $selectAllType = "SELECT * FROM event_type WHERE Cost < 500 ";break;
      case 5:  $selectAllType = "SELECT * FROM event_type WHERE Cost >=500 AND Cost<=1000 ";break;
      case 6:  $selectAllType = "SELECT * FROM event_type WHERE Cost >1000 ";break;
      default: $selectAllType = "SELECT * FROM event_type "; break;
      
   }

    $allType = mysqli_query($con,$selectAllType);
    $noOfType = mysqli_num_rows($allType);

    if($noOfType>=1){
        while($row=mysqli_fetch_assoc($allType))
        {
           
          $typeTable.=' <tr>
                    <td><a href="../assets/picture/EventType/'.$row["EventImage"].'" > 
                    <img class="round-img" src="../assets/picture/EventType/'.$row["EventImage"].'" alt="Profile"/>
                    </a>
                    </td>
                    <td>'.$row["EventType"].'</td>
                    <td>'.$row["Cost"].'</td>
                    <td>'.$row["Description"].'</td>
                    <td>'.$row["Status"].'</td>
                   
                    <td>';

              $typeTable.="<button class='btn btn-secondary'  name='EditUser' onclick=\" editEventType('".$row["EventTypeId"]."') \"> Editar </button>";
              $typeTable.="<button class='btn btn-danger' name='deleteUser' onclick=\"confirm('Confirma la eliminacion de:   ".$row["EventTypeId"]."') && deleteEventType('".$row["EventTypeId"]."')\">Borrar</button>
                     
                    </td>
            </tr>";
        }
      }
    else 
    {
    
      $typeTable.='<tr><td colspan="8" style="color:red;text-align:center;">No hay  registros disponibles </td></tr>';
    
    }

    $typeTable.='</tbody>
    </table></div>';

  echo $typeTable;

   } 

   
   //---------------------------------------------- Event List table -----------------------------------------

   if(isset($_POST['eventFilter'])){
    $eventTable='<br><br>';
    if(isset($_POST['msg'])){ 
            $eventTable.='<div class="alert alert-success" role="alert">' . $_POST["msg"].' </div>';
          }
      if (isset($_POST["error"])) {
        $eventTable.='<div class="alert alert-danger">' . $_POST["error"] . '</div>';
      }
       

        $eventTable.='<div class="table-responsive">
        <table class="table table-hover " id="userTable">
<thead class="thead-dark">
    <tr >
      <th scope="col">Event Type</th>
      <th scope="col">Cost</th>
      <th scope="col">Hall Number</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>';
    

   
    $eventFilter = $_POST['eventFilter'];
   if($eventFilter==""){
    $selectAllEvents = "SELECT el.EventId,et.EventType,et.Cost,el.HallNumber,el.Status FROM event_list el
                      inner join event_type et on  el.EventTypeId = et.EventTypeId";
   }else{
    $selectAllEvents = "SELECT el.EventId,et.EventType,et.Cost,el.HallNumber,el.Status FROM event_list el
                      inner join event_type et on  el.EventTypeId = et.EventTypeId WHERE el.Status like '".$eventFilter."' ";
    
   }

   
    $allEvents = mysqli_query($con,$selectAllEvents);
    $noOfEvents = mysqli_num_rows($allEvents);

    if($noOfEvents>=1){
        while($row=mysqli_fetch_assoc($allEvents))
        {
           
          $eventTable.=' <tr>
                    
                    <td>'.$row["EventType"].'</td>
                    <td>'.$row["Cost"].'</td>
                    <td>'.$row["HallNumber"].'</td>
                    <td>'.$row["Status"].'</td>
                   
                    <td>
             ';
              $eventTable.="<button class='btn btn-secondary'  name='EditUser' onclick=\" editEvent('".$row["EventId"]."') \"> Editar </button>";
              $eventTable.="<button class='btn btn-danger' name='deleteUser' onclick=\"confirm('Desea eliminar el Salón?  ".$row["EventId"]."') && deleteEvent('".$row["EventId"]."')\">Borrar</button>
                     
                    </td>
            </tr>";
        }
      }
    else 
    {
    
      $eventTable.='<tr><td colspan="8" style="color:red;text-align:center;">No hay  registros disponibles </td></tr>';
    
    }

    $eventTable.='</tbody>
    </table></div>';
  echo $eventTable;
   } 
   

   //---------------------------------------------- Event Booking table -----------------------------------------

   if(isset($_POST['eventBooking'])){

    $eventTable='<br><br>';
    if(isset($_POST['msg'])){ 
            $eventTable.='<div class="alert alert-success" role="alert">' . $_POST["msg"].' </div>';
          }
      if (isset($_POST["error"])) {
        $eventTable.='<div class="alert alert-danger">' . $_POST["error"] . '</div>';
      }
       
   
        $eventTable.='<div class="table-responsive">
        <table class="table table-hover " id="userTable">
   <thead class="thead-dark">
    <tr >
      <th scope="col">Usuario</th>
      <th scope="col">Fecha</th>
      <th scope="col">Tipo de Evento</th>
      <th scope="col">No. de Salón</th>
      <th scope="col">Fecha del Evento</th>
      <th scope="col">Duracion del Evento</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
      <th scope="col">Detalles</th>
      
    </tr>
   </thead>
   <tbody>';
    
   $filter = $_POST['filter'];
   
   switch($filter){

    case 1:  $selectBooking =  "SELECT em.*,et.EventType,el.HallNumber,us.Nombre FROM event_booking em 
                                inner join event_list el on el.EventId = em.EventId
                                inner join event_type et on el.EventTypeId = et.EventTypeId 
                                inner join users_details us on us.Userid = em.User_id 
                                order by em.Date desc"; 
                                break;

    case 2:  $selectBooking =  "SELECT em.*,et.EventType,el.HallNumber,us.Nombre FROM event_booking em 
                                inner join event_list el on el.EventId = em.EventId
                                inner join event_type et on el.EventTypeId = et.EventTypeId 
                                inner join users_details us on us.Userid = em.User_id 
                                where em.Status = 'Booked'
                                order by em.Date desc";
                                break;

    case 3:  $selectBooking =  "SELECT em.*,et.EventType,el.HallNumber,us.Nombre FROM event_booking em 
                                inner join event_list el on el.EventId = em.EventId
                                inner join event_type et on el.EventTypeId = et.EventTypeId 
                                inner join users_details us on us.Userid = em.User_id 
                                where em.Status = 'Paid'
                                order by em.Date desc";
                                break;

    case 4:  $selectBooking =  "SELECT em.*,et.EventType,el.HallNumber,us.Nombre FROM event_booking em 
                                inner join event_list el on el.EventId = em.EventId
                                inner join event_type et on el.EventTypeId = et.EventTypeId 
                                inner join users_details us on us.Userid = em.User_id 
                                where em.Status = 'Cancelled'
                                order by em.Date desc";
                                break;

    case 5:  $selectBooking =  "SELECT em.*,et.EventType,el.HallNumber,us.Nombre FROM event_booking em 
                                inner join event_list el on el.EventId = em.EventId
                                inner join event_type et on el.EventTypeId = et.EventTypeId 
                                inner join users_details us on us.Userid = em.User_id 
                                where em.Status = 'Rejected'
                                order by em.Date desc";
                                break;

   
    case 6:  $selectBooking =  "SELECT em.*,et.EventType,el.HallNumber,us.Nombre FROM event_booking em 
                                inner join event_list el on el.EventId = em.EventId
                                inner join event_type et on el.EventTypeId = et.EventTypeId 
                                inner join users_details us on us.Userid = em.User_id 
                                where em.Status = 'Paid' And em.Event_date > CURDATE()
                                order by em.Date desc";
                                break;

   
    case 7:  $selectBooking =  "SELECT em.*,et.EventType,el.HallNumber,us.Nombre FROM event_booking em 
                                inner join event_list el on el.EventId = em.EventId
                                inner join event_type et on el.EventTypeId = et.EventTypeId 
                                inner join users_details us on us.Userid = em.User_id 
                                where em.Status = 'CheckedOut'
                                order by em.Date desc";
                                break;
   
    default: $selectBooking =  "SELECT em.*,et.EventType,el.HallNumber,us.Nombre FROM event_booking em 
                                inner join event_list el on el.EventId = em.EventId
                                inner join event_type et on el.EventTypeId = et.EventTypeId 
                                inner join users_details us on us.Userid = em.User_id 
                                order by em.Date desc"; break;
                                
   }
   
   $booking = mysqli_query($con,$selectBooking);
   $noOfBooking = mysqli_num_rows($booking);
   
   if($noOfBooking>=1){
       while($row=mysqli_fetch_assoc($booking))
       {
          
         $eventTable.=' <tr>
                   
                   <td>'.$row["Nombre"].'</td>
                   <td>'.$row["Date"].'</td>
                   <td>'.$row["EventType"].'</td>
                   <td>'.$row["HallNumber"].'</td>
                   <td>'.$row["Event_date"].'</td>
                   <td>'.$row["EventTime"].'</td>
                   <td>'.$row["Amount"].'</td>
                   <td>'.$row["Status"].'</td>
                   
               ';
   
                          if($row['Status']=="Booked"){
                          $eventTable .=' <td>
                          <a href="#" class="btn btn-primary btn-sm" onclick="setPaid(\''.$row["BookingId"].'\')">Pagar</a>
                          <a href="#" class="btn btn-danger btn-sm" onclick="confirm(\'Esta seguro de querer cancelar esta Reserva?: \') && setReject(\''.$row["BookingId"].'\')">Cancelar</a>
                         
                          </td>	 ';
                          }
                          else if ($row['Status']=="Paid"){
                              $eventTable .='<td><form action="../include/pdf.php" method="POST" >
                              <input type="hidden" value="'.$row['BookingId'].'"  name="eventBookingId" />
                              <button type="submit" class="btn btn-primary btn-sm">Facturar</button>
                              </form>
                              <button class="btn btn-secondary btn-sm" onclick="confirm(\'¿Está seguro? ¿Desea poner a disposición este evento:  \') && setFree(\''.$row["BookingId"].'\')">Libre</button>
                            
                              </td> 	 ';
                          }
                          else if ($row['Status']=="Cancelled"){
                              $eventTable .='       <td>
                              
                              <span>Cancelado por Cliente</span>
                              </td>	';
                          } 
                          else if ($row['Status']=="Rejected"){
                              $eventTable .='         <td>
                              
                              <span>Cancelado por Administrador</span>
                              </td>	';
                          }
                          else{
                              $eventTable .='<td><form action="../include/pdf.php" method="POST" >
                              <input type="hidden" value="'.$row['BookingId'].'"  name="eventBookingId" />
                              <button type="submit" class="btn btn-primary btn-sm">Facturar</button>
                            
                              </td></form> 	 ';
                          }
                            
                   $eventTable.='  <td><button class="btn btn-light btn-sm"  name="showDetails" onclick=" showDetails(\''.$row["BookingId"].'\') "> Ver Detalle</button></td> </tr>';
       }
     }
   else 
   {
   
     $eventTable.='<tr><td colspan="12" style="color:red;text-align:center;">No hay  registros disponibles </td></tr>';
   
   }
   
    $eventTable.='</tbody>
                 </table></div>';
    
    echo $eventTable;
   
   } 

   
  //  -----------------------------------------  Event Payment ------------------------------------

if(isset($_POST['eventPayment'])){
   
  $paymentTable='<br><br>';
  if(isset($_POST['msg'])){ 
          $paymentTable.='<div class="alert alert-success" role="alert">' . $_POST["msg"].' </div>';
        }
    if (isset($_POST["error"])) {
      $paymentTable.='<div class="alert alert-danger">' . $_POST["error"] . '</div>';
    }
     

      $paymentTable.='<div class="table-responsive">
      <table class="table table-hover " id="userTable">
<thead class="thead-dark">
  <tr >
    <th scope="col">User</th>
    <th scope="col">Payment Date</th>
    <th scope="col">Payment Type</th>
    <th scope="col">Amount</th>
    <th scope="col">Event Type</th>
    <th scope="col">Hall No</th>
    <th scope="col">Event Date </th>
    <th scope="col">Event Time</th>
    
  </tr>
</thead>
<tbody>';
  
$filter = $_POST['filter'];

switch($filter){

  case 1:  $selectPayments =  "SELECT ep.*,em.*,et.EventType,el.HallNumber,us.Nombre FROM event_payment ep
                              inner join event_booking em on ep.BookingId = em.BookingId
                              inner join event_list el on el.EventId = em.EventId
                              inner join event_type et on el.EventTypeId = et.EventTypeId 
                              inner join users_details us on us.Userid = em.User_id 
                              order by ep.PaymentDate desc";
                              break;

  case 2:  $selectPayments =  "SELECT ep.*,em.*,et.EventType,el.HallNumber,us.Nombre FROM event_payment ep
                              inner join event_booking em on ep.BookingId = em.BookingId
                              inner join event_list el on el.EventId = em.EventId
                              inner join event_type et on el.EventTypeId = et.EventTypeId 
                              inner join users_details us on us.Userid = em.User_id 
                              where ep.PaymentType = 'Cash'
                              order by ep.PaymentDate desc";
                              break;

 case 3:  $selectPayments =  "SELECT ep.*,em.*,et.EventType,el.HallNumber,us.Nombre FROM event_payment ep
                              inner join event_booking em on ep.BookingId = em.BookingId
                              inner join event_list el on el.EventId = em.EventId
                              inner join event_type et on el.EventTypeId = et.EventTypeId 
                              inner join users_details us on us.Userid = em.User_id 
                              where ep.PaymentType = 'Credit Card'
                              order by ep.PaymentDate desc";
                              break;

 case 4:  $selectPayments =  "SELECT ep.*,em.*,et.EventType,el.HallNumber,us.Nombre FROM event_payment ep
                              inner join event_booking em on ep.BookingId = em.BookingId
                              inner join event_list el on el.EventId = em.EventId
                              inner join event_type et on el.EventTypeId = et.EventTypeId 
                              inner join users_details us on us.Userid = em.User_id 
                              where ep.PaymentType = 'Debit Card'
                              order by ep.PaymentDate desc";
                              break;

 case 5:  $selectPayments =  "SELECT ep.*,em.*,et.EventType,el.HallNumber,us.Nombre FROM event_payment ep
                              inner join event_booking em on ep.BookingId = em.BookingId
                              inner join event_list el on el.EventId = em.EventId
                              inner join event_type et on el.EventTypeId = et.EventTypeId 
                              inner join users_details us on us.Userid = em.User_id 
                              where ep.PaymentType = 'Net Banking'
                              order by ep.PaymentDate desc";
                              break;

 case 6:  $selectPayments =  "SELECT ep.*,em.*,et.EventType,el.HallNumber,us.Nombre FROM event_payment ep
                              inner join event_booking em on ep.BookingId = em.BookingId
                              inner join event_list el on el.EventId = em.EventId
                              inner join event_type et on el.EventTypeId = et.EventTypeId 
                              inner join users_details us on us.Userid = em.User_id 
                              where ep.Amount < 5000
                              order by ep.PaymentDate desc";
                              break;

 case 7:  $selectPayments =  "SELECT ep.*,em.*,et.EventType,el.HallNumber,us.Nombre FROM event_payment ep
                              inner join event_booking em on ep.BookingId = em.BookingId
                              inner join event_list el on el.EventId = em.EventId
                              inner join event_type et on el.EventTypeId = et.EventTypeId 
                              inner join users_details us on us.Userid = em.User_id 
                              where ep.Amount >= 5000 AND ep.Amount <=10000
                              order by ep.PaymentDate desc";
                              break;

 case 8:  $selectPayments =  "SELECT ep.*,em.*,et.EventType,el.HallNumber,us.Nombre FROM event_payment ep
                              inner join event_booking em on ep.BookingId = em.BookingId
                              inner join event_list el on el.EventId = em.EventId
                              inner join event_type et on el.EventTypeId = et.EventTypeId 
                              inner join users_details us on us.Userid = em.User_id 
                              where ep.Amount >= 10000 AND ep.Amount <=15000
                              order by ep.PaymentDate desc";
                              break;

case 9:  $selectPayments =  "SELECT ep.*,em.*,et.EventType,el.HallNumber,us.Nombre FROM event_payment ep
                              inner join event_booking em on ep.BookingId = em.BookingId
                              inner join event_list el on el.EventId = em.EventId
                              inner join event_type et on el.EventTypeId = et.EventTypeId 
                              inner join users_details us on us.Userid = em.User_id 
                              where ep.Amount > 15000 
                              order by ep.PaymentDate desc";
                              break;

  default: $selectPayments = "SELECT ep.*,em.*,et.EventType,el.HallNumber,us.Nombre FROM event_payment ep
                              inner join event_booking em on em.BookingId = ep.BookingId
                              inner join event_list el on el.EventId = em.EventId
                              inner join event_type et on et.EventTypeId = el.EventTypeId 
                              inner join users_details us on us.Userid = em.User_id 
                              order by ep.PaymentDate desc";
                              break;
}

 $payments = mysqli_query($con,$selectPayments);
 $noOfPayment = mysqli_num_rows($payments);

 if($noOfPayment>=1){
     while($row=mysqli_fetch_assoc($payments))
     {
        
       $paymentTable.=' <tr>
                 
                 <td>'.$row["Nombre"].'</td>
                 <td>'.$row["PaymentDate"].'</td>
                 <td>'.$row["PaymentType"].'</td>
                 <td>'.$row["Amount"].'</td>
                 <td>'.$row["EventType"].'</td>
                 <td>'.$row["HallNumber"].'</td>
                 <td>'.$row["Event_date"].'</td>
                 <td>'.$row["EventTime"].'</td>
             
                 
             ';

              
     }
   }
 else 
 {
 
   $paymentTable.='<tr><td colspan="12" style="color:red;text-align:center;">No hay  registros disponibles </td></tr>';
 
 }

  $paymentTable.='</tbody>
               </table></div>';
  
  echo $paymentTable;
}
 
// ------------------------------------------- Listado de Mensajes - ----------------------------

if(isset($_POST['contactDetails'])){

  $userTable='<br><br>';
    if(isset($_POST['msg'])){ 
            $userTable.='<div class="alert alert-success" role="alert">' . $_POST["msg"].' </div>';
          }
      if (isset($_POST["error"])) {
        $userTable.='<div class="alert alert-danger">' . $_POST["error"] . '</div>';
      }
       

        $userTable.='<div class="table-responsive">
        <table class="table table-hover " id="userTable">
<thead class="thead-dark">
    <tr >
   
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Email</th>
      <th scope="col">Feedback</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>';
    

   
    $contacts = "SELECT * FROM contact";
  
   
    $all = mysqli_query($con,$contacts);
    $noOfUsers = mysqli_num_rows($all);

    if($noOfUsers>=1){
        while($row=mysqli_fetch_assoc($all))
        {
           
          $userTable.=' <tr>
                   
                    <td>'.$row["FirstName"].'</td>
                    <td>'.$row["LastName"].'</td>
                    <td>'.$row["Email"].'</td>
                    <td>'.$row["Message"].'</td>
                    <td> ';
           
              $userTable.="<button class='btn btn-danger' name='deleteUser' onclick=\"confirm('Confirma la eliminacion del Mensaje de: ".$row["FirstName"]."?') && deleteContact('".$row["ID"]."')\">Borrar</button>
                     
                    </td>
            </tr>";
        }
      }
    else 
    {
    
      $userTable.='<tr><td colspan="5" style="color:red;text-align:center;">No hay  registros disponibles </td></tr>';
    
    }

    $userTable.='</tbody>
    </table></div>';
  echo $userTable;
  }

?>