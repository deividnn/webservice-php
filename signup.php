<?php

require_once('confi.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $status = $_POST['status'];

    try {
        $stmt = $DB_con->prepare("INSERT INTO users (name, email, password, status) "
                . "VALUES (:name, :email, :pwd, :status);");
        $stmt->bindparam(":name", $name);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":pwd", $password);
        $stmt->bindparam(":status", $status);
        $stmt->execute();
        $json = array("status" => 1, "msg" => "Done User added!");
    } catch (PDOException $e) {
      // echo $e->getMessage();
        $json = array("status" => $e->getMessage(), "msg" => "Error adding user!");
    }
} else {
    $json = array("status" => 0, "msg" => "Request method not accepted");
}

 $DB_con=NULL;

/* Output header */
header('Content-type: application/json');
echo json_encode($json);
