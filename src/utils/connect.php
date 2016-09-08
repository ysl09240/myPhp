<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2016/5/26
 * Time: 17:25
 */

$db_host='127.0.0.1';
$db_database='slin';
$db_username='slin';
$db_password='36226870';
$conn = new mysqli($db_host,$db_username,$db_password,$db_database,"3306");
if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') '
        . $conn->connect_error);
}
?>