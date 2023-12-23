<?php
require_once '../models/equipment_model.php';

$message = '';

session_start();

if (!isset($_SESSION['members_id'])) {
    header('Location: login.php');
}

$logged_in_member_id = $_SESSION['members_id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'add') {
        $equipment_model = new EquipmentModel();
            $result = $equipment_model->addEquipment($_POST['name'],
            0, $_POST['image_url'],$logged_in_member_id);       
            if ($result) {
                $message = "Equipment " . $result . "Added ";
                header('Location: equipment.php');
            } else {
                $message = "Failed";
            }
        } else if(isset($_POST['sign_out'])) {
            // TODO: handle sign out logic
            $_SESSION = array();
            session_destroy();
            header('Location: login.php');
        }
      
    }
include '../views/addEquipment_view.php'
?>