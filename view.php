	<?php include 'inc/header.php'?>
	<?php include 'lib/student.php'?>

		<div class="">
			<a href="add.php" class="btn btn-success">Add Student</a>
			<a href="index.php"class="btn btn-success" style="float: right;">Take Attendance</a>
		</div>
		<div class="mt-5">
			<form action=""method="post">
			<table class="table table-striped">
				<tr>
					<th width="30%">Serial</th>
					<th width="50%">Attendance Date</th>
					<th width="20%">Action</th>
				</tr>
			<?php 
				$stu= new student();

				$get_date = $stu->getDateList();
				if($get_date){
					$i=0;
					while($value= $get_date->fetch_assoc()){
						$i++;
				
				
			?>
				<tr>
					<td><?php echo $i;?></td> 
					<td><?php echo $value['att_time']?></td>
					<td>
						<a class="btn btn-primary"  href="student_view.php?dt=<?php echo $value['att_time']; ?>">View</a>
					</td>
				</tr>
		<?php } } ?>
				
			</table>
		</form>
		</div>
		
	<?php include 'inc/footer.php'?> 