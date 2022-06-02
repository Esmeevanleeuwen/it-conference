<?php

use LDAP\Result;

class crud{
    private $db;

    function __construct($conn){
        $this->db = $conn;
    }

    public function insert($firstname, $lastname, $date, $specialty, $email, $phone ){
        try {
            $sql = "INSERT INTO attandee (firstname,lastname,date,specialty_id,email,phone
            ) VALUES (:firstname,:lastname,:date,:specialty,:email,:phone)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':firstname', $firstname);
            $stmt->bindparam(':lastname', $lastname);
            $stmt->bindparam(':date', $date);
            $stmt->bindparam(':specialty', $specialty, PDO::PARAM_INT);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':phone', $phone);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function editAttendee($id, $firstname, $lastname, $date, $specialty, $email, $phone ){
        try { 
            $sql = "UPDATE `attandee` SET `firstname`=:firstname,`lastname`=:lastname,`date`=:date,`specialty_id`=:specialty,`email`=:email,`phone`=:phone WHERE id = :id ";
            $stmt = $this->db->prepare($sql);
        

            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':firstname', $firstname);
            $stmt->bindparam(':lastname', $lastname);
            $stmt->bindparam(':date', $date);
            $stmt->bindparam(':specialty', $specialty, PDO::PARAM_INT);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':phone', $phone);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function getAttendees(){
        try{
            $sql = "SELECT * FROM `attandee` a inner join specialty s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendeeDetails($id){
        try{
            $sql = "SELECT * FROM `attandee` a inner join specialty s on a.specialty_id = s.specialty_id WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function deleteAttendee($id){
        try{
            $sql =  "delete from attandee where id =:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getSpecialties(){
        try{
            $sql = "SELECT * FROM `specialty`";
            $result = $this->db->query($sql);
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


}

?>