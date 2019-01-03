<?php
	include("class.user.php");
	include("class.administrator.php");
	include("class.doctor.php");
	include("class.patient.php");
	
	class distributor{
		// USER
		function request_check_login_credentials($login, $password){
			$current_user = new user();
			list($user_id, $user_name, $user_department_name, $user_department_id,$email) = $current_user->db_check_login_credentials($login, $password);
			$_SESSION['user_id'] = $user_id;
			$_SESSION['user_name'] = $user_name;
			$_SESSION['user_department_name'] = $user_department_name;
			$_SESSION['user_department_id'] = $user_department_id;
			$_SESSION['email'] = $email;
		}
		
		function send_mail($to,$text)
		{
			$user = new user();
			$success=$user->send_email($to,$text);
			return $success;
		}
		function logout(){
			$user = new user();
			$success=$user->logout();
			return $success;
		}
		// ADMIN
		function request_create_new_department($department_name){
			$current_admin = new administrator();
			$success = $current_admin->db_create_new_department($department_name);
			return $success;
		}
		function request_show_department_list(){
			$current_admin = new administrator();
			$department_list = $current_admin->db_show_department_list();      
			return $department_list;			
		}
		function request_create_new_doctor($doctor_name, $doctor_login, $doctor_password, $department_id){
			$current_admin = new administrator();
			$success = $current_admin->db_create_new_doctor($doctor_name, $doctor_login, $doctor_password, $department_id);
			return $success;
		}
		function request_show_doctor_list(){
			$current_admin = new administrator();
			$success = $current_admin->db_show_doctor_list();
			return $success;
		}
		// DOCTOR
		function request_register_new_patient($patient_name, $patient_age, $patient_personal_id, $patient_insurance){
			$current_doctor = new doctor();
			$success = $current_doctor->db_register_new_patient($patient_name, $patient_age, $patient_personal_id, $patient_insurance);
			return $success;
		}
		function request_show_patient_list(){
			$current_doctor = new doctor();
			$patient_list = $current_doctor->db_show_patient_list();
			return $patient_list;
		}
		function request_recieve_patient($patient_id, $doctor_id){
			$current_doctor = new doctor();
			$success = $current_doctor->db_recieve_patient($patient_id, $doctor_id);
			return $success;
		}
		function request_dismiss_patient($patient_personal_id){
			$current_doctor = new doctor();
			$success = $current_doctor->db_dismiss_patient($patient_personal_id);
			return $success;
		}
		function request_hospitalitation_history($patient_personal_id){
			$current_doctor = new doctor();
			$success = $current_doctor->db_show_hospitalitation_history($patient_personal_id);
			return $success;
		}
		function is_patient_in_hospital($patient_personal_id){
			$current_doctor = new doctor();
			$success = $current_doctor->db_is_patient_in_hospital($patient_personal_id);
			return $success;			
		}
		function request_new_record($pat_id, $text){
			$current_doctor = new doctor();
			$success = $current_doctor->db_new_record($pat_id, $text);
			return $success;
		}
		function request_record_history($pat_id){
			$current_doctor = new doctor();
			$success = $current_doctor->db_record_history($pat_id);
			return $success;
		}

		function request_show_unauthorized(){
			$current_doctor = new doctor();
			$unauthorized_list = $current_doctor->db_show_unauthorized_list();
			return $unauthorized_list;
		}
		function request_doc_availability($id_doc,$day,$month,$year){
			$current_doctor=new doctor();
			$availability=$current_doctor->get_doc_availability($id_doc,$day,$month,$year);
			return $availability;


		}
		function request_set_capacity($id,$cap_min,$cap_day,$cap_week,$cap_month){
			$current_doctor = new doctor();
			$authorized_list = $current_doctor->authorize($id,$cap_min,$cap_day,$cap_week,$cap_month);
			return $authorized_list;
		}
		function request_deny_access($id){
			$current_doctor = new doctor();
			$success = $current_doctor->deny_access($id);
			return $success;
		}
		function request_set_doc_availability($id_doc,$day,$month,$year,$time_in,$time_out){
			$current_doctor = new doctor();
			$success = $current_doctor->set_doc_availability($id_doc,$day,$month,$year,$time_in,$time_out);
			return $success;
		}
		function request_get_all_availabilities($id_doc){
			$current_doctor = new doctor();
			$availabilities = $current_doctor->get_all_availabilities($id_doc);
			return $availabilities;
		}
		function request_destroy_doc_availability($id_availability){
			$current_doctor = new doctor();
			$success = $current_doctor->destroy_doc_availability($id_availability);
			return $success;
		}
		function request_modify_doc_availability($id_availability,$time_in,$time_out){
			$current_doctor = new doctor();
			$success = $current_doctor->modify_doc_availability($id_availability,$time_in,$time_out);
			return $success;
		}
////////////////////////////////
		//PATIENT
		function request_registration($first_name,$last_name,$email,$phone,$age,$personal_id,$insurance){
			$patient=new patient();
			$success = $patient->save_new_patient($first_name,$last_name,$email,$phone,$age,$personal_id,$insurance);
			return $success;
		}
		function request_change_info($passwd,$user_id,$patient_id,$phone,$mail,$first_name,$last_name){
			$patient=new patient();
			$success=$patient->change_info($passwd,$user_id,$patient_id,$phone,$mail,$first_name,$last_name);
			return $success;
		}
		function request_get_auth_patient_info($id){
			$patient=new patient();
			$data=$patient->get_auth_patient_info($id);
			return $data;
		}
		function request_patient_info($id){
			$patient=new patient();
			$data=$patient->get_patient_info($id);
			return $data;
		}
		function request_save_auth($id,$data){
			$patient=new patient();
			$success=$patient->save_auth_patient($id,$data);
			return $success;
		}
		function request_view_reservations($id){
				$patient= new patient();
				$reservation_list = $patient->get_patient_reservations($id);
			return $reservation_list;
		}
		function request_destroy_reservation($id,$availability_id){
				$patient= new patient();
				$success= $patient->destroy_reservation($id,$availability_id);
			return $success;
		}
		function request_make_reservation($availability_id,$id_doctor,$id_patient,$year,$month,$day,$from,$to){
				$patient= new patient();
				$success= $patient->make_reservation($availability_id,$id_doctor,$id_patient,$year,$month,$day,$from,$to);
			return $success;}
		function request_get_access_capacities($id_user){
				$patient = new patient();
				$capacities = $patient->get_access_capacities($id_user);
				return $capacities;
		}
		function request_get_res_number_day($user_id,$day,$month,$year){
				$patient = new patient();
				$count = $patient->get_res_number_day($user_id,$day,$month,$year);
				return $count;
		}
		function request_get_res_number_week($user_id,$day,$month,$year){
				$patient = new patient();
				$count = $patient->get_res_number_week($user_id,$day,$month,$year);
				return $count;
		}
		function request_get_res_number_month($user_id,$month,$year){
				$patient = new patient();
				$count = $patient->get_res_number_month($user_id,$month,$year);
				return $count;
		}
	}
/////////////////////////////////
?>

