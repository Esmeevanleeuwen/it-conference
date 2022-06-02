<?php
require_once 'db/conn.php';

if(!$_GET['id']){
    echo 'error';
}else{
    // get id values
    $id = $_GET['id'];

    // call delete function
    $result = $crud->deleteAttendee($id);

    if ($result){
        header("Location: users.php");
    }else{
        echo '';
    }
}

?>