<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include './db/header.php';
          include './db/conn.php';

          $result = $crud->getAttendees(); 
    ?>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">naam</th>
                <th scope="col">achternaam</th>
                <th scope="col">date</th>
                <th scope="col">specialty</th>
                <th scope="col">mail</th>
                <th scope="col">telefoon</th>
                <th scope="col">view</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                    <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
                        <td><?php echo $r['id'] ?></td>
                        <td><?php echo $r['firstname'] ?></td>
                        <td><?php echo $r['lastname'] ?></td>
                        <td><?php echo $r['date'] ?></td>
                        <td><?php echo $r['name'] ?></td>
                        <td><?php echo $r['email'] ?></td>
                        <td><?php echo $r['phone'] ?></td>  
                        <td>
                            <a class="btn btn-dark" href="view.php?id=<?php echo $r['id'] ?>">view</a>
                        </td>
                        <td>
                            <a class="btn btn-dark" href="edit.php?id=<?php echo $r['id'] ?>">edit</a>
                        </td>
                        <td>
                        <a onclick="return confirm('are you shure you want to delete this record')" class="btn btn-dark" href="delete.php?id=<?php echo $r['id'] ?>">delete</a>

                        </td>
                        
                  
            </tr>
            <?php } ?>   
            </tbody>
        </table>
    </div>
    
</body>
</html>