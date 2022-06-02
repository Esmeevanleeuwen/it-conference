<?php 
require_once 'db/conn.php';
include 'db/header.php';

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $date = $_POST['date'];
    $specialty = $_POST['specialty']; 
    $email = $_POST['email'];
    $phone = $_POST['phonenumber'];
 

$isSuccess = $crud->insert($firstname, $lastname, $date, $specialty, $email, $phone);
$specialtyName = $crud->getSpecialties($specialty);

if($isSuccess){

    echo 'yoo';
}
else{

}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <br>
    <div class="container">
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'] . ' ' . $_POST['lastname'];?>
            </h5>
            <p class="card-text">
                date of birth: <?php echo $_POST['date'] ?>
            </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">specialty: <?php echo $_POST['specialty'] ?></li>
            <li class="list-group-item">email: <?php echo $_POST['email'] ?></li>
            <li class="list-group-item">phone: <?php echo $_POST['phonenumber'] ?></li> 
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
        </div>
    </div>
</body>
</html>