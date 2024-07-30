<?php

class user {
    private $db;

    function __construct($conn) {
        $this->db = $conn;
    }

    public function insertUser($username, $password) {
        try {
            $result = $this->getUserByUsername($username);
            if ($result['num'] > 0) {
                return false;
            } else {
                $new_password = md5($password . $username);
                $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $new_password);
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getUser($username, $password) {
        try {
            $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getUserByUsername($username) {
        try {
            $sql = "SELECT count(*) as num FROM user WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAllAttendees() {
        try {
            $sql = "SELECT a.id, a.first_name, a.last_name, a.date_of_birth, s.name as specialty, a.email, a.phone
                    FROM attandee a
                    JOIN specialty s ON a.specialty_id = s.id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendeeDetails($id) {
        try {
            $sql = "SELECT a.id, a.first_name, a.last_name, a.date_of_birth, s.name as specialty, a.email, a.phone
                    FROM attandee a
                    JOIN specialty s ON a.specialty_id = s.id
                    WHERE a.id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>
