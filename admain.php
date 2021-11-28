<?php
session_start();
 //get the user name 
$user = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <h2 class="text-center mt-5"><?php echo " welcome $user" ?></h2>
    <div class="row m-t-30 m-auto mt-5 w-100">
        <div class="col-md-11 m-auto">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40 m-auto">
                <table class="table table-borderless table-data3 table-dark table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Birth Date</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Sign UP Date</th>
                            <th>Login Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?Php
                        // print users information in rows 
                        foreach ($_SESSION as $key => $value) {
                            if (!$value == "") {
                                if ($key == "admin" || $key == "counter") {
                                } else { ?>
                                    <tr class=" table-light table-hover">
                                        <td> <?php echo @$value["name"]    ?></td>
                                        <td><?php echo @$value["mobile"] ?></td>
                                        <td><?php echo @$value["date-of-birth"] ?></td>
                                        <td><?php echo @$value["email"] ?></td>
                                        <td><?php echo @$value["password"] ?></td>
                                        <td><?php echo @$value["signup_date"] ?></td>
                                        <td><?php echo @$value["login_date"] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <form method="post" action="delete.php">
                                                    <input type="hidden" value="<?php echo $key ?>" name="delete-user">
                                                    <button type="submit" name="delete" class="delete-btn border-0 bg-transparent">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                                <a href="edit.php?id=<?php echo $key ?>"><button class="ms-1 border-0 bg-transparent"><i class="fas fa-edit"></i></button></a>
                                            </div>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
</body>

</html>