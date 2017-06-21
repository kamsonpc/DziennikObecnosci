<?php
session_start();
require_once 'db_connect.php';

$sql="DELETE FROM rok";
$result= $db->connection->query($sql);
header("location:http://localhost/obecnosc/?url=admin&&page=view_calendar");
?>