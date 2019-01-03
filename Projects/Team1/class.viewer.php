<?php
	session_start();
	
	include("class.distributor.php");
	
	class viewer{
		function display_login_form(){
			echo "
				<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
				<html>
					<head>
						<title>Prihlašovací formulár</title>
						<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"> 
					</head>
					<body>
						<form method=\"post\" action=\"class.viewer.php?command_id=1\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
								<tr>
									<td>Login:</td>
									<td><input type=\"text\" name=\"log\" size=\"20\"></td>
								</tr>
								<tr>
									<td>Heslo:</td>
									<td><input type=\"password\" name=\"pwd\" size=\"20\"></td>
								</tr>
								<tr>
									<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Odeslat\"></td>
								</tr>
							</table>
						</form>
						<a href=\"class.viewer.php?form_id=7\">Zaregistrovat se!</a>
					</body>
				</html> 		
			";
		}		

		function display_registration_form(){
			echo "
				
				<html>
					<head>
						<title>Registrační formulář</title>
						<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"> 
					</head>
					<body>
						<form method=\"post\" action=\"class.viewer.php?command_id=15\">
							<h3>Registrace nového pacienta</h3>
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
								<tr>
									<td>Jméno:</td>
									<td><input type=\"text\" name=\"first_name\" size=\"20\"></td>
								</tr>
								<tr>
									<td>Přijmení:</td>
									<td><input type=\"text\" name=\"last_name\" size=\"20\"></td>
								</tr>
								<tr>
									<td>Email:</td>
									<td><input type=\"text\" name=\"email\" size=\"20\"></td>
								</tr>
								<tr>
									<td>Telefon:</td>
									<td><input type=\"text\" name=\"phone\" size=\"20\"></td>
								</tr>
								<tr>
									<td>Věk:</td>
									<td><input type=\"text\" name=\"age\" size=\"2\"></td>
								</tr>
								<tr>
									<td>Rodné číslo:</td>
									<td><input type=\"text\" name=\"personal_id\" size=\"20\"></td>
								</tr>
								<tr>
									<td>Pojišťovna: </td>
									<td><select name=\"insurance\">
										<option value=\"VZP\">VZP</option>
										<option value=\"ZPMV\">ZPMV</option>
										<option value=\"obe\">obe</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Registrovat\"></td>
								</tr>
							</table>
						</form>
					</body>
				</html> 		
			";

		}
		function display_homepage($user_name, $user_department, $message){
			
			if (!$user_name){
				$menu = " ";
				$message=" ";
			}else{
				if ($user_department == 'admin'){
					$menu = "<a href=\"class.viewer.php?form_id=3\">Nastavit nové nemocniční oddělení</a> | "
					      . "<a href=\"class.viewer.php?command_id=5\">Zobrazit seznam nemocniční oddělení</a> | "
					      . "<a href=\"class.viewer.php?form_id=4\">Nastavit nového lékaře</a> | "
					      . "<a href=\"class.viewer.php?command_id=6\">Zobrazit seznam lékařů</a> | "
					      . "<a href=\"class.viewer.php?command_id=14\">Kalendář</a> | "									///zobrazení kalendáře
					      . "<a href=\"class.viewer.php?command_id=17\">Odhlásit</a> <br><br>";
				}
				elseif($user_department == 'patient'){
					$menu = "<a href=\"class.viewer.php?command_id=14\">Rezervovat</a> | "									///zobrazení kalendáře
					      . "<a href=\"class.viewer.php?command_id=19\">Zobrazit rezervace</a> | "
					      . "<a href=\"class.viewer.php?form_id=14\">Změnit mé informace</a> | "
					      . "<a href=\"class.viewer.php?form_id=15\">Zobrazit rezervační kapacity</a> | "
					      . "<a href=\"class.viewer.php?command_id=17\">Odhlásit</a> <br><br>";
				}
				else{
					$menu = "<a href=\"class.viewer.php?form_id=5\">Zaregistrovat nového pacienta</a> | "
					      . "<a href=\"class.viewer.php?command_id=7\">Zobrazit seznam pacientů</a> | "
					      . "<a href=\"class.viewer.php?form_id=8\">Zobrazit čekající na autorizaci</a> | "
					      . "<a href=\"class.viewer.php?form_id=11\">Přidat dostupnost na ordinaci</a> | "
					      . "<a href=\"class.viewer.php?form_id=12\">Dostupnost na ordinaci</a> | "
					      . "<a href=\"class.viewer.php?command_id=17\">Odhlásit</a> <br><br>";
				}
			}
			
			echo "				
				<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
				<html>
					<head>
						<title>Úvodní stránka</title>
						<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"> 
					</head>
					<body>
						"
						. $menu  
						. $message . "
					</body>
				</html> 		
			";	
				
		}		
		function display_new_department_form(){
			echo "
				<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
				<html>
					<head>
						<title>Formulář pro nastaveni nové nemocniční oddělení</title>
						<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"> 
					</head>
					<body>
						<form method=\"post\" action=\"class.viewer.php?command_id=2\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
								<tr>
									<td>Jméno nové nemocniční oddělení: </td>
									<td><input type=\"text\" name=\"new_department_name\" size=\"20\"></td>
								</tr>
								<tr>
									<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Odeslat\"></td>
								</tr>
							</table>
						</form>
					</body>
				</html> 		
			";
		}
		function display_departments_list_page($departments){
			$html = "
				<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
					<tr>
						<td><b>Jméno nemocniční oddělení</b></td>
					</tr>		
							";
			while ($row = mysql_fetch_assoc($departments)) {
				$html = $html . "
						<tr>
							<td>" . $row['department_name'] . "</td>
						</tr>
						";
			}
			$html = $html . 
	    					"
	    					</table>
	    					";
			return $html;
		}
		function display_new_doctor_form($departments){			
			?>
				<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
				<html>
					<head>
						<title>Formulář pro založení nového účtu lékaře</title>
						<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
					</head>
					<body>
						<form method="post" action="class.viewer.php?command_id=3">
							<table border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td>Jméno lékaře: </td>
									<td><input type="text" name="new_doctor_name" size="20"></td>
								</tr>
								<tr>
									<td>Login: </td>
									<td><input type="text" name="new_doctor_login" size="20"></td>
								</tr>
								<tr>
									<td>Heslo: </td>
									<td><input type="text" name="new_doctor_password" size="20"></td>
								</tr>
								<tr>
									<td>Oddělení: </td>
									<td><select name="new_doctor_department">
									<?									
									while ($row = mysql_fetch_array($departments)) {
										$name = $row['department_name'];
										$id = $row['department_id'];
									echo"<option value=\"$id\">$name</option>";
									}
									?>	
									</select></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" name="submit" value="Odeslat"></td>
								</tr>
							</table>
						</form>
					</body>
				</html> 		
			<?php
		}
		
		function display_doctors_list_page($doctors){
			$html = "
								<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
									<tr>
										<td><b>Jmena doktoru</b></td>
									</tr>		
							";
			while ($row = mysql_fetch_assoc($doctors)) {
				$html = $html . 
	    					"
									<tr>
										<td>" . $row['user_name'] . "</td>
									</tr>
								";
			}
			$html = $html . 
	    					"
	    					</table>
	    					";
			return $html;
		}
		function display_doctors_calendar($doctors,$day,$month,$year){
			$html = "
								<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
									<tr>
										<td><b>Vybrat doktora</b></td>
									</tr>		
							";
			while ($row = mysql_fetch_assoc($doctors)) {
				$html = $html . 
	    					"
									<tr>
										<td>" . $row['user_name'] . "</td>
										<td>
										<form method=\"post\" action=\"class.viewer.php?command_id=18\">
										<input type=\"submit\" name=\"submit\" value=\"Vybrat\">
										<input type=\"hidden\" name=\"id\" value=" . $row['user_id'] . ">
										<input type=\"hidden\" name=\"day\" value=" . $day . ">
										<input type=\"hidden\" name=\"month\" value=" . $month . ">
										<input type=\"hidden\" name=\"year\" value=" . $year . ">
										</form>
									</td>
									</tr>
								";
			}
			$html = $html . 
	    					"
	    					</table>
	    					";
			return $html;
		}
		function display_new_patient_registration_form(){			
		
				$html="<html>
					<head>
						<title>Registrační formulář</title>
						<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"> 
					</head>
					<body>
						<form method=\"post\" action=\"class.viewer.php?command_id=15\">
							<h3>Registrace nového pacienta</h3>
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
								<tr>
									<td>Jméno:</td>
									<td><input type=\"text\" name=\"first_name\" size=\"20\"></td>
								</tr>
								<tr>
									<td>Přijmení:</td>
									<td><input type=\"text\" name=\"last_name\" size=\"20\"></td>
								</tr>
								<tr>
									<td>Email:</td>
									<td><input type=\"text\" name=\"email\" size=\"20\"></td>
								</tr>
								<tr>
									<td>Telefon:</td>
									<td><input type=\"text\" name=\"phone\" size=\"20\"></td>
								</tr>
								<tr>
									<td>Věk:</td>
									<td><input type=\"text\" name=\"age\" size=\"2\"></td>
								</tr>
								<tr>
									<td>Rodné číslo:</td>
									<td><input type=\"text\" name=\"personal_id\" size=\"20\"></td>
								</tr>
								<tr>
									<td>Pojišťovna: </td>
									<td><select name=\"insurance\">
										<option value=\"VZP\">VZP</option>
										<option value=\"ZPMV\">ZPMV</option>
										<option value=\"obe\">obe</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Registrovat\"></td>
								</tr>
							</table>
						</form>
					</body>
				</html>";
				return $html;		
		}
		function display_patient_list_page($patients){
			$html = "
				<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
					<tr>
						<td> Jmeno </td><td> Vek </td><td> Rodne cislo </td><td> Vyber </td>
					</tr>";					
						while ($row = mysql_fetch_assoc($patients)) {
							$html = $html . "
						<tr>
							<td>" . $row['name'] . "</td>
							<td>" . $row['age'] . "</td>
							<td>" . $row['personal_id'] . "</td>
							<td>
								<form method=\"post\" action=\"class.viewer.php?command_id=8\">
								<input type=\"submit\" name=\"submit\" value=\"Vybrat\">
								<input type=\"hidden\" name=\"pat_name\" value=" . $row['name'] . ">
								<input type=\"hidden\" name=\"patient_id\" value=" . $row['personal_id'] . ">
								</form>
							</td>
						</tr>";
						
					}
				$html = $html . 
	    					"
	    					</table>
	    					";
			return $html;
			
		}



		// funkce na zobrazení kalendáře
	function display_calendar($year,$month){
		echo "<meta charset=\"UTF-8\">";
		$first_day = mktime(0,0,0,$month, 1, $year);
     	$title = date('n', $first_day);
      	$day_of_week = date('D', $first_day);
      	$days_in_month = date('t', $first_day);
      
      
      // ceske mesice
      $cz_months = array( 
                          1 => "Leden",
                               "Únor",
                               "Březen",
                               "Duben",
                               "Květen",
                               "Červen",
                               "Červenec",
                               "Srpen",
                               "Září",
                               "Říjen",
                               "Listopad",
                               "Prosinec"
                      );
      
      $prevY = $nextY = $year;
      $prevM = $nextM = $month;
      
      // nastaveni odkazu pro predchozi a nasledujici mesic / rok
      if ($month - 1 < 1) { $prevM = 12; $prevY--;} else {$prevM = $month - 1;}; 
      if ($month + 1 > 12){ $nextM = 1; $nextY++;} else {$nextM = $month + 1;};  
      
      $prev = "<a href='?command_id=14&month=".($prevM)."&year=".($prevY)."'><<</a>";
      $next = "<a href='?command_id=14&month=".($nextM)."&year=".($nextY)."'>>></a>";
      
      // timto si vyplnime v kalendari prazdne bunky, 1 den v mesici a prvniho neni vzdy pondeli ...
      $emptyTD = array("Mon" => 0, "Tue" => 1, "Wed" => 2, "Thu" => 3, "Fri" => 4, "Sat" => 5, "Sun" => 6);
      $blank = $emptyTD[$day_of_week];
      
      // vykresleni kalendare
      $html="<table border=1 align=center id=calendar>
     	<tr><th>$prev</th><th colspan=5> ".$cz_months[$title]." $year</th><th>$next</th></tr>
      <tr><td width=42>Po</td><td width=42>Út</td><td width=42>St</td><td width=42>Čt</td><td width=42>Pá</td><td width=42>So</td><td width=42>Ne</td></tr>";
      
      $day_count = 1;
      
      $html=$html."<tr>";
      
      // zde prave zjistime pocet prazdnych bunek pred 1 dnem v mesici 
      while ( $blank > 0 )
      {
        $html = $html."<td></td>";
        $blank--;
        $day_count++;
      }
      
      $day_num = 1;
      
      
      // veskere dny v kalendari
      while ($day_num <= $days_in_month)
      {
          
          if (isset($selected_days[$year][$month][$day_num]))
         {
         
           if($day_num == $day)
           {
             $html = $html."<td class='today'><b><a href='?year=$year&month=$month&day=$day_num'>$day_num</a></b></td>";
             
           }
           else
           {
             $html = $html."<td class='days'><a href='?year=$year&month=$month&day=$day_num'>$day_num</a></td>";
           }
         
         }
         else
         {
             $html = $html."<td class='days'><a href='?year=$year&month=$month&day=$day_num&form_id=10'>$day_num</a></td>";
         }   
         
         
     
     
       $day_num++;
       $day_count++;
       
       if ($day_count > 7)
       {
         $html=$html."</tr><tr>";
         $day_count = 1;
       }
     }
     
     
     // timto zajistime spravne zobrazeni kalendare a dopocitani prazdnych bunek
     while ($day_count >1 && $day_count <=7)
     {
       $html=$html."<td> </td>";
       $day_count++;
     }
     
     $html=$html."</tr></table>";
     return $html;
		}



		function patient_profile($name, $pat_per_id, $form){
			$html = "
				
					<b>Jmeno: </b> ". $name."<br>
					<b>Rodne cislo: </b> ". $pat_per_id ."<br>
					<table border=\"3\" cellpadding=\"2\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\">Hospitalizovan</td><td colspan=\"2\">Zaznamy</td>
						</tr>
						<tr>
							". $form ."
							<td><form method=\"post\" action=\"class.viewer.php?command_id=9\">
								<input type=\"submit\" name=\"record_history\" value=\"Historie zaznamu\" size=\"20\">
								<input type=\"hidden\" name=\"pat_name\" value=\"$name\">
								<input type=\"hidden\" name=\"patient_id\" value=\"$pat_per_id\">
							</form>
							</td>
							<td><form method=\"post\" action=\"class.viewer.php?form_id=6\">
								<input type=\"submit\" name=\"new_record\" value=\"Novy Zaznam\" size=\"20\">
								<input type=\"hidden\" name=\"pat_name\" value=\"$name\">
								<input type=\"hidden\" name=\"patient_id\" value=\"$pat_per_id\">
							</form>
							</td>
						</tr>
					
					</table>
				</form>
			";
			return $html;
		}
		function display_new_form($name, $pat_per_id){
			echo "
				<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
				<html>
				<head>
					<title>Formulář pro založení nového zaznamu</title>
					<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\"> 
				</head>
				<body>
					Jmeno: <b>" .$name. "</b>  <br>
					Rodne Cislo: <b>". $pat_per_id ."</b>
					<form method=\"post\" action=\"class.viewer.php?command_id=10\">
					<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
					
					<tr>
						<td>Zaznam: </td>
						<td><textarea name=\"zaznam\" rows=\"5\" cols=\"62\"></textarea></td>
					</tr>
						<tr>
					<td colspan=\"2\">
					<input type=\"hidden\" name=\"pati_id\" value=\"$pat_per_id\">
					<input type=\"submit\" name=\"submit\" value=\"Odeslat\"></td>
					</tr>
					</table>
					</form>
				</body>
				</html>
				";
		}

		function display_unauthorized_list_page($patients){
			$html = "
				<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
					<tr>
						<td> Jmeno </td><td> Vek </td><td> Rodne cislo </td><td> email</td><td> Telefon </td><td> Pojišťovna </td><td> Autorizovat </td><td> Zakázat </td>
					</tr>";					
						while ($row = mysql_fetch_assoc($patients)) {
							$html = $html . "
						<tr>
							<td>" . $row['name'] . "</td>
							<td>" . $row['age'] . "</td>
							<td>" . $row['personal_id'] . "</td>
							<td>" . $row['email'] . "</td>
							<td>" . $row['phone'] . "</td>
							<td>" . $row['insurance'] . "</td>
							<td>
								<form method=\"post\" action=\"class.viewer.php?form_id=9\">
								<input type=\"submit\" name=\"submit\" value=\"Autorizovat\">
								<input type=\"hidden\" name=\"pat_name\" value=" . $row['name'] . ">
								<input type=\"hidden\" name=\"patient_id\" value=" . $row['personal_id'] . ">
								<input type=\"hidden\" name=\"id\" value=" . $row['id'] . ">

								</form>
							</td>
							<td>
								<form method=\"post\" action=\"class.viewer.php?command_id=26\">
								<input type=\"submit\" name=\"submit\" value=\"Zakázat\">
								<input type=\"hidden\" name=\"id\" value=" . $row['id'] . ">

								</form>
							</td>
						</tr>";
						
					}
				$html = $html . 
	    					"
	    					</table>
	    					";
			return $html;
			
		}
	function display_set_capacity($id){
	$html="<html>
					<head>
						<title>Nastavení registračních kapacit </title>
						<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"> 
					</head>
					<body>
						<h3>Nastavení registračních kapacit</h3>
						<form method=\"post\" action=\"class.viewer.php?command_id=16\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
								<tr>
									<td>Max minut denně</td>
									<td><input type=\"text\" name=\"cap_min\" size=\"3\"></td>
								</tr>
								<tr>
									<td>Max rezervací denně</td>
									<td><input type=\"text\" name=\"cap_day\" size=\"3\"></td>
								</tr>
								<tr>
									<td>Max rezervací týdně</td>
									<td><input type=\"text\" name=\"cap_week\" size=\"3\"></td>
								</tr>
								<tr>
									<td>Max rezervací měsíčně</td>
									<td><input type=\"text\" name=\"cap_month\" size=\"3\"></td>
									<input type=\"hidden\" name=\"id\" value=". $id .">
								</tr>
			
								<tr>
									<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Odeslat\"></td>
								</tr>
							</table>
						</form>
					</body>
				</html> ";
				return $html;
	}
	function display_reservations($reservations){
	$html = "
				<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
					<tr>
						<td> Lékař </td><td> Datum </td><td> od</td><td> do</td><td> Zrušit </td>
					</tr>";					
						while ($row = mysql_fetch_assoc($reservations)) {
							$html = $html . "
						<tr>
							<td>" . $row['user_name'] . "</td>
							<td>".$row['day'].'.'.$row['month'].'.'.$row['year'] . "</td>
							<td>" . $row['time_in'] . "</td>
							<td>" . $row['time_out'] . "</td>
							<td>
								<form method=\"post\" action=\"class.viewer.php?command_id=20\">
								<input type=\"submit\" name=\"submit\" value=\"Zrušit\">
								<input type=\"hidden\" name=\"id\" value=" . $row['id'] . ">
								<input type=\"hidden\" name=\"availability_id\" value=" . $row['availability_id'] . ">
								

								</form>
							</td>
						</tr>";
						
					}
				$html = $html . 
	    					"
	    					</table>
	    					";
				return $html;
	}
///////////////////////////////////////////////////////
	function display_make_reservations($id_doctor,$day,$month,$year,$availability){
	$html = "
				<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
					<tr>
						<td> OD </td><td> DO </td><td> Rezervovat </td>
					</tr>";					
						while ($row = mysql_fetch_assoc($availability)) {
							if($row['available']==0)
							$html = $html . "
							<tr style=\"background-color: green\">";
							else $html = $html . "
							<tr style=\"background-color: red\">";
							
							$html = $html."
							<td>" . $row['time_in'] . "</td>
							<td>" . $row['time_out'] . "</td>
							<td>
								<form method=\"post\" action=\"class.viewer.php?command_id=21\">";
							if($row['available']==0)
							$html = $html . "
								<input type=\"submit\" name=\"submit\" value=\"Rezervovat\">";
							$html = $html . "
								<input type=\"hidden\" name=\"id\" value=" . $row['id'] . ">
								<input type=\"hidden\" name=\"id_doctor\" value=" . $row['id_doctor'] . ">
								<input type=\"hidden\" name=\"year\" value=" . $row['year'] . ">
								<input type=\"hidden\" name=\"month\" value=" . $row['month'] . ">
								<input type=\"hidden\" name=\"day\" value=" . $row['day'] . ">
								<input type=\"hidden\" name=\"from\" value=" . $row['time_in'] . ">
								<input type=\"hidden\" name=\"to\" value=" . $row['time_out'] . ">


								</form>
							</td>
						</tr>";
						
					}
				$html = $html . 
	    					"
	    					</table>
	    					";
				return $html;
	}
	function display_make_availability(){
	$html = "
				<form method=\"post\" action=\"class.viewer.php?command_id=22\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
								<tr>
									<td>Den</td>
									<td><input type=\"text\" name=\"day\" size=\"8\"></td>
								</tr>
								<tr>
									<td>Měsíc</td>
									<td><input type=\"text\" name=\"month\" size=\"8\"></td>
								</tr>
								<tr>
									<td>Rok</td>
									<td><input type=\"text\" name=\"year\" size=\"8\"></td>
								</tr>
								<tr>
									<td>Od</td>
									<td><input type=\"text\" name=\"time_in\" size=\"5\"></td>
								</tr>
								<tr>
									<td>Do</td>
									<td><input type=\"text\" name=\"time_out\" size=\"5\"></td>
									</tr>
								<tr>
									<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Přidat\"></td>
								</tr>
							</table>
						</form>";
				return $html;
	}
	function display_modify_availability($id){
	$html = "
				<form method=\"post\" action=\"class.viewer.php?command_id=24\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
								<tr>
									<td>Od</td>
									<td><input type=\"text\" name=\"time_in\" size=\"5\"></td>
								</tr>
								<tr>
									<td>Do</td>
									<td><input type=\"text\" name=\"time_out\" size=\"5\"></td>
									</tr>
								<tr>
									<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Upravit\"></td>
									<input type=\"hidden\" name=\"id\" value=" . $id . ">
								</tr>
							</table>
						</form>";
				return $html;
	}
	function display_availabilities($availabilities){
	$html = "
				<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
					<tr>
						<td> Datum </td><td> od</td><td> do</td><td> Odstranit </td><td> Upravit </td>
					</tr>";					
						while ($row = mysql_fetch_assoc($availabilities)) {
							$html = $html . "
						<tr>
							<td>".$row['day'].'.'.$row['month'].'.'.$row['year'] . "</td>
							<td>" . $row['time_in'] . "</td>
							<td>" . $row['time_out'] . "</td>
							<td>
								<form method=\"post\" action=\"class.viewer.php?command_id=23\">
								<input type=\"submit\" name=\"submit\" value=\"Odstranit\">
								<input type=\"hidden\" name=\"id\" value=" . $row['id'] . ">
								

								</form>
							</td>
							<td>
								<form method=\"post\" action=\"class.viewer.php?form_id=13\">
								<input type=\"submit\" name=\"submit\" value=\"Upravit\">
								<input type=\"hidden\" name=\"id\" value=" . $row['id'] . ">
								

								</form>
							</td>
						</tr>";
						
					}
				$html = $html . 
	    					"
	    					</table>
	    					";
				return $html;
	}
	function display_patient_capacities($capacities){
		$capacities=mysql_fetch_assoc($capacities);
		$html = "	<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
					<tr>
						<td>Max. minut na rezeravaci</td><td>Max. rezervací denně</td><td>Max. rezervací týdně</td><td>Max. rezervací měsíčně</td>
					</tr>			
						
						<tr>
							<td>".$capacities['minutes']."</td>
							<td>".$capacities['daily']."</td>
							<td>".$capacities['weekly']."</td>
							<td>".$capacities['monthly']."</td>
						</tr>
					</table>";
				return $html;

	}
	function display_change_info($info){
		$name=$info['name'];
		$name=split(' ', $name);
				$html = "
				<form method=\"post\" action=\"class.viewer.php?command_id=25\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
								<tr>
									<td>Heslo</td>
									<td><input type=\"text\" value = ".$info['user_password']." name=\"passwd\" size=\"15\"></td>
								</tr>
								<tr>
									<td>Jméno</td>
									<td><input type=\"text\" value = ".$name[0]." name=\"firstname\" size=\"15\"></td>
								</tr>
								<tr>
									<td>Příjmení</td>
									<td><input type=\"text\" value = ".$name[1]." name=\"last\" size=\"15\"></td>
								</tr>
								<tr>
									<td>E-mail</td>
									<td><input type=\"text\"value = ".$info['email']." name=\"email\" size=\"15\"></td>
								</tr>
								<tr>
									<td>Telefonní číslo</td>
									<td><input type=\"text\"value = ".$info['phone']." name=\"phone\" size=\"15\"></td>
									</tr>
								<tr>
									<input type=\"hidden\" name=\"patient_id\" value=" . $info['patient_id'] . ">
									<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Změnit\"></td>
								</tr>
							</table>
						</form>";
				return $html;
	}
///////////////////////////////////////////////////////////

	}
	$form_id = $_REQUEST['form_id'];
	$command_id = $_REQUEST['command_id'];	
	$login = $_REQUEST['log'];
	$password = $_REQUEST['pwd'];
 	$new_department_name = $_REQUEST['new_department_name'];		
	
	$user_name = $_SESSION['user_name'];
	$user_department_name = $_SESSION['user_department_name'];
	$current_user_id = $_SESSION['user_id'];
	$current_department_id = $_SESSION['user_department_id'];
	$email = $_SESSION['email'];

	$admin = new administrator();
	$gui = new viewer();
	$distrib = new distributor();	
	
	//******** FORMS ********
	//LOGIN
	if ($form_id == 1){		
		$gui->display_login_form();
			
	}
	//HOMEPAGE
	elseif ($form_id == 2){		
		$gui->display_homepage($user_name, $user_department_name, "");
	}
	//NEW DEPARTMENT FORM
	elseif ($form_id == 3){
		$gui->display_new_department_form();
	}
	//NEW DOCTOR FORM
	elseif($form_id == 4){
		$departments_list = $distrib->request_show_department_list();
		$gui->display_new_doctor_form($departments_list);
	}
	//NEW PATIENT REGISTRATION
	elseif($form_id == 5){
		$patient_list_processed = $gui->display_new_patient_registration_form();
		$gui->display_homepage($user_name, $user_department_name, $patient_list_processed);
	}
	//
	

	//NOVY ZAZNAM
	elseif($form_id == 6){
		$name = $_POST['pat_name'];
		$pat_ids = $_POST['patient_id'];		
		$gui->display_new_form($name, $pat_ids);
	}

	// REGISTRACE NOVEHO PACIENTA
	elseif($form_id==7){
		$reg_form=$gui->display_registration_form();
		$gui->display_homepage($user_name, $user_department_name, $reg_form);
	}
	//SEZNAM NEAUTORIZOVANYCH
	elseif($form_id==8){
		$list_of_unauthorized=$distrib->request_show_unauthorized();
		$patient_list_processed = $gui->display_unauthorized_list_page($list_of_unauthorized);
		$gui->display_homepage($user_name, $user_department_name, $patient_list_processed);

	}
	//FORMULAR NASTAVENI OMEZENI
	elseif ($form_id==9) {
		$id=$_POST['id'];
		$patient_list_processed = $gui->display_set_capacity($id);
		$gui->display_homepage($user_name, $user_department_name, $patient_list_processed);
	}
	//VYBER LEKARU REZERVACE
	elseif ($form_id==10) {
		$day = $_REQUEST['day'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];
		
		$list = $distrib->request_show_doctor_list();
		$doctors = $gui->display_doctors_calendar($list,$day,$month,$year);
		$gui->display_homepage($user_name, $user_department_name, $doctors);
	}
	//TVORBA DOSTUPNOSTI
	elseif ($form_id==11) {
		$content = $gui->display_make_availability();
		$gui->display_homepage($user_name, $user_department_name, $content);
	}
	//ZOBRAZENI VSECH DOSTUPNOSTI LEKARE
	elseif($form_id==12){
		$all= $distrib->request_get_all_availabilities($current_user_id);
		$content=$gui->display_availabilities($all);
		$gui->display_homepage($user_name, $user_department_name, $content);
	}
	//ZMENA DOSTUPNOSTI
	elseif($form_id==13){
		$id=$_POST['id'];
		$content=$gui->display_modify_availability($id);
		$gui->display_homepage($user_name, $user_department_name, $content);
	}
	//ZMENA PACIENTOVYCH PRISTUPOVYCH UDAJU
	elseif($form_id==14){
		$info = $distrib->request_get_auth_patient_info($current_user_id);
		$content=$gui->display_change_info($info);
		$gui->display_homepage($user_name, $user_department_name, $content);
	}
	//ZOBRAZENI PACIENTOVYCH OMEZENI
	elseif($form_id==15){
		$capacities=$distrib->request_get_access_capacities($current_user_id);
		$content=$gui->display_patient_capacities($capacities);
		$gui->display_homepage($user_name, $user_department_name, $content);

	}


	// PRIHLASENI DO SYSTEMU	
	if ($command_id == 1){	
		$distrib->request_check_login_credentials($login, $password);		
		$user_name = $_SESSION['user_name'];
		$user_department_name = $_SESSION['user_department_name'];	
		if (! $user_name){
			echo "<head>
						<title>Chyba autorizace</title>
						<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"> 
					</head>
					<p>Přihlašovaní neúspěšné. Nespravné login nebo heslo!</p>";
		}else{
			$message = "Přihlašovaní úspěšné. Úvodní stránka pro <b>" . $user_name . "</b>, z oddělení <b>" . $user_department_name . "</b><br><br>";
 		
		$gui->display_homepage($user_name, $user_department_name, $message);}
	}
	// NASTAV NOVE ODDELENI
	elseif ($command_id == 2){ 
		$success = $distrib->request_create_new_department($new_department_name);	
		if ( $success ){
			$message = "Nastaveni nové nemocniční oddělení <b>" . $new_department_name . "</b> úspešné.";
			$gui->display_homepage($user_name, $user_department_name, $message);
		}else{
			$message = "Nastaveni nové nemocniční oddělení <b>" . $new_department_name . "</b> neúspešné!";
			$gui->display_homepage($user_name, $user_department_name, $message);
		}
	}
	// NASTAV NOVEHO DOKTORA
	elseif($command_id == 3){
		$new_doctor_name = $_REQUEST['new_doctor_name'];
		$new_doctor_login = $_REQUEST['new_doctor_login'];
		$new_doctor_password = $_REQUEST['new_doctor_password'];		
		$new_department_id = $_POST['new_doctor_department'];
		$success = $distrib->request_create_new_doctor($new_doctor_name, $new_doctor_login, $new_doctor_password, $new_department_id);	
		if ( $success ){
			$message = "Novy doktor zaregistrovan - <b>" . $new_doctor_name . "</b>";
			$gui->display_homepage($user_name, $user_department_name, $message);
		}else{
			$message = "Registrace noveho doktora se nezdarila";
			$gui->display_homepage($user_name, $user_department_name, $message);
		}
	}
	// REGISTRACE NOVEHO PACIENTA
	elseif($command_id == 4){
		$new_patient_name = $_POST['new_patient_name'];
		$new_patient_age = $_POST['new_patient_age'];
		$new_patient_personal_id = $_POST['new_patient_personal_id'];
		$new_patient_insurance = $_POST['insurance'];
		$success = $distrib->request_register_new_patient($new_patient_name, $new_patient_age, $new_patient_personal_id, $new_patient_insurance);
		if ( $success ){
			$message = "<b>" . $new_patient_name . "</b> byl(a) uspesne zaregistrovan(a).";
			$gui->display_homepage($user_name, $useSr_department_name, $message);
		}else{
			$message = "Registrace pacienta ".$new_patient_name ." byla neuspesna.";
			$gui->display_homepage($user_name, $user_department_name, $message);
		}
	}
	//ZOBRAZ SEZNAM ODDELENI
	elseif($command_id == 5){
		$list=$distrib->request_show_department_list();
		$departments_list_processed = $gui->display_departments_list_page($list);
		$gui->display_homepage($user_name, $user_department_name, $departments_list_processed);
		
	}
	//ZOBRAZ SEZNAM DOKTORU
	elseif($command_id == 6){
		$list = $distrib->request_show_doctor_list();
		$doctors_list_processed = $gui->display_doctors_list_page($list);
		$gui->display_homepage($user_name, $user_department_name, $doctors_list_processed);
	}
	//ZOBRAZ SEZNAM PACIENTU
	elseif($command_id == 7){
		$patient_list = $distrib->request_show_patient_list();
		$patient_list_processed = $gui->display_patient_list_page($patient_list);
		$gui->display_homepage($user_name, $user_department_name, $patient_list_processed);
	}
	//PRACE S PACIENTEM
	elseif($command_id == 8){
		$pat_name = $_POST['pat_name'];
		$patient_personal_id = $_POST['patient_id'];
		$boolean_ispatient_hospitalitated = $distrib->is_patient_in_hospital($patient_personal_id);	
		if ( $boolean_ispatient_hospitalitated ){
			$button = "
				<td>ANO</td>
				<td>
				<form method=\"post\" action=\"class.viewer.php?command_id=11\">
				<input type=\"submit\" name=\"remove_patient\" value=\"Propustit\" size=\"20\">
				<input type=\"hidden\" name=\"patient_id\" value=". $patient_personal_id .">

				</form>
				<form method=\"post\" action=\"class.viewer.php?command_id=13\">
				<input type=\"submit\" name=\"remove_patient\" value=\"Historie Hospitalizace\" size=\"20\">
				<input type=\"hidden\" name=\"patient_id\" value=". $patient_personal_id .">

				</form>
				</td>
			";
			$content = $gui->patient_profile($pat_name, $patient_personal_id, $button);
			$gui->display_homepage($user_name, $user_department_name, $content);
		}else{
			$button = "
				<td>NE</td>
				<td>
				<form method=\"post\" action=\"class.viewer.php?command_id=12\">
				<input type=\"submit\" name=\"recieve_patient\" value=\"Prijmout\" size=\"20\">
				<input type=\"hidden\" name=\"patient_id\" value=". $patient_personal_id .">
				</form>
				<form method=\"post\" action=\"class.viewer.php?command_id=13\">
				<input type=\"submit\" name=\"remove_patient\" value=\"Historie Hospitalizace\" size=\"20\">
				<input type=\"hidden\" name=\"patient_id\" value=". $patient_personal_id .">
				</form>
				</td>
			";
			$content = $gui->patient_profile($pat_name, $patient_personal_id, $button);
			$gui->display_homepage($user_name, $user_department_name, $content);
		}
	}
	//HISTORIE ZAZNAMU
	elseif($command_id == 9){
		$pat_id = $_POST['patient_id'];
		$pat_name = $_POST['pat_name'];
		$success = $distrib->request_record_history($pat_id);
		$content = "
			<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
				<tr>
				<td>Date</td><td>Text</td>
				</tr>		
				";
					while ($row = mysql_fetch_assoc($success)){
						$content = $content . 
						"<tr>
						<td>".$row['date']."</td><td>".$row['text']."</td>
						</tr>";
					}
					
			$content = $content . 
	    					"
	    					</table>
	    					";
		$gui->display_homepage($user_name, $user_department_name,$content);
	}
	//NOVY ZAZNAM
	elseif($command_id == 10){
		$pat_id = $_POST['pati_id'];
		$text = $_POST['zaznam'];		
		$success = $distrib->request_new_record($pat_id, $text);
		if($success){
			$neco = "Zaznam byl uspesne ulozen do databaze.";
			$gui->display_homepage($user_name, $user_department_name, $neco);
		}else{
			$neco = "Zaznam byl uspesne ulozen do databaze.";
			$gui->display_homepage($user_name, $user_department_name, $neco);
		}
	}
	//PROPUSTIT
	elseif($command_id == 11){
		$patient_personal_id = $_REQUEST['patient_id'];
		$success = $distrib->request_dismiss_patient($patient_personal_id);
		if ( $success ){
			$message = "Pacient byl propusten z nemocnice.";
			$gui->display_homepage($user_name, $user_department_name, $message);
		}else{
			$message = "ERROR!! Propusteni pacienta neprobehlo.";
			$gui->display_homepage($user_name, $user_department_name, $message);
		}
	}
	//PRIJMOUT
	elseif($command_id == 12){
		$user_name = $_SESSION['user_name'];
		$current_user_id = $_SESSION['user_id'];
		$patient_personal_id = $_REQUEST['patient_id'];
		$success = $distrib->request_recieve_patient($patient_personal_id, $current_user_id);
		if ( $success ){
			$message = "Pacient byl prijat do nemocnice.";
			$gui->display_homepage($user_name, $user_department_name, $message);
		}else{
			$message = "ERROR!! Prijeti pacienta neprobehlo.";
			$gui->display_homepage($user_name, $user_department_name, $message);
		}
	}
	//CELA HISTORIE
	elseif($command_id == 13){
		$pat_name = $_REQUEST['patient_name'];
		$patient_personal_id = $_REQUEST['patient_id'];		
		$success = $distrib->request_hospitalitation_history($patient_personal_id);
		$content = "
			<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
				<tr>
				<td>Date in</td><td>Date out</td>
				</tr>		
				";
					while ($row = mysql_fetch_assoc($success)){
						$content = $content . 
						"<tr>
						<td>".$row['date_in']."</td><td>".$row['date_out']."</td>
						</tr>";
					}
					
			$content = $content . 
	    					"
	    					</table>
	    					";
		$gui->display_homepage($user_name, $user_department_name,$content);
	}
	//ZOBRAZ KALENDAR
	elseif($command_id == 14){
		$year = $_REQUEST['year'];
		$month = $_REQUEST['month'];
		if($year==null&&$month==null){
		$date = time();
		$month = date('m', $date);
  		$year = date('Y', $date);
  	}
  		$calendar=$gui->display_calendar($year,$month);
  		$gui->display_homepage($user_name, $user_department_name, $calendar);

	}
	//ZADOST PACIENTA O PRISTUP
	elseif($command_id == 15){
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$age=$_POST['age'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$personal_id=$_POST['personal_id'];
		$insurance=$_POST['insurance'];
		$distrib->request_registration($first_name,$last_name,$email,$phone,$age,$personal_id,$insurance);

		$gui->display_login_form();

	}
	//AUTORIZACE A NASTAVENI KAPACIT
	elseif($command_id == 16){
		$id=$_POST['id'];
		$cap_min=$_POST['cap_min'];
		$cap_day=$_POST['cap_day'];
		$cap_week=$_POST['cap_week'];
		$cap_month=$_POST['cap_month'];
		$distrib->request_set_capacity($id,$cap_min,$cap_day,$cap_week,$cap_month);
		$patient_data=$distrib->request_patient_info($id);
		$distrib->request_save_auth($id,$patient_data);
		$patient_data=$distrib->request_patient_info($id);
		$info=mysql_fetch_assoc($patient_data);
		$message="Pacient ".$info['name']." byl uspesne registrovan pod username ".$info['email']." a heslem ".$info['personal_id'];
		$gui->display_homepage($user_name, $user_department_name, $message);
		
		
		
	}
	//ODHLASENI
	elseif($command_id == 17){

		$distrib->logout();
		$gui->display_login_form();
	}
	//PRACE REZERVACE
	elseif($command_id == 18){
		$id_doc = $_POST['id'];
		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$availability=$distrib->request_doc_availability($id_doc,$day,$month,$year);
		$message = $gui->display_make_reservations($id_doc,$day,$month,$year,$availability);
		$gui->display_homepage($user_name, $user_department_name, $message);


		
	}
	//ZOBRAZ PACIENTOVI REZERVACE
	elseif($command_id == 19){
		$reservations=$distrib->request_view_reservations($current_user_id);
		$reservation_list=$gui->display_reservations($reservations);
		$gui->display_homepage($user_name, $user_department_name, $reservation_list);
	}
	//ZRUSENI REZERVACE
	elseif($command_id == 20){
		$id_res=$_POST['id'];
		$availability_id= $_POST['availability_id'];
		$distrib->request_destroy_reservation($id_res,$availability_id);
		$distrib->send_mail($email,'Vaše rezervace byla úspěšně zrušena.');

		$reservations=$distrib->request_view_reservations($current_user_id);
		$reservation_list=$gui->display_reservations($reservations);
		$gui->display_homepage($user_name, $user_department_name, $reservation_list);
	}

	//PROCES REZERVACE, KONTROLA OMEZENI
	elseif($command_id == 21){
		$id = $_POST['id'];
		$id_doctor = $_POST['id_doctor'];
		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$from = $_POST['from'];
		$to = $_POST['to'];
		
		$to_time=strtotime($to);
		$from_time=strtotime($from);

		$minutes = round(abs($to_time - $from_time) / 60,2);

		$capacities=$distrib->request_get_access_capacities($current_user_id);
		$capacities=mysql_fetch_assoc($capacities);
		$day_count = $distrib->request_get_res_number_day($current_user_id,$day,$month,$year);
		$week_count=$distrib->request_get_res_number_week($current_user_id,$day,$month,$year);
		$month_count = $distrib->request_get_res_number_month($current_user_id,$month,$year);
		if($minutes>$capacities['minutes']){$message="Nelze rezervovat, překročena maximální délka vyšetření.";}
		elseif ($day_count>=$capacities['daily']) {
			$message="Nelze rezervovat, překročen maximální počet rezervací pro tento den.";
		}
		elseif ($month_count>=$capacities['monthly']) {
			$message="Nelze rezervovat, překročen maximální počet rezervací pro tento měsíc.";
		}
		elseif ($week_count>=$capacities['weekly']) {
			$message="Nelze rezervovat, překročen maximální počet rezervací pro tento týden.";
		}
		else{		
		$availability=$distrib->request_make_reservation($id,$current_user_id,$id_doctor,$year,$month,$day,$from,$to);
		
		$message = "Rezervace byla uspesna a detaily Vám byly zaslány emailem";}
		$gui->display_homepage($user_name, $user_department_name, $message);
	}
	//PRIDANI DOSTUPNOSTI
	elseif($command_id == 22){
		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$time_in=$_POST['time_in'];
		$time_out=$_POST['time_out'];
		$distrib->request_set_doc_availability($current_user_id,$day,$month,$year,$time_in,$time_out);
		$message = "Dostupnost byla přidána";
		$gui->display_homepage($user_name, $user_department_name, $message);
	}
	//ODSTRANENI DOSTUPNOSTI
	elseif($command_id == 23){
		$id = $_POST['id'];
		$distrib->request_destroy_doc_availability($id);
		$message = "Dostupnost byla odstraněna";
		$gui->display_homepage($user_name, $user_department_name, $message);
	}
	//ZMENA CASU DOSTUPNOSTI
	elseif($command_id == 24){
		$id = $_POST['id'];
		$time_in=$_POST['time_in'];
		$time_out=$_POST['time_out'];
		$distrib->request_modify_doc_availability($id,$time_in,$time_out);
		$message = "Dostupnost byla změněna";
		$gui->display_homepage($user_name, $user_department_name, $message);
	}
	//ZMENA PACIENTOVYCH PRISTUPOVYCH UDAJU
	elseif($command_id == 25){
		$passwd = $_POST['passwd'];
		$patient_id = $_POST['patient_id'];
		$phone = $_POST['phone'];
		$mail = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['last'];
		$distrib->request_change_info($passwd,$current_user_id,$patient_id,$phone,$mail,$firstname,$lastname);
		$message = "Informace byly změněny";
		$gui->display_homepage($user_name, $user_department_name, $message);
	}
	//ZAKAZ PRISTUPU PACIENTOVI
	elseif($command_id == 26){
		$id=$_POST['id'];
		$distrib->request_deny_access($id);
		$message="Pacientovi byl zakázán přístup";
		$gui->display_homepage($user_name, $user_department_name, $message);
	}
////////////////////////////////////////////
?>