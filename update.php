<?php

// initializing variables
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  $id =  mysqli_real_escape_string($db, $_POST['id']);
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $sex = mysqli_real_escape_string($db, $_POST['sex']);
  $hobbies = mysqli_real_escape_string($db, implode(", ", $_POST['hobbies']));

  if (empty($email)) { array_push($errors, "Email is required"); }

  // Finally, register user if there are no errors in the form
  if ($password == '') {
    $query = "UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`phonenumber`='$phonenumber',`sex`='$sex',`hobbies`='$hobbies' WHERE `id`=$id";
  } else {
    $query = "UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`phonenumber`='$phonenumber',`password`='$password',`sex`='$sex',`hobbies`='$hobbies' WHERE `id`=$id";
  }
  mysqli_query($db, $query);
  header('location: list.php');
}