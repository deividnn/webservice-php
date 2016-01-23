<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once('confi.php');
         $qur = mysql_query('select * from users');
         echo $qur.'aki';
        // put your code here
        ?>
    </body>
</html>
