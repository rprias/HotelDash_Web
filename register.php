<?php

include('include/functions.php');

// User registration
if (isset($_POST['user_registration'])) {
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $noDocu = mysqli_real_escape_string($con, $_POST['noDocu']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $dcoTipo = mysqli_real_escape_string($con, $_POST['dcoTipo']);
    $contactno = mysqli_real_escape_string($con, $_POST['contactno']);
    $genero = mysqli_real_escape_string($con, $_POST['genero']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);
    
    // Profile image upload
    $profileImageName = $_FILES["profileImage"]["name"];
    $tempname = $_FILES["profileImage"]["tmp_name"];
    $folder = "assets/picture/profiles/" . $profileImageName;

    // Revisa si el usuario con el mismo email ya existe
    $user_details = "SELECT * FROM users_details WHERE Email='$email'";
    $result = mysqli_query($con, $user_details) or die("Can't fetch");
    $num = mysqli_num_rows($result);

    if ($nombre == "admin") {
        $error = "Nombre de usuario no válido (¡No puede utilizar el nombre de usuario como admin!)";
        error("signup.php", $error);
    } else if ($num > 0) {
        $error = "Usuario ya Registrado, intente con un nuevo Email!";
        error("signup.php", $error);
    } else {
        // Password validation
        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (strlen($password) < 3){  //|| !$number || !$uppercase || !$lowercase || !$specialChars)
            $error = "La contraseña debe tener al menos 3 caracteres y contener como mínimo un número, una letra mayúscula, una letra minúscula y un carácter especial.";
            error("signup.php", $error);
        } else {
            if ($password == $confirmPassword) {
                $error = "Las Contraseñas no son iguales!";
                error("signup.php", $error);
            } else {
                // Query to insert user details
                $insert = "INSERT INTO users_details (dcoTipo, Nombre, NoDocu, Email, password, ContactNo, genero, ProfileImage) 
                           VALUES ('$dcoTipo', '$nombre', '$noDocu', '$email', '$password', '$contactno', '$genero', '$profileImageName')";

                if (mysqli_query($con, $insert)) {
                    if (!move_uploaded_file($tempname, $folder)) {
                        $error = "Error en registro, los campos no coinciden";
                        error("signup.php", $error);
                    } else {
                        $_SESSION['success_message'] = "Registro exitoso. Bienvenido!";
                        $_SESSION['loggedUserName']=$row['Nombre'];
                        $_SESSION['loggedUserId']=$row['UserId'];
                        header("Location:index.php");
                        exit(); // Asegúrate de usar exit después de redirigir
                    }
                } else {
                    $error = "Error en su registro. Intente nuevamente";
                    error("signup.php", $error);
                }
            }
        }
    }
}

?>