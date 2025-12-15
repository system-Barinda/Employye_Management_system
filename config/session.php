<?php
session_start([
    'cookie_httponly' => true,
    'cookie_secure'  => false, // set true if using HTTPS
    'use_strict_mode'=> true
]);

// Protect against session hijacking
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
}
