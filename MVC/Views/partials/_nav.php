<?php

require_once 'Misc/Helper.php';
require_once 'Misc/Routes.php';

use Misc\Helper;
use Misc\Routes;

Helper::sessionSuru();
?>
<nav class="navbar">
    <a href="<?= Routes::BASE . Routes::HOME ?>" class="nav-link">Home</a>
    <a href="<?= Routes::BASE . Routes::ABOUT ?>" class="nav-link">About Us</a>
    <a href="<?= Routes::BASE . Routes::CUSTOMERS ?>" class="nav-link">All customers</a>
    <?php
    if (isset($_SESSION['isLoggedIn'])) { ?>
        <a href="<?= Routes::BASE . Routes::PROFILE ?>" class="nav-link">Profile</a>
        <a href="<?= Routes::BASE . Routes::LOGOUT ?>" class="nav-link">Logout</a>
        <?php
    } else { ?>
        <a href="<?= Routes::BASE . Routes::LOGIN ?>" class="nav-link">Login</a>
        <a href="<?= Routes::BASE . Routes::REGISTER ?>" class="nav-link">Register</a>
        <?php
    }
    ?>
</nav>
