<?php
  include_once ('/Database.php');
?>

<?php

	/**
	 * 
	 */
	class student
	{
		private $db;
		
		public function __construct()
		{
			$this->db = new Database();
		}
		public function getStudents(){
			$query ="SELECT * FROM tbl_student";
			$result = $this->db->select($query);
			return $result;
		}
		public function insertStudent($name,$roll){
			$name= mysqli_real_escape_string($this->db->link,$name);
			$roll= mysqli_real_escape_string($this->db->link,$roll);
			if(empty($name)||empty($roll)){
				$msg ="<div class='alert alert-danger'><strong>Error!</strong>Field must not be empty</div>";
				return $msg;
			}
			else{
					$stu_query = "INSERT INTO tbl_student(name,roll) VALUES('$name','$roll')";
					$stu_insert=$this->db->insert($stu_query);
					$att_query = "INSERT INTO tbl_attendance(roll) VALUES('$roll')";
					$stu_insert=$this->db->insert($att_query);
					if($stu_insert){ 
						$msg ="<div class='alert alert-success'><strong>success!</strong>student data inserted successfully</div>";
						return $msg;
					}
					else{
						$msg ="<div class='alert alert-danger'><strong>success!</strong>student data not inserted</div>";
						return $msg;

					}
				}
		}

	
	public function insertAttendance($cur_date,$attend=array())
	{
		$query= "SELECT DISTINCT att_time FROM tbl_attendance";
		$getdata=$this->db->select($query);
		while($result=$getdata->fetch_assoc()){
			$db_date=$result['att_time'];
			if($cur_date==$db_date){
				$msg ="<div class='alert alert-danger'><strong>success!</strong>Attendance already taken today !</div>";
				return $msg;

			}
		}
		foreach ($attend as $atn_key => $atn_value) {
			if($atn_value=="present"){
				$stu_query="INSERT INTO tbl_attendance(roll,attend,att_time)VALUES('$atn_key','present',now())";
				$data_insert=$this->db->insert($stu_query);
			}
			elseif ($atn_value=="absent") {
				$stu_query="INSERT INTO tbl_attendance(roll,attend,att_time)VALUES('$atn_key','absent',now())";
				$data_insert=$this->db->insert($stu_query);
			}

		}
		if($data_insert){ 
			$msg ="<div class='alert alert-success'><strong>success!</strong>Attendance data inserted successfully</div>";
				return $msg;
			}
		else{
			$msg ="<div class='alert alert-danger'><strong>success!</strong>Attendnace data not inserted</div>";
				return $msg;

			}

	}
	public function getDateList(){
		$query= "SELECT DISTINCT att_time FROM tbl_attendance";
		$result=$this->db->select($query);
		return $result;
	}




}

?>