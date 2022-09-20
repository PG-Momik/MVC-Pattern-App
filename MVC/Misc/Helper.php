<?php

function session_suru(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function session_flash(): void
{
    $class = $_SESSION['flashType']??'';
    $message = $_SESSION['flashMsg']??'';
    echo "<small class='text-$class'>$message</small>";
    unset($_SESSION['flashMsg']);
    unset($_SESSION['flashType']);
}