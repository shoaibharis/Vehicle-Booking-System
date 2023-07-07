<?php
session_start();
$dbHost = 'localhost';
$dbName = 'CarManagementSystem';
$dbUsername = 'root';
$dbPassword = '';
$dbc= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
?>