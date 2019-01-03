<?php

	class administrator extends user{

		function db_create_new_department($department_name){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;"); 
	
			$query = "INSERT INTO department (department_name) VALUES ('$department_name')";
			$result = mysql_query($query);
			if (!$result) {
				echo "Could not execute query: $query";
				return false;
			}else{
				return true;
			}	    
			mysql_close(); 
		}
		function db_show_department_list(){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");			
			
			$query = "SELECT * FROM department";
			$result = mysql_query($query);
			if (!$result) {
				echo "Could not execute query: $query";
				return false;
			}else{
				return $result;
			}	    
			mysql_close();
		}
		function db_create_new_doctor($doctor_name, $doctor_login, $doctor_password, $department_id){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8");
			
			$query = "INSERT INTO user (user_name, user_login, user_password, user_department_id) VALUES
				('$doctor_name','$doctor_login','$doctor_password','$department_id')";
			$result = mysql_query($query);
			if (!$result) {
				echo "Could not execute query: $query";
				return false;
			}else{
				return true;
			}	    
			mysql_close();
		}
		function db_show_doctor_list(){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");			
			
			$query = "SELECT user.user_id,user.user_name FROM user WHERE user.user_name!='administrator' AND user.user_department_id!=3";
			$result = mysql_query($query);
			if (!$result) {
				echo "Could not execute query: $query";
				return false;
			}else{
				return $result;
			}	    
			mysql_close(); 
		}	
	}
?>

