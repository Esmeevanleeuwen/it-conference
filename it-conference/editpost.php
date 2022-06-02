<?php 

require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $date = $_POST['date'];
        $specialty = $_POST['specialty']; 
        $email = $_POST['email'];
        $phone = $_POST['phonenumber'];


        $result = $crud->editAttendee($id,$firstname, $lastname, $date, $specialty, $email, $phone );
        if($result){
            header("location: users.php");
        }else{
            echo 'erroe'; 
        }

    }else{
        echo 'error';
    }

?>