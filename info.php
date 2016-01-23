<?php

require_once('confi.php');

$uid = $_GET['id'];
if (!empty($uid)) {

    $stmt = $DB_con->prepare("select name, email, status from `users` where ID='$uid'");
    $stmt->execute(array(":id" => $uid));
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($user);
        $result[] = array("name" => $name, "email" => $email, 'status' => $status);
        $json = array("status" => 1, "info" => $result);
    } else {
        $json = array("status" => 0, "msg" => "User ID not define");
    }
} else {
    $json = array("status" => 0, "msg" => "User ID not define");
}
$DB_con=NULL;

/* Output header */
header('Content-type: application/json');
echo json_encode($json);
