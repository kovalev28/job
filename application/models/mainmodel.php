<?php

include_once 'application/core/database.php';

class mainmodel extends Model {

    public function pay_print($month, $year) {
        $dbClass = new database();
        $dbh = $dbClass->getdb();

        $stmt = $dbh->query("
         SELECT workers.work_id, workers.name, workers.surname, professions.name_prof, payment.payments, payment.bonus,workers.image
         FROM workers
          INNER JOIN professions ON
          workers.prof_id = professions.prof_id
	   INNER JOIN payment ON
	   workers.work_id = payment.work_id
	   WHERE payment.date = '$year-$month-01'");
        $data = $stmt->fetchAll();
        return $data;
    }

    public function bonus($month, $year, $prof, $bonussum) {
        $dbClass = new database();
        $dbh = $dbClass->getdb();
        $stmt = $dbh->query("INSERT INTO payment (pay_id, work_id, payments, bonus, date)
        SELECT NULL, workers.work_id, workers.salary, $bonussum, '$year-$month-01'
        FROM workers
           INNER JOIN professions ON
           workers.prof_id = professions.prof_id
           WHERE name_prof = '$prof'");
    }

    public function addsot($name, $surname, $prof, $salary, $images) {
        $dbClass = new database();
        $dbh = $dbClass->getdb();
        $stmt = $dbh->query("INSERT INTO workers(work_id, name, surname, prof_id, salary, image)
        VALUES(NULL, '$name', '$surname', $prof, $salary, '$images')");
    }

}
