<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/aja+++x/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Index</title>
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
<!-- Default form register -->
<form class="text-center border border-light p-5" method="post" action="./server.php">

    <p class="h4 mb-4">Sign up</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last name">
        </div>
    </div>
    <!-- E-mail -->
    <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail">
    <input type="phonenumber" id="phonenumber" name="phonenumber" class="form-control mb-4" placeholder="Phone Number">
    <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title ="at least 6, contain both character and number.">

    <!-- Birthday --> 
            <input type="date" id="datepicker" name="date" class="form-control mb-4" placeholder="Date of birth" value="<?php  if(isset($date)) echo($date) ?>">

    <!-- Stydy programs  -->
            <div class="form-group">
                <select id="program" name="program" class="form-control">
                <option value="" selected>Study programs</option>
                <option value="sie">SIE</option>
                <option value="hedspi">HEDSPI</option>
                <option value="ict">ICT</option>
                <option value="dsai">DS-AI</option>
                </select>
            </div>

     <!-- Sex -->
            <div class="form-group row">
                <label class="col-sm-1"><b>Sex</b></label>
                <div class="col-sm-11">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="male" value="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="female" value="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>

    <!-- Hobby -->
            <div class="form-group row">
                <label class="col-sm-1"><b>Hobbies</b></label>
                <div class="col-sm-11">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="reading" id="reading" name="hobbies[]">
                        <label class="form-check-label" for="reading">
                            Reading
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="sport" id="sport" name="hobbies[]">
                        <label class="form-check-label" for="sport">
                            Sport
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="music" id="music" name="hobbies[]">
                        <label class="form-check-label" for="music">
                            Music
                        </label>
                    </div>
                </div>
            </div>


            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit" name="reg_user">Sign up</button>

        </form>
    </div>

</body>

</html>