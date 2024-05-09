<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Atm</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div d-flex justify-content-center align-items-center min-vh-100>
        <div class="container text-primary my-custom-background"
            style="width:70%;margin-left: 186px;margin-right: 56px;margin-bottom: 57px;margin-top: 25px;">
            <div class="row" style="margin-bottom: -6px;margin-left: 97px;"></div>
            <div class="row" style="margin-left: 45px;margin-right: 60px;">
                <div class="col-md-6 col-lg-6"><span style="font-size: large; color: white; font-weight: bold; "
                        width="257" height="49">ATM | VBANK</span>
                </div>
                <div class="col-lg-6">                    

                    <div class="btn-group" style="width:140px;margin-left:200px;">
                        <?php
                        // session_start();
                        if (!empty($_SESSION['name'])) {
                            echo "<button style='width:170px;font-size:20px;' type='button' class='btn btn-primary'><span>" . $_SESSION['name']  . "</span></button>";

                        } else {
                            echo "<button type='button' class='btn btn-primary'><span>Username</span></button>";
                        }

                        ?>

                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            // session_start();
                            if (!empty($_SESSION['name'])) {
                                echo "<li><a class='dropdown-item' ><span>" . $_SESSION['name'] . "</span></a></li>";
                                if ($_SESSION['name'] == 'Admin') {
                                    echo "<li id='goadmin'><a class='dropdown-item' ><span>Admin Panel</a></li>";
                                }
                            } else {
                                echo " <li><a class='dropdown-item' ><span>Username</span></a></li>";
                            }
                            ?>

                            <li><a class="dropdown-item" href="index.php">Logout</a></li>

                        </ul>
                    </div>

                </div>
                <div class="row" style="margin-bottom: 40px;margin-left: 103px;">
                    <div class="col"></div>
                </div>
                <!-- // -->