<?php

	class doctor extends user{
		
		function db_register_new_patient($patient_name, $patient_age, $patient_personal_id, $patient_insurance){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$query = "INSERT INTO patient (name, age, personal_id, insurance) VALUES ('$patient_name','$patient_age','$patient_personal_id','$patient_insurance')";
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: /n $query";
			    return false;
			}else{
			    return true;
			}	    
			mysql_close();
		}
		function db_recieve_patient($patient_id, $doctor_id){
			include 'connection.php';
			$date = date('Y-m-d');
			mysql_query("SET CHARACTER SET utf8;");
			$q = "SELECT user_department_id FROM user WHERE user_id='$doctor_id'";
			$r = mysql_query($q);
			while ($row = mysql_fetch_assoc($r)){
				$u_dep_id = $row['user_department_id'];
			}
			$query = "INSERT INTO hospitalitation_record (patient_id, date_in, date_out, department_id, doctor_id)
			        VALUES ('$patient_id','$date',null,'$u_dep_id','$doctor_id')";
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: $query";
			    return false;
			}else{
			    return true;
			}	    
			mysql_close(); 
		}
		
		function db_dismiss_patient($personal_id){
			include 'connection.php';
			$date = date('Y-m-d');
			mysql_query("SET CHARACTER SET utf8;");
			$query = "UPDATE hospitalitation_record as r
					SET r.date_out='$date'
					WHERE patient_id='$personal_id' AND r.date_in is not null AND r.date_out is null";
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: $query";
			    return false;
			}else{
			    return $result;
			}	    
			mysql_close(); 
		}
		
		function db_show_hospitalitation_history($patient_id){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$query = "SELECT * FROM hospitalitation_record WHERE patient_id = '$patient_id' ORDER BY date_in" ;
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: $query";
			    return false;
			}else{
			    return $result;
			}	    
			mysql_close(); 
		}
		
		function db_is_patient_in_hospital($patient_personal_id){
			include 'connection.php';
			
			mysql_query("SET CHARACTER SET utf8;");
			$query = "SELECT count(*) FROM hospitalitation_record WHERE patient_id='$patient_personal_id' AND date_in is not null AND date_out is null";
			$result = mysql_query($query);
			while ($row = mysql_fetch_assoc($result)){
				$result2 = $row['count(*)'];
			}
			if ($result2 == 0) {
			    return false;
			}else{
			    return true;		    
			}	    
			mysql_close(); 
		}
		function db_new_record($pat_id, $text){
			include 'connection.php';
			$date = date('Y-m-d');
			mysql_query("SET CHARACTER SET utf8;");
			$query = "INSERT INTO record (patient_id, date, text) VALUES ('$pat_id','$date','$text')";
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: /n $query";
			    return false;
			}else{
			    return true;
			}	    
			mysql_close();
		}
		function db_record_history($pat_id){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$query = "Select * FROM record WHERE patient_id='$pat_id' ORDER BY date";
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: /n $query";
			    return false;
			}else{
			    return $result;
			}	    
			mysql_close();
		}
/////// 2.skupina modul KALENDÁŘ		
		function get_all_availabilities($id_doc){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$query = "SELECT * FROM availability WHERE id_doctor= $id_doc";
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: /n $query";
			    return false;
			}else{

			    return $result;
			}
			mysql_close();
		}
		function get_doc_availability($id_doc,$day,$month,$year){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$query = "SELECT * FROM availability WHERE id_doctor= $id_doc AND day = $day AND month = $month AND year=$year";
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: /n $query";
			    return false;
			}else{

			    return $result;
			}
			mysql_close();
		}
		function set_doc_availability($id_doc,$day,$month,$year,$time_in,$time_out){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");

			$query = "INSERT INTO availability(id_doctor,year,time_in,time_out,month,day,available) VALUES ('$id_doc','$year','$time_in','$time_out','$month','$day',0)";
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: /n $query";
			    return false;
			}else{

			    return true;
			}
			mysql_close();
		}
		function destroy_doc_availability($id_availability){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");

			$query = "DELETE from availability WHERE id=$id_availability";
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: /n $query";
			    return false;
			}else{

			    return true;
			}
			mysql_close();
		}
		function modify_doc_availability($id_availability,$time_in,$time_out){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");

			$query = "UPDATE availability SET time_in='$time_in',time_out='$time_out' WHERE id='$id_availability'";
			$result = mysql_query($query);
			if (!$result) {
			    //echo "Could not execute query: /n $query";
			    echo mysql_error();
			    return false;
			}else{

			    return true;
			}
			mysql_close();
		}
///////// 1.skupina modul REGISTRACE
		function authorize($id,$cap_min,$cap_day,$cap_week,$cap_month){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$query = "UPDATE patient SET authorized = 1,minutes=$cap_min,daily=$cap_day,weekly=$cap_week,monthly=$cap_month WHERE id=$id";
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: /n $query";
			    return false;
			}else{
			    return true;
			}
			mysql_close();

		}
		function deny_access($id){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");

			$query = "DELETE from patient where id=$id";
			$result = mysql_query($query);
			if (!$result) {
			    //echo "Could not execute query: /n $query";
			    echo mysql_error();
			    return false;
			}else{

			    return true;
			}
			mysql_close();
		}
		function db_show_unauthorized_list(){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$query = "SELECT patient.id,patient.name, patient.age, patient.personal_id,patient.email,patient.phone,patient.insurance FROM patient WHERE patient.authorized=0";
			$result = mysql_query($query);
			if (!$result) {
			    echo "Could not execute query: $query";
			    return false;
			}else{
			    return $result;
			}	    
			mysql_close(); 
		}
		function db_show_patient_list(){
			include 'connection.php';
			mysql_query("SET CHARACTER SET utf8;");
			$query = "SELECT patient.name, patient.age, patient.personal_id FROM patient WHERE patient.authorized=1";
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

