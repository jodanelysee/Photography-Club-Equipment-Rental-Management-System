<?php
require_once '../models/members_model.php';
require_once '../models/equipment_model.php';

$model = new EquipmentModel();

session_start();

if (!isset($_SESSION['members_id'])) {
    header('Location: login.php');
}

$logged_in_member_id = $_SESSION['members_id'];
$equipment_model = new EquipmentModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['return'])) {
        $result = $equipment_model->changeStatus($_POST['equipment_id'], 0);
        if ($result) {
            $message = "Status " . $result . "Changed ";
            header('Location: equipment.php');
        } else {
            $message = "Failed";
        }
    } else if (isset($_POST['borrow'])) {
        $result = $equipment_model->changeStatus($_POST['equipment_id'], 1);
        if ($result) {
            $message = "Status " . $result . "Changed ";
            header('Location: equipment.php');
        } else {
            $message = "Failed";
        }
    } else if (isset($_POST['sign_out'])) {
        $_SESSION = array();
        session_destroy();
        header('Location: login.php');
    } else if (isset($_POST['delete'])) {
        $result = $equipment_model->deleteEquipment($_POST['equipment_id']);
        if ($result) {
            $message = "Item " . $result . "Deleted ";
            header('Location: equipment.php');
        } else {
            $message = "Failed";
        }
    }
}

$equipment_list = $model->listEquipment();

require_once '../views/equipment_view.php'
?>
