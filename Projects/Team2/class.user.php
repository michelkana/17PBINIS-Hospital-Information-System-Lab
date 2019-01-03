<?php

	class user{

		function db_check_login_credentials($login, $password){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");		
			$query = "SELECT user.user_id user_id, user.user_name user_name, department.department_name department_name FROM user, department " .
				"WHERE user.user_department_id = department.department_id " .
		             "AND user.user_login ='" . $login . "' " .
			     "AND user.user_password = '" . $password . "'";
			$result = mysql_query($query);
			if (!$result) {
				echo "Could not execute query: $query";
			}
			if ($row = mysql_fetch_assoc($result)) {
				$user_id = $row['user_id'];
				$user_name = $row['user_name'];
			    	$user_department_name = $row['department_name'];
				$user_department_id = $row['user_department_id'];
				$email = $row['email'];
				
			    	return array($user_id, $user_name, $user_department_name, $user_department_id,$email);
			}else{
			    	return array(null, null, null, null,null);
			}
			mysql_close(); 
		}
///////1. + 3. skupina
		function send_email($to,$text){
			mail($to, 'Systemová zpráva', $text, 'From: NIS');
		}


		function logout(){
			session_start();
 			session_destroy();
		}
	}
?>

