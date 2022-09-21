<?php

require_once 'Misc/Helper.php';

use Misc\Helper;

Helper::sessionSuru();


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
              crossorigin="anonymous">
    </head>

    <?php
    include_once 'partials/_nav.php' ?>
    <body class="container text-center">
        <h2>
            Name:<?= $data->name ?>
        </h2>
        <table class="table table-hover">
            <thead class="table-dark">
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
            </thead>
            <tr>
                <td><?= $data->name ?></td>
                <td><?= $data->email ?></td>
                <td><?= $data->address ?></td>
            </tr>
        </table>

    </body>
</html> 
