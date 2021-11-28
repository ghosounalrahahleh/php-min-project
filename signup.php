<?php
session_start();
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}
// session_destroy();
//variables
$fullName    = $mobileNum    = $date    = $email    = $pass    = $pass2    = "";
$fullNameErr = $mobileNumErr = $dateErr = $emailErr = $passErr = $pass2Err = "";
//regex
$regexEmail = "/^[a-z0-9._-]+@(gmail|yahoo).com$/";
$regexPass  = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z])/";
$regexName = "/^([\w]{3,})+\s+([\w]{3,})+\s+([\w]{3,})+\s+([\w]{3,})+$/i";
$regexMobile = "/^[0-9]{14}$/i";
$validName = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Name Validate
    if (!preg_match($regexName, $_POST['fullName'])) {
        $fullNameErr = "You have to fill your quad name! ";
    } else {
        $fullName    = test_input($_POST['fullName']);
        $validName   = true;
    }
    
    // Mobile Number Validate
    $validMobile = false;
    if (!preg_match($regexMobile, $_POST['mobileNum'])) {
        $mobileNumErr = "The mobile number should be 14 digits!";
    } else {
        $mobileNum    = test_input($_POST['mobileNum']);
        $validMobile  = true;
    }

    //Date of Birth Validation
    $validDoB   = false;
    $currntDate = date("Y");
    $date = substr($_POST['Dob'], 0, 4);
    if (empty($_POST['Dob'])) {
        $dateErr = "You hane to fill this field";
    } elseif (($currntDate -  $date) < 16) {
        $dateErr = "Your age under allowed Ages :(";
    } else {
        $date     = test_input($_POST['Dob']);
        $validDoB = true;
    }

    //Email address validation
    $validEmail = false;
    if (!preg_match($regexEmail, $_POST['email'])) {
        $emailErr = "Invalid Email !";;
    } else {
        $email      = test_input($_POST['email']);
        $validEmail = true;
    }

    //Passwords validation
    $validPass1 = false;
    if ($_POST['pass1'] == "") {
        $passErr = "You have to set your password";;
    } elseif (!preg_match($regexPass, $_POST['pass1'])) {
        $passErr = "Your pass to weak!";;
    } else {
        $pass = test_input($_POST['pass1']);
        $validPass1 = true;
    }

    //Passwords validation
    $validPass2 = false;
    if (($_POST['pass2']) != ($_POST['pass1'])) {
        $pass2Err = "the tow passwords don't match!";
    } else {
        $pass2 = test_input($_POST['pass1']);
        $validPass2 = true;
    }
     
    $signup_date = date("Y/m/d") ;
    //store user information 
    if ($validName === true && $validMobile === true && $validEmail === true && $validDoB === true && $validPass1 === true && $validPass2 === true) {
        $_SESSION['user' . $_SESSION['counter']] = array(
            "name"          => $fullName,
            "mobile"        => $mobileNum,
            "date-of-birth" => $date,
            "email"         => $email,
            "password"      => $pass,
            "signup_date"   => $signup_date,
            
        );
        $_SESSION['counter']++;
        //get the name
        $id2=$_POST["fullName"];
         header("location:login.php?id=$id2");
    }
}
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS link -->
    <link rel="stylesheet" href="./css/style.css">
    <title>Sign UP</title>
</head>

<body>
    <div class="container">
        <div class="row w-75 m-auto">
            <div class="col-5 col-sm-8 d-flex flex-column justify-content-center align-items-center m-auto  mt-5">
                <!-- form start -->
                <form class="w-100 bg-light p-5 border border-1
                 bg-light rounded" method="POST" onsubmit="validation(event)">
                    <div class="d-flex flex-column justify-content-center align-items-center m-auto w-100 mt-2">
                        <h1 class="mb-3 fw-bolder">Sign up</h1>
                        <h5 class="text-center mb-5 fw-light">Create an Account free</h5>
                    </div>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full name</label>
                        <input type="text" class="form-control " id="fullName" name="fullName" aria-describedby="emailHelp" >
                        <small id="UserHelp" class="text-danger ms-3"><?php echo $fullNameErr; ?></small>
                    </div>
                    <div class="mb-3">
                        <label class="text-dangar" for="mobileNum" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="mobileNum" name="mobileNum" aria-describedby="mobileHelp">
                        <small id="numHelp" class="text-danger ms-3"><?php echo $mobileNumErr; ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="Dob" class="form-label">Date of birth</label>
                        <input type="date" class="form-control" id="Dob" name="Dob" aria-describedby="dateHelp">
                        <small id="DobHelp" class="text-danger ms-3"><?php echo $dateErr; ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        <small id="emailHelp" class="text-danger ms-3"><?php echo $emailErr; ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass1">
                        <small id="passHelp" class="text-danger ms-3"><?php echo $passErr; ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="passConfirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="passConfirm" name="pass2">
                        <small id="passConfirmHelp" class="text-danger ms-3"><?php echo $pass2Err; ?></small>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100 w-sm-100 pt-2 pb-2 rounded-pill mb-3 mt-2 h3 fw-bold" id="loginBtn">Submit</button>
                </form>
                <p class="text-center"> Don't have an account? <a class="text-dark fw-bold text-decoration-none" href="login.php">Login</a></p>

            </div>
        </div>
    </div>

    <!--js bootstrap linl\k  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- js link -->
    <script src="./js/script.js"></script>
</body>

</html>