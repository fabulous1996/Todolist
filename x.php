<?php

require_once __DIR__ . "/classes/User.php";
require_once __DIR__ . "/repositories/UserRepository.php";

if (
    !empty($_POST) &&
    isset($_POST['prenom']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['passwordConfirm'])
) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password']; 
    $passwordConfirm = $_POST['passwordConfirm']; 

     if ($password !== $passwordConfirm) {
        echo "Passwords do not match."; 
        exit; 
}
   
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $newUser = new User(
        $userID = null,
        $prenom,
        $email,
        $hashedPassword 
    );

    $userRepository = new UserRepository();

    $userRepository->create($newUser);
    header('Location: login.php');

 }