<!DOCTYPE html>
<html>
    <head>
        <title>Customers</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
              crossorigin="anonymous">
    </head>
    <?php
    include_once 'partials/_nav.php' ?>
    <body class="container text-center">
        <h1>All Customers</h1>
        <table class="table table-hover">
            <thead class="table-dark">
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </thead>
            <?php

            foreach ($datas as $index => $data) { ?>
                <tr>
                    <td><?= $data->name ?></td>
                    <td><?= $data->email ?></td>
                    <td><?= $data->address ?></td>
                    <td>
                        <form action="" method="GET">
                            <input type="hidden" name="id" value="<?= $data->id ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
            } ?>
        </table>

    </body>
</html> 
