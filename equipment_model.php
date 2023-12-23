<?php

require_once ('members_model.php');

class EquipmentModel {
    public $equipment = array();
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=photo_club;charset=utf8', 'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    function loadDBequipment () {
        $stmtEquipment = $this->db->prepare("INSERT INTO equipment (name,image_url,members_id,status) VALUES(:name,:image_url,:members_id,:status)");
        $members_model = new MembersModel();

        foreach ($this->equipment as $equipment) {
            $mem_desc = $equipment["name"];

            $stmtEquipment->execute(array(':name' => $equipment["name"], ':status' => $equipment["status"], ':image_url' => $equipment['image_url'], ':members_id' => $equipment["members_id"]));

            $sid = $this->db->lastInsertId();
            $pw = $equipment["name"] . "!!";
        }
    }

    function changeStatus ($equipment_id, $status) {
        $this->db->beginTransaction();
        $stmtEquipment = $this->db->prepare("UPDATE equipment SET status = :status WHERE equipment_id = :equipment_id");
        $stmtEquipment->execute(array(':equipment_id' => $equipment_id, ':status' => $status));
        $this->db->commit();
    }

    function deleteEquipment ($equipment_id) {
        $this->db->beginTransaction();
        $stmtEquipment = $this->db->prepare("DELETE FROM equipment WHERE equipment_id = :equipment_id");
        $stmtEquipment->execute(array(':equipment_id'=> $equipment_id));
        $this->db->commit();
    }

    public function listEquipment () {
        try {
            $stmt = $this->db->query('SELECT * FROM equipment');
            $equipment = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equipment;
        } catch(PDOException $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function addEquipment($name, $status, $image_url, $members_id) {
        $this->db->beginTransaction();
        $stmtEquipment = $this->db->prepare("INSERT INTO equipment (name,image_url,members_id,status) VALUES(:name,:image_url,:members_id,:status)");
        if (!$stmtEquipment) {
            echo "Prepare failed: <br>";
            print_r($this->db->errorInfo());
        }
        $stmtEquipment->execute(array(':name' => $name, ':status' => $status, ':image_url' => $image_url, ':members_id' => $members_id));
        $sid = $this->db->lastInsertId();

        $this->db->commit();

        return $sid;
    }
}
