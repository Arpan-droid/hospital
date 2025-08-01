<?php
session_start();

function checkLogin($role = null) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../../public/index.php");
        exit;
    }

    if ($role && $_SESSION['role'] != $role) {
        header("Location: ../../public/index.php");
        exit;
    }
}
