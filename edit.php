<?php
session_start();
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}
// session_destroy();

//variables
$fullName    = $mobileNum    = $date       = $email       = $pass    = $pass2    = "";
$fullNameErr = $mobileNumErr = $dateErr    = $emailErr    = $passErr = $pass2Err = "";

//validation vriable 
$validName   = $validDoB     = $validEmail = $validMobile =   false;

//regex
$regexEmail = "/^[a-z0-9._-]+@(gmail|yahoo).com$/";
$regexPass  = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z])/";
$regexName = "/^([\w]{3,})+\s+([\w]{3,})+\s+([\w]{3,})+\s+([\w]{3,})+$/i";
$regexMobile = "/^[0-9]{14}$/i";

//edit the user information
if (isset($_POST['edit_submit'])) {
    //Name Validate
    if (!preg_match($regexName, $_POST['fullName'])) {
        $fullNameErr = "You have to fill your quad name! ";
    } else {
        $fullName = $_POST['fullName'];
        $validName = true;
    }

    // Mobile Number Validate
    if (!preg_match($regexMobile, $_POST['mobileNum'])) {
        $mobileNumErr = "The mobile number should be 14 digits!";
    } else {
        $mobileNum = $_POST['mobileNum'];
        $validMobile = true;
    }

    //Date of Birth Validation
    $currntDate = date("Y");
    $date = substr($_POST['Dob'], 0, 4);
    if (empty($_POST['Dob'])) {
        $dateErr = "You hane to fill this field";
    } elseif (($currntDate -  $date) < 16) {
        $dateErr = "Your age under allowed Ages :(";
    } else {
        $date = $_POST['Dob'];
        $validDoB = true;
    }

    //Email address validation
    if (!preg_match($regexEmail, $_POST['email'])) {
        $emailErr = "Invalid Email !";;
    } else {
        $email = $_POST['email'];
        $validEmail = true;
    }
    
    
}
$userEdite = $_GET["id"];
if ($validName === true && $validMobile === true && $validEmail === true && $validDoB === true) {
if (isset($_POST["edit_submit"])) {
    $_SESSION[$userEdite]["name"]   = $_POST["fullName"];
    $_SESSION[$userEdite]["mobile"] = $_POST["mobileNum"];
    $_SESSION[$userEdite]["date-of-birth"] = $_POST["Dob"];
    $_SESSION[$userEdite]["email"] = $_POST["email"];
    header("location:admain.php");
}
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
        <div class="row w-50 m-auto">
            <div class="col-6 col-sm-10 d-flex flex-column justify-content-center align-items-center m-auto  mt-5">
                <!-- form start -->
                <form class="w-100 bg-light p-5 border border-1
                 border-liget rounded" method="POST" onsubmit="validation(event)">
                    <div class="d-flex flex-column justify-content-center align-items-center m-auto w-100 mt-2">
                        <h1 class="mb-3 fw-bolder">Edit</h1>
                        <h5 class="text-center mb-5 fw-light">Create an Account free</h5>
                    </div>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full name</label>
                        <input type="text" class="form-control " id="fullName" name="fullName" value="<?php echo $_SESSION[$userEdite]["name"] ?>" />
                        <small id="UserHelp" class="text-danger ms-3"><?php echo $fullNameErr; ?></small>
                    </div>
                    <div class="mb-3">
                        <label class="text-dangar" for="mobileNum" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="mobileNum" name="mobileNum" aria-describedby="mobileHelp" value="<?php echo $_SESSION[$userEdite]["mobile"] ?>">
                        <small id="numHelp" class="text-danger ms-3"><?php echo $mobileNumErr; ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="Dob" class="form-label">Date of birth</label>
                        <input type="date" class="form-control" id="Dob" name="Dob" aria-describedby="dateHelp" value="<?php echo $_SESSION[$userEdite]["date-of-birth"] ?>">
                        <small id="DobHelp" class="text-danger ms-3"><?php echo $dateErr; ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $_SESSION[$userEdite]["email"] ?>">
                        <small id="emailHelp" class="text-danger ms-3"><?php echo $emailErr; ?></small>
                    </div>

                    <button type="submit" name="edit_submit" class="btn btn-primary w-100 w-sm-100 pt-2 pb-2 rounded-pill mb-3 mt-5 h3 fw-bold" id="loginBtn">Update</button>
                </form>


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