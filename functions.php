<?php 
include("include/dbConnect.php");

if(isset($_POST['Message'])){
    $nombre = $_POST['Nombre'];
    $nodocu = $_POST['NoDocu'];
    $email = $_POST['Email'];
    $msg = $_POST['Message'];
    $insert_query = "INSERT INTO contact(Nombre,NoDocu,Email,Message) values('$nombre','$nodocu','$email','$msg')";
    $sendData = array();
    if( mysqli_query($con,$insert_query)){
        $mesg="Gracias por sus comentarios!";
        $sendData = array(
            "msg"=>$mesg,
            "error"=>""
        );
    }else{
        $error="Servidor Caido. Intente mas tarde";
        $sendData = array(
            "msg"=>"",
            "error"=>$error
        );
    }
    
 
    echo json_encode($sendData);
}

    
?>