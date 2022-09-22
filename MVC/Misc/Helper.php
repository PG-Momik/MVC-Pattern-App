<?php

namespace MVC\Misc;

class Helper
{
    /**
     * @return void
     */
    public static function sessionSuru(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * @return void
     */
    public static function sessionFlash(): void
    {
        $class = $_SESSION['flashType'] ? "text-" . $_SESSION['flashType'] : '';
        $message = $_SESSION['flashMsg'] ?? '';
        echo "<small class='$class'>$message</small>";
        unset($_SESSION['flashMsg']);
        unset($_SESSION['flashType']);
    }
}
