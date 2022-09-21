<?php

require_once 'Misc/Helper.php';
require_once 'Misc/Routes.php';

use Misc\Helper;
use Misc\Routes;

Helper::sessionSuru();

?>
<html>
    <head>
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
              crossorigin="anonymous">
    </head>

    <?php
    include_once 'partials/_nav.php' ?>
    <body class="container text-center">
        <h2>
            Register
        </h2>
        <?php
        Helper::sessionFlash(); ?>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form method="POST" action="<?= Routes::BASE . Routes::REGISTER ?>">
                    <input type="text" class="form-control" name="name">
                    <br>
                    <input type="email" class="form-control" name="email">
                    <br>
                    <input type="text" class="form-control" name="address">
                    <br>
                    <input type="password" class="form-control" name="password">
                    <br>
                    <input type="submit" class="form-control btn btn-primary" value="Register">
                </form>
                <div class="col-2"></div>
            </div>
        </div>
    </body>
    <?php
    include_once 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
            crossorigin="anonymous"></script>
</html>
