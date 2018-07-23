<?php


include'../config/connect.php';

$search = $_POST['search'];

$sql= "select * from structure where oracle = '$search' ";
$result = $connt->query($sql);






