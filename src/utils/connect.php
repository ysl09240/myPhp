<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2016/5/26
 * Time: 17:25
 */

$db_host='localhost';
$db_database='slin';
$db_username='root';
$db_password='123456';
$conn = new mysqli($db_host,$db_username,$db_password,$db_database);
if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') '
        . $conn->connect_error);
}
?>