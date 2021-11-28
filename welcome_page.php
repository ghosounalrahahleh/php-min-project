<?php
// get the user name from the URL for welcoming statment 
$userEdite = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign UP</title>
</head>

<body>
    <div class="container wlcomeImg">
        <div class="row w-100 m-auto h-100">
            <div class="col-6 col-6 h-100 d-flex flex-column justify-content-center align-items-center m-auto p-5  mt-5">
               
                <div class="wlcome"><?php echo " welcome $userEdite" ?> </div>
            </div>
        </div>
    </div>

    <!-- js link -->
    <script src="./js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>