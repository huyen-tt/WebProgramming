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
    <title>Users</title>
</head>

<body>
    <div class="h4 text-center border border-light p-2">
        <a href="./index.php">
            <button type="button" class="btn">Sign up &nbsp &lt</button>
        </a>Users
    </div>

    <div class="container">
        <table class="table table-hover table-responsive-md">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $db = mysqli_connect('localhost', 'root', '', 'test');
                $query = "SELECT * FROM `user` ORDER BY id DESC";
                $result = mysqli_query($db, $query);
                if (!$result) {
                    printf("Error: %s\n", mysqli_error($db));
                    exit();
                }
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['id'] ?></th>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phonenumber'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                
                
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
