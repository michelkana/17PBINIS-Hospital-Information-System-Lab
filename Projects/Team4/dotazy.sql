SELECT patient.name, patient.surname, insurance.name, count(reservation.id_pac) as Pocet_rezervaci FROM reservation INNER JOIN patient ON patient.id_pac = reservation.id_pac INNER JOIN insurance ON patient.id_ins = insurance.id_ins GROUP BY patient.id_pac, insurance.name ORDER BY Pocet_rezervaci DESC LIMIT 1;
SELECT department.name, count(id_res) FROM reservation INNER JOIN doctor ON reservation.id_doc = doctor.id_doc INNER JOIN department ON doctor.id_dep = department.id_dep GROUP BY department.name;
