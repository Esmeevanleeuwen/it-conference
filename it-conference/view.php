<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
    include './db/header.php';
    include './db/conn.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
    }else{
        echo 'shit probeer opnieuw';
    }
?>
<body>
<div class="container">
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $result['firstname'] . ' ' . $result['lastname'];?>
            </h5>
            <p class="card-text">
                date of birth: <?php echo $result['date'] ?>
            </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">specialty: <?php echo $result['name'] ?></li>
            <li class="list-group-item">email: <?php echo $result['email'] ?></li>
            <li class="list-group-item">phone: <?php echo $result['phone'] ?></li> 
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
        </div>
    </div>
</body>
</html>