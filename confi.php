<?php

$server = 1;
if ($server == 1) {
    $DB_host = "localhost";
    $DB_user = "root";
    $DB_pass = "";
    $DB_name = "tuts-rest";
}
try {

    $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}", $DB_user, $DB_pass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DB_con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
} catch (PDOException $e) {
    echo $e->getMessage();
}


