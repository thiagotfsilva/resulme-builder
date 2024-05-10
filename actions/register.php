<?php

session_start();

require '../assets/class/Database.php';
require '../assets/class/HandlerRedirect.php';

if ($_POST) {
    $data = $_POST;

    if ($data['full_name'] && $data['email'] && $data['password']) {
        $full_name = $mysql->real_escape_string($data['full_name']);
        $email = $mysql->real_escape_string($data['email']);
        $password = md5($mysql->real_escape_string($data['password']));

        $result = $mysql->query("SELECT COUNT(*) as user FROM users where (email='$email')");

        $result = $result->fetch_assoc();

        if ($result['user']) {
            $fn->setError("$email is already registered !");
            $fn->redirect('../register.php');
        }

        try {
            $mysql->query("INSERT INTO users(full_name, email, password) VALUES('$full_name', '$email', '$password')");
            $fn->setAlert('you registered successfully !');
            $fn->redirect('../login.php');
        } catch (Exception $err) {
            $fn->setError($err->getMessage());
            $fn->redirect('../register.php');
        }
    } else {
        $fn->setError("Please, fill the form !");
        $fn->redirect('../register.php');
    }
} else {
    $fn->redirect('../register.php');
};
