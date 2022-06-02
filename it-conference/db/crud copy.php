<?php

class crud{
    private $db;

    function __construct($conn){
        $this->db = $conn;
    }

    public function insert($firstname, $lastname, $date, $email, $phone, $specialty){
        try {
            $sql = "INSERT INTO attandee (firstname,lastname,date,email,phone,specialty_id
            ) VALUES (:firstname,:lastname,:date,:email,:phone,:specialty)";
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
}

?>