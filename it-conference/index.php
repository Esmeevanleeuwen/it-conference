<?php

include 'db/conn.php';
$results = $crud->getSpecialties();

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
	<?php include './db/header.php';
	
 

	?>
<form action="succes.php" method="post">
		<div class="container">
			
			<div class="row">
				<div class="">
					<h1>Registration</h1>
					<p>Fill up the form with correct values.</p>
					<hr class="mb-3">
					<label for="firstname"><b>First Name</b></label>
					<input class="form-control" id="firstname" type="text" name="firstname" required>

					<label for="lastname"><b>Last Name</b></label>
					<input class="form-control" id="lastname"  type="text" name="lastname" required>
					
					<label class="control-label" for="date"><b>Date</b></label>
       				<input class="form-control" id="date" name="date" placeholder="YY/MM/DD" type="text"/>
					
				   <label for="email"><b>vakgebied</b></label>
					<select class="form-select" id="specialty" name="specialty" aria-label="Default select example">
					<option selected>Choose field of expertise</option>
						<?php while ($r = $results->fetch(PDO::FETCH_ASSOC)){?>
							<option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
						<?php }?>
					</select>

					<label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>

					<label for="phonenumber"><b>Phone Number</b></label>
					<input class="form-control" id="phonenumber"  type="text" name="phonenumber" required>
 	
					<label for="custom-file-label" for="avatar" class="form-label">Choose file</label>
					<input type="file" accept="image/*" class="form-control" id="avatar" name="avatar">


					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="register" name="submit" value="Sign Up">
				</div>
			</div>
		</div>
	</form>
</body><!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
</html>