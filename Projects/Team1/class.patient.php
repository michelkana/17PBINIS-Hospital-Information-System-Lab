<?php
class patient{
//////1.skupina - modul REGISTRACE
	function save_new_patient($first_name,$last_name,$email,$phone,$age,$personal_id,$insurance){
		include 'connection.php';
		mysql_query("SET CHARACTER SET utf8;"); 
			$name=$first_name." ".$last_name;
			$query = "INSERT INTO patient(name,age,email,phone,personal_id,insurance) 
			VALUES ('$name','$age','$email','$phone','$personal_id','$insurance')";
			$result = mysql_query($query);
			if (!$result) {
				echo "Could not execute query: $query";
				return false;
			}else{
				return true;
			}	    
			mysql_close();
	}
	function get_patient_info($id){
		include 'connection.php';
		mysql_query("SET CHARACTER SET utf8;"); 
			
			$query="SELECT patient.email,patient.personal_id,patient.name FROM patient WHERE id=$id";
			$result = mysql_query($query);
			if (!$result) {
				echo "Could not execute query: $query";
				return false;
			}else{
				return $result;
			}	    
			mysql_close();
	}
	function get_auth_patient_info($id){
		include 'connection.php';
		mysql_query("SET CHARACTER SET utf8;"); 
			
			$query="SELECT user.user_password,user.patient_id,patient.email,patient.personal_id,patient.name,patient.phone FROM patient INNER JOIN user ON patient.id=user.patient_id WHERE user.user_id=$id";
			$result = mysql_query($query);
			$result= mysql_fetch_assoc($result);
			if (!$result) {
				echo "Could not execute query: $query";
				return false;
			}else{
				return $result;
			}	    
			mysql_close();
	}
	function save_auth_patient($patient_id,$patient_data){
		$distrib=new distributor();
		include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$data=mysql_fetch_assoc($patient_data);
			$user_name=$data['name'];
			$login=$data['email'];
			$password=$data['personal_id'];
			$query = "INSERT INTO user(user_name,user_login,user_password,user_department_id,patient_id,email) 
			VALUES ('$user_name','$login','$password','3','$patient_id','$login')";
			$result = mysql_query($query);
			if (!$result) {
				//echo "Could not execute query: $query";
				echo mysql_error();
				return false;
			}else{
				$distrib->send_mail($data['email'],'Heslo: '.$password.'  Login: '.$login);
				return true;
			}	    
			mysql_close();
	}
function change_info($passwd,$user_id,$patient_id,$phone,$mail,$first_name,$last_name){
		include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$name=$first_name." ".$last_name;
			$query = "UPDATE user SET user_name='$name',user_password='$passwd',email='$mail' WHERE user_id=$user_id";
			$result = mysql_query($query);
			$query = "UPDATE patient SET phone='$phone',email='$mail',name='$name' WHERE id='$patient_id'";
			$result = mysql_query($query);
			mysql_close();
	}
function get_access_capacities($id_user){
		include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$query = "SELECT patient.minutes,patient.daily,patient.weekly,patient.monthly FROM patient INNER JOIN user on patient.id = user.patient_id WHERE user.user_id=$id_user";
			$result = mysql_query($query);
			if (!$result) {
				//echo "Could not execute query: $query";
				echo mysql_error();
				return false;
			}else{
				return $result;
			}

			mysql_close();
}
///////3.skupina modul REZERVACE
function get_patient_reservations($patient_id){
		include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$query = "SELECT user.user_name,reservation.* FROM user INNER JOIN reservation ON user.user_id=reservation.id_doctor WHERE reservation.id_patient=$patient_id";
			$result = mysql_query($query);
			if (!$result) {
				//echo "Could not execute query: $query";
				echo mysql_error();
				return false;
			}else{
				return $result;
			}	    
			mysql_close();
	}
	
function destroy_reservation($reservation_id,$availability_id){
		include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$query_update="UPDATE availability SET available=0 WHERE id=$availability_id";
			$result2 = mysql_query($query_update);
			$query = "DELETE FROM reservation WHERE id=$reservation_id";
			$result = mysql_query($query);
			if (!$result&&!$result2) {
				//echo "Could not execute query: $query";
				echo mysql_error();
				return false;
			}else{
				return true;
			}

			mysql_close();
	}

	function get_res_number_day($user_id,$day,$month,$year){
		include 'connection.php';
		mysql_query("SET CHARACTER SET utf8;");
		$query="SELECT COUNT(*) FROM reservation WHERE id_patient=$user_id AND day=$day AND month=$month AND year=$year";
		$result=mysql_result(mysql_query($query),0);
		return $result;
	}
	function get_res_number_week($user_id,$day,$month,$year){
		include 'connection.php';
		mysql_query("SET CHARACTER SET utf8;");
		$week = date("W", strtotime($year.'-'.$month.'-'.$day));
		$query="SELECT COUNT(*) FROM reservation WHERE id_patient=$user_id AND week=$week";
		$result=mysql_result(mysql_query($query),0);
		return $result;
	}
	function get_res_number_month($user_id,$month,$year){
		include 'connection.php';
		mysql_query("SET CHARACTER SET utf8;");
		$query="SELECT COUNT(*) FROM reservation WHERE id_patient=$user_id AND month=$month AND year=$year";
		$result=mysql_result(mysql_query($query),0);
		return $result;
	}
	function make_reservation($availability_id,$id_patient,$id_doctor,$year,$month,$day,$from,$to){
		include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$week = date("W", strtotime($year.'-'.$month.'-'.$day));
			$query = "UPDATE availability SET available=1 WHERE id=$availability_id";
			$query_insert = "INSERT INTO reservation(id_patient,id_doctor,year,month,day,time_in,time_out,availability_id,week,state) 
			VALUES ('$id_patient','$id_doctor','$year','$month','$day','$from','$to','$availability_id',$week,0)";
			$result = mysql_query($query); 
			$result_insert = mysql_query($query_insert);
			if (!$result_insert&&!$result) {
				//echo "Could not execute query: $query";
				echo mysql_error();
				return false;
			}else{
				return true;
			}
			mysql_close();
	}
////////////////////////////////	
}





?>