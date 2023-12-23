<?php
require_once '../models/members_model.php';

$message = "Please Enter your Login Credentials";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'login') {
        $members_model = new MembersModel();
        $validLogin = $members_model->validate_login($_POST["email"], $_POST["password"]);
        if ($validLogin) {
            session_start();
            $_SESSION['members_id'] = $validLogin;
            $message = "Successfully logged in!";
            sleep(2);
            header ('Location: equipment.php');
        } else {
            $message = "Entered email and/or password is invalid";
        }
    }
}

include '../views/login_view.php'
?>
