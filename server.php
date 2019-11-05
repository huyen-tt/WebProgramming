<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Errow</title>
</head>
<body>
<?php

// initializing variables
    $firstname = "";
    $lastname = "";
    $email    = "";
    $errors = array();

// connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'test');

// REGISTER USER
    if (isset($_POST['reg_user'])) {
  // receive all input values from the form
        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $date = mysqli_real_escape_string($db, $_POST['date']);
        $program = mysqli_real_escape_string($db, $_POST['program']);
        $sex = mysqli_real_escape_string($db, $_POST['sex']);
        $hobbies = mysqli_real_escape_string($db, implode(", ", $_POST['hobbies']));

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error into $errors array
    if (empty($firstname)) {
        array_push($errors, "Firstname is required");
    }
    if (empty($lastname)) {
        array_push($errors, "Lastname is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

  // Finally, register user if there are no errors in the form
    if (count($errors) != 0) {
        printf("Errow: \n");
        $count = count($errors);
        for ($x = 0; $x < $count; $x++){
            echo $errors[$x];
            echo "<br>";
        }
        ?>
        <a href="./index.php"><button type="button" class="btn btn-info">Go back to Sign up</button></a>
        <?php
        exit();
    }else{
        $query = "INSERT INTO `user` (`firstname`, `lastname`,`email`,`phonenumber`,`password`,`date`,`program`,`sex`,`hobbies`) VALUES ( '$firstname', '$lastname','$email','$phonenumber','$password','$date','$program','$sex','$hobbies')";
        // var_dump($query);
        // die();
        mysqli_query($db, $query);
        header('location: list.php'); // redirect to list.php after performing action
     }
}
