<?php
class crud {
    private $db;

    function __construct($conn) {
        $this->db = $conn;
    }

    public function getAttendees() {
        try {
            $sql = "SELECT a.id, a.first_name, a.last_name, a.date_of_birth, s.name as specialty, a.email, a.phone
                    FROM attandee a
                    JOIN specialty s ON a.specialty_id = s.id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendeeDetails($id) {
        try {
            $sql = "SELECT a.id, a.first_name, a.last_name, a.date_of_birth, a.specialty_id, s.name, a.email, a.phone
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

    public function getSpecialties() {
        try {
            $sql = "SELECT * FROM specialty";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteAttendee($id) {
        try {
            $sql = "DELETE FROM attandee WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>
