<?php

$error = null;

if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $sql = 'SELECT * FROM users WHERE pseudo="'.$_POST['pseudo'].'" LIMIT 1';
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['msg-flash'] = ' Salut '.$user['pseudo'];
                $_SESSION['user'] = $user;
                redirectToRoute('index.php');
            }
        }
        $error = 'Pseudo ou mot de passe incorrect !';
        
        /* Libération du jeu de résultats */
        $result->close();
    }
}
