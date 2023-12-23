<?php

class MembersModel
{
    public $members = array();
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=photo_club;charset=utf8',
            'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }


    public function find_member($email)
    {
        try {
            $stmt = $this->db->prepare('SELECT * FROM members where email=:email');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function validate_login($email, $password){
        try {
            $stmt = $this->db->prepare('SELECT * FROM members where email=:email AND password=PASSWORD(:password)');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result && sizeof($result)>0) {
                return $result[0]['members_id'];
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function add_new_members($first_name, $last_name, $email, $password)
    {
        try {
            $this->db->beginTransaction();
            $stmtMember = $this->db->prepare("INSERT INTO members (first_name,last_name,email,password) VALUES(:first_name,:last_name,:email,PASSWORD(:password))");
            if (!$stmtMember) {
                echo "Prepare failed: <br>";
                print_r($this->db->errorInfo());
            }
            $stmtMember->execute(array(':first_name' => $first_name, ':last_name' => $last_name, ':email' => $email,
                ':password' => $password
            ));
            $sid = $this->db->lastInsertId();

            $this->db->commit();

            return $sid;

        } catch (PDOException $ex) {
            var_dump($ex);
            $this->db->rollback();
            return false;
        }
    }
}
