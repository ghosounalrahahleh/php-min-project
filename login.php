<?php
session_start();
//store the admain information
$_SESSION["admin"] = array(
    "first_name"  => "Ahmad",
    "birth-date"  => "02/15/1994",
    "email"       => "admin@hotmail.com",
    "password"    => "A123456789a@#",
    "mobile"      => "00962123456789"
);

if (isset($_POST["submit"])) {

    foreach ($_SESSION as $key => $value) {

        if ($key == "admin") {
            if (is_array($value)) {
                if ($value["email"] == $_POST["email"] && $value["password"] == $_POST["password"]) {
                    $_SESSION[$key]['login_date'] =  date("Y/m/d h:i:s");
                    $id2 = strtok($_SESSION[$key]['first_name']);
                    header("location:admain.php?id=$id2");
                    die();
                }
            }
        } else {
            if (is_array($value)) {
                if ($value["email"] == $_POST["email"] && $value["password"] == $_POST["password"]) {
                    $_SESSION[$key]["login_date"] =  date("Y/m/d h:i:s");
                    $id2 = strtok($_SESSION[$key]['name'], " ");
                    header("location:welcome_page.php?id=$id2");
                    die();
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row w-50 m-auto">
            <div class="col-4 col-sm-10 d-flex flex-column justify-content-center align-items-center m-auto mt-5">
                <!--Start login form  -->
                <form class="w-100 bg-light p-5 border border-1
                 border-liget rounded" action="" method="POST">
                    <div class="d-flex flex-column justify-content-center align-items-center m-auto w-100 mt-2">
                        <h1 class="mb-3 fw-bolder">Login</h1>
                        <p class="text-center mb-5 fw-light">Welcome back! Login with ypur credentials</p>
                    </div>
                    <div class="mb-3 w-100">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control w-100" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass" name="password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100 w-sm-100 pt-2 pb-2 mt-5 rounded-pill mb-3 h3 fw-bold">Login</button>
                </form>
                <!--end login form  -->
                <p class="text-center"> Don't have an account? <a class="text-dark fw-bold text-decoration-none" href="signup.php">Sign UP</a></p>
            </div>
        </div>
    </div>

    <!-- js link -->
    <script src="./js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>