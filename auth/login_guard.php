<?php

include_once "session.php";
require_once __DIR__ . '/../modules/ModuleUser.php';
require_once __DIR__ . '/../modules/ModuleEncryption.php';

$moduleUser = new ModuleUser();
$moduleEncryption = new ModuleEncryption();

if (isset($_POST['username'])) {
    if (isset($_POST['password'])) {
        $password = $moduleEncryption->encryptUserPassword($_POST['password']);
    } else {
        $password = '';
    }

    $loginAttempt = $moduleUser->loginUser(isset($_POST['username']) ? $_POST['username'] : '', $password);

    if (!empty($loginAttempt)) {
        if ($loginAttempt['status'] == 0) {
            $data['isUserDisabled'] = true;
        } else {
            $_SESSION['username'] = $loginAttempt['username'];
            $_SESSION['fullname'] = $loginAttempt['fullname'];
            $_SESSION['email'] = $loginAttempt['email'];
            $_SESSION['userid'] = $loginAttempt['userid'];
            $_SESSION['user_role'] = $loginAttempt['user_role'];
        }
    } else {
        $data['isLoginSuccess'] = false;
    }
}