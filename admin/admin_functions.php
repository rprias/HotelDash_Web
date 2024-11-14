<?php
include '../include/functions.php';
    
// ---------------------------------------User Actions----------------------------------------------

   // Añade un nuevo usuario desde la consola de Administración

    if(isset($_POST['user_registration'])){
        
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $noDocu = mysqli_real_escape_string($con, $_POST['noDocu']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $dcoTipo = mysqli_real_escape_string($con, $_POST['dcoTipo']);
        $contactno = mysqli_real_escape_string($con, $_POST['contactno']);
        $genero = mysqli_real_escape_string($con, $_POST['genero']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $rol = mysqli_real_escape_string($con, $_POST['rol']);
        $confirmPassword = mysqli_real_escape_string($con, $_POST['conformPassword']);

     
        // profile image upload
        $profileImageName = $_FILES["profileImage"]["name"];
        $tempname = $_FILES["profileImage"]["tmp_name"];   
        $folder = "../assets/picture/profiles/".$profileImageName;
             
    
        // $re_pass = base64_encode(mysqli_real_escape_string($conn, $_POST['reg_pass']));
    
        $User_details="SELECT * FROM users_details WHERE Email='$email'";
        $result=mysqli_query($con,$User_details)or die("can't fetch");
        $num=mysqli_num_rows($result);
    
      
        $sendData = array();
        if ($nombre == "admin") {
            $error="Nombre de usuario no válido (¡No puede utilizar el nombre de usuario como admin!)";
            $sendData = array(
                "msg"=>"",
                "error"=>$error
            );
            echo json_encode($sendData);
        } else if ($num>0) {
            $error="El nombre de usuario o la dirección de correo electrónico ya están ocupados.";
            $sendData = array(
                "msg"=>"",
                "error"=>$error
            );
            echo json_encode($sendData);
        } else {
    
            $number = preg_match('@[0-9]@', $password);
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
           
            // if(strlen($password) < 3 || !$number || !$uppercase || !$lowercase || !$specialChars) {
    
             //password validation 
    
              if(strlen($password) < 3) {
                    $error = "La contraseña debe tener al menos 3 caracteres y contener como mínimo un número, una letra mayúscula, una letra minúscula y un carácter especial.";
                    $sendData = array(
                        "msg"=>"",
                        "error"=>$error
                    );
                    echo json_encode($sendData);
              }else{
    
                  if($password!=$confirmPassword){
                        $error = "¡Contraseña inválida y confirmar contraseña !";
                        $sendData = array(
                            "msg"=>"",
                            "error"=>$error
                        );
                        echo json_encode($sendData);
                  }else{
    
                        // query validation
                        $insert = "INSERT INTO users_details (dcoTipo, Nombre, NoDocu, Email, password, ContactNo, genero, ProfileImage) 
                           VALUES ('$dcoTipo', '$nombre', '$noDocu', '$email', '$password', '$contactno', '$genero', '$profileImageName')";
    
                        if(mysqli_query($con,$insert))
                        {
                            if(!move_uploaded_file($tempname, $folder)){
                                $error ="¡Error en el registro ...! Pruebe en otro momento.";
                                $sendData = array(
                                    "msg"=>"",
                                    "error"=>$error
                                );
                                echo json_encode($sendData);
                            }else{
                                header("Location:user.php");
                                exit(); // Asegúrate de usar exit después de redirigir
                            }
                        }
                        else{
                              $error ="Error en el registro ...! Pruebe en otro momento.";
                              $sendData = array(
                                "msg"=>"",
                                "error"=>$error
                            );
                            echo json_encode($sendData);
    
                      }
    
                  }
              }
            
       }

    }
    
// delete of user account
if(isset($_POST['deleteUser'])){
    $user_id = mysqli_real_escape_string($con, $_POST['userId']);
    $query_deleteUser = "DELETE FROM users_details WHERE UserId = '$user_id' ";
    $sendData = array();
    if(mysqli_query($con,$query_deleteUser)){
        $sendData = array(
            "msg"=>"Usuario eliminado",
            "error"=>""
        );
        echo json_encode($sendData);
    }else{
        $error = "El usuario ya tiene una reserva.";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
        echo json_encode($sendData);
    }
}

//update - getting the selected user details
if(isset($_POST['userUpdateId'])){
    $userID = $_POST['userUpdateId'];

    $query_selectUser = "select * from users_details where UserId = '$userID' ";
    $single_user = mysqli_query($con,$query_selectUser);
    $num_of_rows = mysqli_num_rows($single_user);
    $response = array();
    if($num_of_rows<1){
        $response['status'] = 200;
        $response['message'] = "Id de Usuario no Valido.";
    }else{
        while($row = mysqli_fetch_assoc($single_user)){
            $response = $row;
        }
    }
    echo json_encode($response);
}

//Modificar usuarios desde la tabla.

if (isset($_POST['updateUserID'])) {
    // Sanitizar los datos de entrada
    $user_id = mysqli_real_escape_string($con, $_POST['updateUserID']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $noDocu = mysqli_real_escape_string($con, $_POST['noDocu']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $dcoTipo = mysqli_real_escape_string($con, $_POST['dcoTipo']);
    $contactno = mysqli_real_escape_string($con, $_POST['contactNo']);
    $genero = mysqli_real_escape_string($con, $_POST['genero']);
    $rol = mysqli_real_escape_string($con, $_POST['rol']);

    // Manejar la carga de la imagen de perfil
    $profileImageName = $_FILES["profileImage"]["name"];
    $tempname = $_FILES["profileImage"]["tmp_name"];
    $folder = "../assets/picture/profiles/" . basename($profileImageName);

    // Comprobar si ya existen detalles de usuario
    $user_details_query = "SELECT * FROM users_details WHERE (Email='$email') AND UserId <> '$user_id'";
    $result = mysqli_query($con, $user_details_query) or die("No se pueden obtener los datos");
    $num = mysqli_num_rows($result);

    $sendData = array();

    // Comprobaciones de validación
    if ($nombre == "admin") {
        $error = "Nombre de usuario no válido (¡No puede utilizar el nombre de usuario como admin!)";
        $sendData = array("msg" => "", "error" => $error);
        echo json_encode($sendData);
    } else if ($num > 0) {
        $error = "El nombre de usuario o la dirección de correo electrónico ya están ocupados.";
        $sendData = array("msg" => "", "error" => $error);
        echo json_encode($sendData);
    } else {
        // Actualizar los detalles del usuario
        $update_query = "UPDATE users_details SET DcoTipo = '$dcoTipo', Nombre='$nombre', NoDocu='$noDocu', Email='$email', ContactNo='$contactno', Genero='$genero', Rol='$rol', ProfileImage='$profileImageName' WHERE UserId = '$user_id'";

        if (mysqli_query($con, $update_query)) {
            // Mover el archivo subido
            if (!move_uploaded_file($tempname, $folder)) {
                $error = "Error en la carga del archivo. Intente nuevamente más tarde.";
                $sendData = array("msg" => "", "error" => $error);
                echo json_encode($sendData);
            } else {
                $message = "Usuario actualizado correctamente.";
                $sendData = array("msg" => $message, "error" => "");
                echo json_encode($sendData);
            }
        } else {
            $error = "Error al actualizar los detalles del usuario.";
            $sendData = array("msg" => "", "error" => $error);
            echo json_encode($sendData);
        }
    }
} 


// ------------------------------------- Gallery Actions -----------------------------------------------------

if(isset($_FILES['galleryImage'])){
 
        $profileImageName = $_FILES["galleryImage"]["name"];
        $tempname = $_FILES["galleryImage"]["tmp_name"];   
        $folder = "../assets/picture/gallery/".$profileImageName;
        $sendData = array();

       if(!move_uploaded_file($tempname, $folder)){
        
            $error ="¡Error al añadir ...! Pruebe después";
            $sendData = array(
                "msg"=>"",
                "error"=>$error
            );
           
        }
        else{

          $message = "La imagen fue Añadida";
            $sendData = array(
                "msg"=>$message,
                "error"=>""
            );
       
        }

        echo json_encode($sendData);
}


if(isset($_POST['deleteImage'])){

$filename = $_POST['Url'];
$sendData = array();
if (unlink($filename)) {
	$sendData = array(
        "msg"=>"La Imagen fue borrada",
        "error"=>""
    );
} else {
    $sendData = array(
        "msg"=>"",
        "error"=>"Error en el borrado de Imagenes.."
    );
}
echo json_encode($sendData);
}

// --------------------------------------- Tipo de Habitacion Action ----------------------------------------

//add new type of room
if(isset($_POST['roomTypeName'])){

    $roomType = ucfirst($_POST['roomTypeName']);
    $roomCost =  $_POST['roomCost'];
    $desc =  $_POST['description'];
    $fileName = $_FILES['roomTypeImage']['name'];
    $tempname = $_FILES['roomTypeImage']['tmp_name'];
    $folder = "../assets/picture/RoomType/".$fileName;

    $sql_roomType = "select * from room_type where roomType like '$roomType'";
    $result_room = mysqli_query($con,$sql_roomType);
    $num_rooms = mysqli_num_rows($result_room);

    $sendData = array();
    if($num_rooms>=1){
        $sendData = array(
            "msg" => "",
            "error"  => "El Tipo de habitacion ya Existe."
        );
    }
    else{
       $insert_query = "insert into room_type(RoomType,RoomImage,Cost,Description) values('$roomType','$fileName','$roomCost','$desc')";
       
       if(mysqli_query($con,$insert_query)){

        if(!move_uploaded_file($tempname, $folder)){
        
            $error ="Error in Adding ...! Try after sometime";
            $sendData = array(
                "msg"=>"",
                "error"=>$error
            );
           
        }
        else{
    
          $message = "Tipo de Habitacion is Added";
            $sendData = array(
                "msg"=>$message,
                "error"=>""
            );
       
        }
       }
       else{

        $error ="¡Error al añadir ...! Pruebe después";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );

       }
    }
    echo json_encode($sendData);
}

// deleting the Tipo de Habitacion

if(isset($_POST['deleteRoomType'])){
    $type_id = $_POST['typeId'];
    $query_deleteUser = "Delete from room_type where RoomTypeId = '$type_id' ";
    $sendData = array();
    if(mysqli_query($con,$query_deleteUser)){
        $sendData = array(
            "msg"=>"This Tipo de Habitacion is Deleted",
            "error"=>""
        );
        echo json_encode($sendData);
    }else{
        $error = "This Tipo de Habitacion Has a Rooms in Hotel";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
        echo json_encode($sendData);
    }
}


//update - getting the selected Tipo de Habitacion details

if(isset($_POST['roomTypeUpdateId'])){
    $roomTypeUpdateId = $_POST['roomTypeUpdateId'];
   
    $query_type = "select * from room_type where RoomTypeId = '$roomTypeUpdateId' ";
    $single_type = mysqli_query($con,$query_type);
    $num_of_rows = mysqli_num_rows($single_type);
    $response = array();
    if($num_of_rows<1){
        $response['rol'] = 200;
        $response['message'] = "invalid user id";
    }else{
        while($row = mysqli_fetch_assoc($single_type)){
            $response = $row;
        }
    }
    echo json_encode($response);
}



//Actualizar los detalles del Tipo de Habitacion

if(isset($_POST['roomTypeId'])){
             
    $updateId = $_POST['roomTypeId'];
    $roomType = ucfirst($_POST['editRoomTypeName']);
    $roomCost =  $_POST['editRoomCost'];
    $desc =  $_POST['editDescription'];
    $fileName = $_FILES['editRoomTypeImage']['name'];
    $tempname = $_FILES['editRoomTypeImage']['tmp_name'];
    $folder = "../assets/picture/RoomType/".$fileName;
    
    $sql_roomType = "select * from room_type where roomTypeId = '$updateId'";
    $result_room = mysqli_query($con,$sql_roomType);
    $num_rooms = mysqli_num_rows($result_room);
    
    
    $sendData = array();
    if ($num_rooms==0) {
        $error="Tipo de Habitacion is Not avaiable!";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
        echo json_encode($sendData);
    } else {
        
        // query validation
        $sql_duplicate = "select * from room_type where roomType like '$roomType' AND RoomTypeId <> '$updateId' ";
        $result_dup = mysqli_query($con,$sql_duplicate);
        $nums = mysqli_num_rows($result_dup);

        // already available Tipo de Habitacion 
        if($nums>0){
            $error ="Tipo de Habitacion ya disponible";
            $sendData = array(
                "msg"=>"",
                "error"=>$error
            );
            echo json_encode($sendData);
        }
        else{


            $update="UPDATE room_type SET  RoomType='$roomType', RoomImage ='$fileName',Description='$desc',Cost='$roomCost' where RoomTypeId = '$updateId'" ;
        
        
            if(mysqli_query($con,$update))
            {
                            if(!move_uploaded_file($tempname, $folder)){
                                //if(false){
                                    $error ="Error in Updation ...! Try after sometime";
                                $sendData = array(
                                    "msg"=>"",
                                    "error"=>$error
                                );
                                echo json_encode($sendData);
                            }else{
                                $message = "Detalles del Tipo de Habitacion Actualizados con Exito";
                              // message("user.php","User Added");
                              $sendData = array(
                                  "msg"=>$message,
                                "error"=>""
                            );
                            echo json_encode($sendData);
                        }
                        }
                        else{
                            $error ="Error in Updation ...! Try after sometime update";
                            $sendData = array(
                                "msg"=>"",
                                "error"=>$error
                            );
                            echo json_encode($sendData);
                            
                        }
    
                        
                        
                    }
        }

                
    }
    
      
// ---------------------------------------------Room Actions ---------------------------------------------
if(isset($_POST['roomNumber'])){
    $roomType = $_POST['roomType'];
    $roomNumber =  $_POST['roomNumber'];
    $validation = "select * from room_list where RoomNumber = '$roomNumber' ";
    $validation_result = mysqli_query($con,$validation);
    $validation_num = mysqli_num_rows($validation_result);
    $sendData = array();
    
if($validation_num>=1){
    $error ="The room number is already exists";
    $sendData = array(
        "msg"=>"",
        "error"=>$error
    );
}
else{
    $insert_query = "insert into room_list(RoomTypeId,RoomNumber) values('$roomType','$roomNumber')";
    
    if(mysqli_query($con,$insert_query)){
        
        $message = "Room is Added";
        $sendData = array(
            "msg"=>$message,
            "error"=>""
        );
   
        
    }
    
    else{

        $error ="Error in Adding ...! Try after sometime";
     $sendData = array(
         "msg"=>"",
         "error"=>$error
        );

    }
}
    

echo json_encode($sendData);
}

if(isset($_POST['deleteRoom'])){
    $roomId = $_POST['roomId'];
    $query_deleteRoom = "Delete from room_list where RoomId = '$roomId' ";
    $sendData = array();
    if(mysqli_query($con,$query_deleteRoom)){
        $sendData = array(
            "msg"=>"This Room  is Deleted",
            "error"=>""
        );
        echo json_encode($sendData);
    }else{
        $error = "This Room  Has a Booking";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
        echo json_encode($sendData);
    }
}


//update - getting the selected room  details

if(isset($_POST['roomUpdateId'])){
    $roomUpdateId = $_POST['roomUpdateId'];
   
    $query_type =  "SELECT rt.RoomTypeId,rt.RoomType,rl.RoomNumber,rl.Rol FROM room_list rl  inner join room_type rt on  rl.RoomTypeId = rt.RoomTypeId WHERE rl.RoomId like '$roomUpdateId' ";
    $single_type = mysqli_query($con,$query_type);
    $num_of_rows = mysqli_num_rows($single_type);
    $response = array();
    if($num_of_rows<1){
        $response['rol'] = 200;
        $response['message'] = "invalid user id";
    }else{
        while($row = mysqli_fetch_assoc($single_type)){
            $response = $row;
        }
    }
    echo json_encode($response);
}




//update the datails of room table

if(isset($_POST['updateRoomId'])){
             
    $updateRoomId = $_POST['updateRoomId'];
    $editRoomType = $_POST['editRoomType'];
    $editRoomNumber = $_POST['editRoomNumber'];
    $editRol =  $_POST['editRol'];
   
  
    
    $validation = "select * from room_list where RoomNumber = '$editRoomNumber' AND RoomId <> '$updateRoomId'";
    $validation_result = mysqli_query($con,$validation);
    $validation_num = mysqli_num_rows($validation_result);
    
    $sendData = array();

    if($validation_num>=1){
    $error ="The room number is already exists";
    $sendData = array(
    "msg"=>"",
    "error"=>$error
    );

    } else {
        
        // query validation
        $update="UPDATE room_list SET  RoomTypeId='$editRoomType',RoomNumber='$editRoomNumber',Rol='$editRol' where roomId = '$updateRoomId'" ;
        
        
        if(mysqli_query($con,$update))
        {
                       
                            $message = "Room details updated";
                          // message("user.php","User Added");
                          $sendData = array(
                              "msg"=>$message,
                            "error"=>""
                        );
                     
                    
            }
            else{
                $error ="Error in Updation ...! Try after sometime update";
                $sendData = array(
                    "msg"=>"",
                    "error"=>$error
                );
                
            }

                    
                    
        }
        echo json_encode($sendData);

        
    }

    // -------------------------------------------- Booking Actions ------------------------------------- 
    //update - getting the selected room  details

if(isset($_POST['bookingDetail'])){
    $ID = $_POST['bookingId'];
   
    $selectBooking =   "SELECT rm.*,rt.RoomType,rl.RoomNumber,us.nombre,us.ContactNo FROM room_booking rm 
                        inner join room_list rl on rl.RoomId = rm.RoomId
                        inner join room_type rt on rl.RoomTypeId = rt.RoomTypeId 
                        inner join users_details us on us.Userid = rm.User_id 
                        where rm.BookingId = $ID ";
                    

    $single_booking = mysqli_query($con,$selectBooking);
    $num_of_rows = mysqli_num_rows($single_booking);
    $response = array();
    if($num_of_rows<1){
        $response['rol'] = 200;
        $response['message'] = "invalid booking id";
    }else{
        while($row = mysqli_fetch_assoc($single_booking)){
            $response = $row;
        }
    }
    echo json_encode($response);
}

// -------------------------------------- Event Type Actions ---------------------------------

//add new type of Event
if(isset($_POST['eventTypeName'])){

    $eventType =ucfirst($_POST['eventTypeName']);
    $eventCost =  $_POST['eventCost'];
    $desc =  $_POST['description'];
    $fileName = $_FILES['eventTypeImage']['name'];
    $tempname = $_FILES['eventTypeImage']['tmp_name'];
    $folder = "../assets/picture/EventType/".$fileName;

    $sql_eventType = "select * from event_type where eventType like '$eventType'";
    $result_room = mysqli_query($con,$sql_eventType);
    $num_events = mysqli_num_rows($result_room);

    $sendData = array();
    if($num_events>=1){
        $sendData = array(
            "msg" => "",
            "error"  => "Event Type is already Exist"
        );
    }
    else{
       $insert_query = "insert into event_type(EventType,EventImage,Cost,Description) values('$eventType','$fileName','$eventCost','$desc')";
       
       if(mysqli_query($con,$insert_query)){

        if(!move_uploaded_file($tempname, $folder)){
        
            $error ="Error in Adding ...! Try after sometime";
            $sendData = array(
                "msg"=>"",
                "error"=>$error
            );
           
        }
        else{
    
          $message = "Event Type is Added";
            $sendData = array(
                "msg"=>$message,
                "error"=>""
            );
       
        }
       }
       else{

        $error ="Error in Adding ...! Try after sometime";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );

       }
    }
    echo json_encode($sendData);
}


//update - getting the selected event type details

if(isset($_POST['eventTypeUpdateId'])){
    $eventTypeUpdateId = $_POST['eventTypeUpdateId'];
   
    $query_type = "select * from event_type where EventTypeId = '$eventTypeUpdateId' ";
    $single_type = mysqli_query($con,$query_type);
    $num_of_rows = mysqli_num_rows($single_type);
    $response = array();
    if($num_of_rows<1){
        $response['rol'] = 200;
        $response['message'] = "invalid user id";
    }else{
        while($row = mysqli_fetch_assoc($single_type)){
            $response = $row;
        }
    }
    echo json_encode($response);
}

  //update the datals of event type table

  if(isset($_POST['editEventTypeName'])){
             
    $updateId = $_POST['eventTypeId'];
    $Type = ucfirst($_POST['editEventTypeName']);
    $Cost =  $_POST['editEventCost'];
    $desc =  $_POST['editDescription'];
    $rol =  $_POST['editRol'];
    $fileName = $_FILES['editEventTypeImage']['name'];
    $tempname = $_FILES['editEventTypeImage']['tmp_name'];
    $folder = "../assets/picture/EventType/".$fileName;
    
    $sql_Type = "select * from event_type where EventtypeId = '$updateId'";
    $result = mysqli_query($con,$sql_Type);
    $num_events = mysqli_num_rows($result);
    
    
    $sendData = array();
    if ($num_events==0) {
        $error="Event Type is Not avaiable!";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
        echo json_encode($sendData);
    } else {
        

        $sql_eventType = "select * from event_type where eventType like '$Type' AND EventTypeId <> '$updateId'";
        $result_dup = mysqli_query($con,$sql_eventType);
        $nums = mysqli_num_rows($result_dup);

        if($nums>0){
            $error ="The Event Type is Already Available!";
            $sendData = array(
                "msg"=>"",
                "error"=>$error
            );
            echo json_encode($sendData);
        }
        else{


        // query validation
        $update="UPDATE event_type SET  EventType='$Type', EventImage ='$fileName', Description='$desc',Rol='$rol',Cost='$Cost' where EventTypeId = '$updateId'" ;
        
        
        if(mysqli_query($con,$update))
        {
                        if(!move_uploaded_file($tempname, $folder)){
                            //if(false){
                                $error ="Error in Updation ...! Try after sometime";
                            $sendData = array(
                                "msg"=>"",
                                "error"=>$error
                            );
                            echo json_encode($sendData);
                        }else{
                            $message = "Event Type details updated";
                          // message("user.php","User Added");
                          $sendData = array(
                              "msg"=>$message,
                              "error"=>""
                        );
                        echo json_encode($sendData);
                    }
                    }
                    else{
                        $error ="Error in Updation ...! Try after sometime update";
                        $sendData = array(
                            "msg"=>"",
                            "error"=>$error
                        );
                        echo json_encode($sendData);
                        
                    }

                    
                    
                }
                
        }


    }


    
if(isset($_POST['deleteEventType'])){
    $type_id = $_POST['typeId'];
    $query_deleteUser = "Delete from event_type where EventTypeId = '$type_id' ";
    $sendData = array();
    if(mysqli_query($con,$query_deleteUser)){
        $sendData = array(
            "msg"=>"This Event Type is Deleted",
            "error"=>""
        );
        echo json_encode($sendData);
    }else{
        $error = "This Event Type Has a Events in Hotel";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
        echo json_encode($sendData);
    }
}
        



// ---------------------------------------------Event Actions ---------------------------------------------
if(isset($_POST['hallNumber'])){
    $eventType = $_POST['eventType'];
    $hallNumber =  $_POST['hallNumber'];
    $validation = "select * from event_list where hallNumber = '$hallNumber' ";
    $validation_result = mysqli_query($con,$validation);
    $validation_num = mysqli_num_rows($validation_result);
    $sendData = array();
    
if($validation_num>=1){
    $error ="The hall number is already exists";
    $sendData = array(
        "msg"=>"",
        "error"=>$error
    );
}
else{
    $insert_query = "insert into event_list(EventTypeId,HallNumber) values('$eventType','$hallNumber')";
    
    if(mysqli_query($con,$insert_query)){
        
        $message = "Event is Added";
        $sendData = array(
            "msg"=>$message,
            "error"=>""
        );
   
        
    }
    
    else{

        $error ="Error in Adding ...! Try after sometime";
     $sendData = array(
         "msg"=>"",
         "error"=>$error
        );

    }
}
    

echo json_encode($sendData);
}

// delete the event from the data base

if(isset($_POST['deleteEvent'])){
    $eventId = $_POST['eventId'];
    $query_deleteRoom = "Delete from event_list where EventId = '$eventId' ";
    $sendData = array();
    if(mysqli_query($con,$query_deleteRoom)){
        $sendData = array(
            "msg"=>"This Hall  is Deleted",
            "error"=>""
        );
        echo json_encode($sendData);
    }else{
        $error = "This Hall  Has a Booking";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
        echo json_encode($sendData);
    }
}


//update - getting the selected event  details

if(isset($_POST['eventUpdateId'])){
    $eventUpdateId = $_POST['eventUpdateId'];
   
    $query_type =  "SELECT et.EventTypeId,et.EventType,el.HallNumber,el.Rol FROM event_list el  
                    inner join event_type et on  el.EventTypeId = et.EventTypeId
                    WHERE el.EventId like '$eventUpdateId' ";

    $single_type = mysqli_query($con,$query_type);
    $num_of_rows = mysqli_num_rows($single_type);
    $response = array();
    if($num_of_rows<1){
        $response['rol'] = 200;
        $response['message'] = "invalid event id";
    }else{
        while($row = mysqli_fetch_assoc($single_type)){
            $response = $row;
        }
    }
    echo json_encode($response);
}




//update the datails of event table

if(isset($_POST['updateEventId'])){
             
    $updateEventId = $_POST['updateEventId'];
    $editEventType = $_POST['editEventType'];
    $editHallNumber = $_POST['editHallNumber'];
    $editRol =  $_POST['editRol'];
   
  
    
    $validation = "select * from event_list where HallNumber = '$editHallNumber' AND EventID <> '$updateEventId' ";
    $validation_result = mysqli_query($con,$validation);
    $validation_num = mysqli_num_rows($validation_result);
    
    $sendData = array();

    if($validation_num>=1){
    $error ="The Hall number is already exists";
    $sendData = array(
    "msg"=>"",
    "error"=>$error
    );

    } else {
        
        // query validation
        $update="UPDATE event_list SET  EventTypeId='$editEventType',HallNumber='$editHallNumber',Rol='$editRol' where EventId = '$updateEventId'" ;
        
        
        if(mysqli_query($con,$update))
        {
                       
                            $message = "Hall details updated";
                          // message("user.php","User Added");
                          $sendData = array(
                              "msg"=>$message,
                            "error"=>""
                        );
                     
                    
            }
            else{
                $error ="Error in Updation ...! Try after sometime update";
                $sendData = array(
                    "msg"=>"",
                    "error"=>$error
                );
                
            }

                    
                    
        }
        echo json_encode($sendData);

        
    }

        // -------------------------------------------- Event Booking Actions ------------------------------------- 
    // getting the selected Event Booking details

if(isset($_POST['eventBookingDetail'])){
    $ID = $_POST['bookingId'];
   
    $selectBooking = "SELECT em.*,et.EventType,el.HallNumber,us.nombre,us.ContactNo FROM event_booking em 
                      inner join event_list el on el.EventId = em.EventId
                      inner join event_type et on el.EventTypeId = et.EventTypeId 
                      inner join users_details us on us.Userid = em.User_id 
                      where em.BookingId = '$ID'";



    $single_booking = mysqli_query($con,$selectBooking);
    $num_of_rows = mysqli_num_rows($single_booking);
    $response = array();
    if($num_of_rows<1){
        $response['rol'] = 200;
        $response['message'] = "invalid booking id";
    }else{
        while($row = mysqli_fetch_assoc($single_booking)){
            $response = $row;
        }
    }
    echo json_encode($response);
}

// ---------------------------------------------- Contact Actions ------------------------------------

// delete of contact
if(isset($_POST['deleteContact'])){
    $id = mysqli_real_escape_string($con, $_POST['ID']);
    $query_deleteUser = "Delete from contact where ID = '$id' ";
    $sendData = array();
    if(mysqli_query($con,$query_deleteUser)){
        $sendData = array(
            "msg"=>"Mensaje Borrado.",
            "error"=>""
        );
        echo json_encode($sendData);
    }else{
        $error = "Error in Deleting, Try After Sometimes";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
        echo json_encode($sendData);
    }
}
// ----------------------------------- Account ---------------------------------------


//update the datals of user table

if(isset($_POST['updateAccount'])){
             
    $user_id = mysqli_real_escape_string($con, $_POST['updateAccount']);
    $dcoTipo = mysqli_real_escape_string($con, $_POST['dcoTipo']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);  
    $noDocu = mysqli_real_escape_string($con, $_POST['noDocu']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contactno = mysqli_real_escape_string($con, $_POST['contactno']);
    $genero = mysqli_real_escape_string($con, $_POST['genero']);

    // profile image upload
    $profileImageName = $_FILES["profileImage"]["name"];
    $tempname = $_FILES["profileImage"]["tmp_name"];   
    $folder = "../assets/picture/profiles/".$profileImageName;
         

                    // query validation
                    $update_query = "UPDATE users_details SET DcoTipo = '$dcoTipo', Nombre='$nombre', NoDocu='$noDocu', Email='$email', ContactNo='$contactno', Genero='$genero', ProfileImage='$profileImageName' WHERE UserId = '$user_id'";


                    if(mysqli_query($con,$update))
                    {
                        if(!move_uploaded_file($tempname, $folder)){
                        //if(false){
                            $error ="Error in Updation ...! Try after sometime";
                            $sendData = array(
                                "msg"=>"",
                                "error"=>$error
                            );
                            echo json_encode($sendData);
                        }else{
                          $message = "User details updated";
                          // message("user.php","User Added");
                          $sendData = array(
                            "msg"=>$message,
                            "error"=>""
                        );
                        echo json_encode($sendData);
                        }
                    }
                    else{
                          $error ="Error in Updation ...! Try after sometime";
                          $sendData = array(
                            "msg"=>"",
                            "error"=>$error
                        );
                        echo json_encode($sendData);

                  }

             
        
}

// -------------------------------- Cambiar Contraseña -----------------------------------

if(isset($_POST["oldPassword"])){
    $old = $_POST['oldPassword'];
    $new = $_POST['newPassword'];
    $ID = $_POST['change_password'];

    $Q = "SELECT * FROM users_details Where UserId = '$ID'";
    $res = mysqli_query($con,$Q);
    $row = mysqli_fetch_assoc($res);
    $num = mysqli_num_rows($res);
  
   
    $sendData = array();
    if($num>0){

        if($old == $row['Password']){
            $Q_update = "UPDATE users_details us SET us.Password = '$new' Where UserId = '$ID'";
            $result = mysqli_query($con,$Q_update);
            $msg = "Contraseña Cambiada con Exito";
            $sendData = array(
                "msg"=>$msg,
                "error"=>""
            );
        }else{
            $error ="Oops! Wrong Old Password";
            $sendData = array(
              "msg"=>"",
              "error"=>$error
          );
        }
    }else{

        $error ="Invalid User ID ";
        $sendData = array(
          "msg"=>"",
          "error"=>$error
      );
    }
 echo json_encode($sendData);
}

// -------------------------------- General Setting-----------------------------------------

if(isset($_POST["generalSettings"])){
   

    $Q = "SELECT * FROM general_settings ";
    $res = mysqli_query($con,$Q);
    $row = mysqli_fetch_assoc($res);

    $sendData =array();
    if($row){
        $sendData = $row;
    }else{
        $error ="Invalid User ID ";
        $sendData = array(
          "msg"=>"",
          "error"=>$error
      );
    }

    echo json_encode($sendData);
}

if(isset($_POST['companyName'])){
    $companyName = $_POST['companyName'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $Country = $_POST['country'];
    $zip = $_POST['zip'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $teleNumber = $_POST['teleNumber'];
    $gs_id = $_POST['gs_id'];

   

    $Q = "SELECT * FROM general_settings Where ID = '$gs_id'";
    $res = mysqli_query($con,$Q);
    $row = mysqli_fetch_assoc($res);
    $num = mysqli_num_rows($res);
  
   
    $sendData = array();
    if($num>0){

        $Q_update = "UPDATE general_settings SET Name = '$companyName',Address_line1 = '$address1',Address_line2 = '$address2',
                     City = '$City', State = '$State', Country = '$Country', Zip_code = '$zip',Description = '$description',
                     Email = '$email',Phone_number = '$phoneNumber', Telephone_Number = '$teleNumber'
                     Where ID = '$gs_id'";
      
        if(mysqli_query($con,$Q_update)){
            $msg = "Los Datos de la Compañia han sido actualizados.";
            $sendData = array(
                "msg"=>$msg,
                "error"=>""
            );
        }else{
            $error ="Oops! Error in Updation";
            $sendData = array(
              "msg"=>"",
              "error"=>$error
          );
        }
    }else{

        $error ="Invalid ID ";
        $sendData = array(
          "msg"=>"",
          "error"=>$error
      );
    }
 echo json_encode($sendData);

}
  
?>