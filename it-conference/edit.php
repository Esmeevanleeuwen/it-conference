<?php
include './db/conn.php';
include './db/header.php';

if (!isset($_GET['id'])) {
    include 'db/errormessage.php';
    exit();
} else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);

    if (!$attendee) {
        include 'db/errormessage.php';
        exit();
    }
}
$specialties = $crud->getSpecialties();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <h1>Edit</h1>
    <p>Fill up the form with correct values.</p>
    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['id']; ?>">
        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="<?php echo $attendee['first_name']; ?>" required>
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="<?php echo $attendee['last_name']; ?>" required>
        </div>
        <div>
            <label for="date_of_birth">Date of Birth</label>
            <input type="text" name="date_of_birth" placeholder="YYYY-MM-DD" value="<?php echo $attendee['date_of_birth']; ?>" required>
        </div>
        <div>
            <label for="specialty">Specialty</label>
            <select name="specialty_id">
                <?php while($row = $specialties->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $attendee['specialty_id']) echo 'selected'; ?>>
                        <?php echo $row['name']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="email">Email Address</label>
            <input type="email" name="email" value="<?php echo $attendee['email']; ?>" required>
        </div>
        <div>
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" value="<?php echo $attendee['phone']; ?>" required>
        </div>
        <div>
            <input type="submit" value="Save Changes">
        </div>
    </form>
</body>
</html>
