<?php

include("../include/functions.php");
if(isset($_POST['bookRoom'])){

    $roomTypeId = $_POST['roomTypeId'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $no_of_guest = $_POST['no_of_guest'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $totalCost = $_POST['totalCost'];
    $userId = $_SESSION['loggedUserId'];

    $checkIn = strtotime($checkIn);
    $checkIn = date('Y-m-d',$checkIn); 
    
    $checkOut = strtotime($checkOut);
    $checkOut = date('Y-m-d',$checkOut);

    $query_roomType = "select * from room_list where RoomTypeId = '$roomTypeId' AND Status = 'Activa' order by RoomId";
    $roomType  = mysqli_query($con,$query_roomType);
    if(mysqli_num_rows($roomType)>0)
{  
  while($row=mysqli_fetch_assoc($roomType))
{
      $flag = false;
      $ID=$row['RoomId'];
      if ($row['Booking_status']=='Disponible')
      { 
           $flag =true;
           $reg="INSERT into room_booking (RoomId,User_id,Date,CheckIn,CheckOut,NoOfGuest,Amount,Email,Phone_number)
            values('$ID','$userId',curdate(),'$checkIn','$checkOut','$no_of_guest','$totalCost','$email','$contactno') ";

           $update_query = "UPDATE room_list SET Booking_status = 'Booked' where RoomId = '$ID'";
            
           mysqli_query($con,$update_query);
           mysqli_query($con,$reg);
           break ; 
      }
      
  }
    if ($flag==false)
    {
       
        echo "<script>alert('Oops! Rooms are not Disponible..'); window.location.href='room.php'; </script>";
        
    }
      else {
 
        echo "<script>alert('Booking Successfull..'); window.location.href='mybooking.php'; </script>";
}
     
}
else {
    echo "<script>alert('Oops! Rooms are not Disponible'); window.location.href='room.php'; </script>";
}


}

if(isset($_POST['bookEvent'])){

    $eventTypeId = $_POST['eventTypeId'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $no_of_guest = $_POST['no_of_guest'];
    $eventDate = $_POST['eventDate'];
    $eventTime = $_POST['eventTime'];
    $eventTime = date("H:i", strtotime($eventTime));
    $total_hours = $_POST['total_hours'];
    $totalCost = $_POST['totalCost'];
    $userId = $_SESSION['loggedUserId'];

    $eventDate = strtotime($eventDate);
    $eventDate = date('Y-m-d',$eventDate); 
    

    $query_eventType = "select * from event_list where EventTypeId = '$eventTypeId' AND Status = 'Activa' order by EventId";
    $Type  = mysqli_query($con,$query_eventType);
    if(mysqli_num_rows($Type)>0)
{  
  while($row=mysqli_fetch_assoc($Type))
{
      $flag = false;
      $ID=$row['EventId'];
      if ($row['Booking_status']=='Disponible')
      { 
          
           $reg="INSERT into event_booking (EventId,User_id,Date,Event_date,NoOfGuest,EventTime,Package,Amount,Email,Phone_number)
            values('$ID','$userId',curdate(),'$eventDate','$no_of_guest','$eventTime','$total_hours','$totalCost','$email','$contactno') ";

           $update_query = "UPDATE event_list SET Booking_status = 'Booked' where EventId = '$ID'";
           
           if(mysqli_query($con,$update_query) &&  mysqli_query($con,$reg)){
             $flag =true;
           }
           break ; 
      }
      
  }
    if ($flag==false)
    {
       
        echo "<script>alert('Oops! Event hall are not Disponible..'); window.location.href='event.php'; </script>";
        
    }
      else {
 
        echo "<script>alert('Booking Successfull..');window.location.href='mybooking.php'; </script>";

}
     
}
else {
    echo "<script>alert('Oops! Activa Event halls are not Disponible'); window.location.href='room.php'; </script>";
}


}

// ----------------------------------------- Account Action -----------------------------------------------
//Actualizar los detalles de la Tabla

if(isset($_POST['updateAccount'])){
             
  $user_id = mysqli_real_escape_string($con, $_POST['updateAccount']);
  $updatedcoTipo = mysqli_real_escape_string($con, $_POST['updatedcoTipo']);
  $updatenoDocu = mysqli_real_escape_string($con, $_POST['updatenoDocu']);
  $updatenombre = mysqli_real_escape_string($con, $_POST['updatenombre']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $contactno = mysqli_real_escape_string($con, $_POST['contactno']); 
  $gender = mysqli_real_escape_string($con, $_POST['gender']);

  // Carga de la Imagen de Perfil
  $profileImageName = $_FILES["profileImage"]["name"];
  $tempname = $_FILES["profileImage"]["tmp_name"];   
  $folder = "../assets/picture/profiles/".$profileImageName;

       

  // $re_pass = base64_encode(mysqli_real_escape_string($conn, $_POST['reg_pass']));

  $User_details="SELECT * FROM users_details WHERE (Email='$email') AND UserId <> ' $user_id '";
  $result=mysqli_query($con,$User_details)or die("can't fetch");
  $num=mysqli_num_rows($result);


  $sendData = array();
 
  
 if ($updatenombre == "admin") {
      $error="Nombre de usuario no válido (¡No puede utilizar el nombre de usuario como admin!)";
      $sendData = array(
          "msg"=>"",
          "error"=>$error
      );
      echo json_encode($sendData);
  } 
 else if ($num>0) {
      $error="El email ya esta registrado";
      $sendData = array(
          "msg"=>"",
          "error"=>$error
      );
      echo json_encode($sendData);
  } else {

                  // Validacion de la Consulta
                  $update="UPDATE users_details SET 
                  Nombre='$updatenombre', 
                  DcoTipo='$updatedcoTipo', 
                  NoDocu ='$updatenoDocu',
                  Email='$email',
                  ContactNo='$contactno',
                  Genero='$gender',
                  ProfileImage='$profileImageName' 
                  where UserId = '$user_id'";
                  
                  if(mysqli_query($con,$update))
                  {
                      if(!move_uploaded_file($tempname, $folder)){
                          $error ="Error al actualizar, intentelo nuevamente.";
                          $sendData = array(
                              "msg"=>"",
                              "error"=>$error
                          );
                          echo json_encode($sendData);
                      }else{
                        $message = "Detalles del usuario Actualizado";
                        // message("user.php","User Added");
                        $sendData = array(
                          "msg"=>$message,
                          "error"=>""
                      );
                      echo json_encode($sendData);
                      }
                  }
                  else{
                        $error ="Error al actualizar, intentelo nuevamente.";
                        $sendData = array(
                          "msg"=>"",
                          "error"=>$error
                      );
                      echo json_encode($sendData);

                }

           
      
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
?>