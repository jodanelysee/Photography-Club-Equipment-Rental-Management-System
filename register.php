<?php
require_once '../models/members_model.php';

session_start();

if (isset($_SESSION['members_id'])){
    header('Location: equipment.php');
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $members_model = new MembersModel();
    if(!empty($members_model->find_member($_POST['email']))){
        $message = "Entered email is already in use.";
    }
    $result = $members_model->add_new_members ($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);   
    $message = "Successfully registered";
    sleep(2);
    header("Location: login.php");
}

include '../views/register_view.php'
?>
