<?php

// connect to the database

$db = mysqli_connect('localhost', 'root', '', 'test');

// TODO: make a confirmation alert for confirming whether user want to delete or not

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "DELETE FROM `user` WHERE id=$id";
	mysqli_query($db, $query);
	header('location: list.php');
}


