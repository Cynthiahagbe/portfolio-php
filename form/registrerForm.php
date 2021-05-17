<?php 

$error = null;
if (isset($_POST) && !empty($_POST)) { 
    $error=[];
    if (empty($_POST['email']) && $_POST['email'] !== $_POST['emailb'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $error['email'] = 'Les emails ne sont pas identiques !!';
    }
    if (empty($_POST['password']) && $_POST['password'] !== $_POST['passwordb']) {
        $error['password'] = 'Les mots de passe ne sont pas identiques !!';
    }
    if (strlen($_POST['password']) < 3 && strlen($_POST['password']) > 30) {
        $error['password'] = 'Votre password dois comporter 3 caractères minimum et 30 maximum !!';
    }
    if (!preg_match('#^[a-zA-Z0-9_-]{3,30}+$#', $_POST['pseudo'])) {
        $error['pseudo'] = 'Votre pseudo dois comporter 3 caractères minimum et 30 maximum. des caratères de 0 à 9, des lettre minuscules ou majuscules, des tirets et underscores!!';
    }
    if (empty($error)){
        $pseudo = $_POST['pseudo'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];   
        $roles = json_encode(['user']);     
        $sql = "INSERT INTO users(email,password,pseudo,roles) VALUES ('$email','$password','$pseudo','$roles')";  // 
        if ($mysqli->query($sql) === true) {
            $_SESSION['msg-flash'] = 'Votre compte à été crée avec succès !!';
            redirectToRoute('index.php');
        } else {
            $error = 'Une erreur est survenue, compte non crée !!';
        }
    }
}

