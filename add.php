<?php include 'inc/header.php'?>
<?php include 'lib/student.php'?>
<?php 
	$stu= new student();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$insertdata = $stu->insertStudent($name,$roll);
	}
?>
<?php
	if(isset($insertdata)){
		echo $insertdata;
	}
?>
<div class="mb-5">
	<a href="index.php" class="btn btn-success float-right">Back</a>
</div>
<div>
	
	<form action=""method="post">
		<div class='form-group'>
			<label for="name">Student name</label>
			<input type="text" name="name" id="name" class='form-control'>
		</div>
		<div class="form-group">
			<label for="roll">Roll No.</label>
			<input type="text" name="roll"class='form-control' id="roll">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="submit"name="submit">
		</div>
	</form>
</div>