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

    // Check if user or email already exists
    $user_details = "SELECT * FROM users_details WHERE Nombre='$nombre' OR Email='$email'";
    $result = mysqli_query($con, $user_details) or die("Can't fetch");
    $num = mysqli_num_rows($result);

    if ($nombre == "admin") {
        $error = "Invalid Username (You cannot use the username as admin!)";
        error("signup.php", $error);
    } else if ($num > 0) {
        $error = "Username or email id is already taken!";
        error("signup.php", $error);
    } else {
        // Password validation
        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (strlen($password) < 3){  //|| !$number || !$uppercase || !$lowercase || !$specialChars)
            $error = "Password must be at least 3 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
            error("signup.php", $error);
        } else {
            if ($password == $confirmPassword) {
                $error = "Invalid password and confirm password!";
                error("signup.php", $error);
            } else {
                // Query to insert user details
                $insert = "INSERT INTO users_details (dcoTipo, Nombre, NoDocu, Email, password, ContactNo, genero, ProfileImage) 
                           VALUES ('$dcoTipo', '$nombre', '$noDocu', '$email', '$password', '$contactno', '$genero', '$profileImageName')";

                if (mysqli_query($con, $insert)) {
                    if (!move_uploaded_file($tempname, $folder)) {
                        $error = "Error in Registration ...! Here";
                        error("signup.php", $error);
                    } else {
                        header("Location:index.php");
                        exit(); // Asegúrate de usar exit después de redirigir
                    }
                } else {
                    $error = "Error in Registration ...! There";
                    error("signup.php", $error);
                }
            }
        }
    }
}

?>