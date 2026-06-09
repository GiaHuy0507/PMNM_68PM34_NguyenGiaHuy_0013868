<?php
require_once '../app/core/App.php';
class middleware
{
    function checklogin()
    {
        $publicPages = [
            '/PMNM_68PM4_NgoThiAiNhi_0020868/public/home/login',
            '/PMNM_68PM4_NgoThiAiNhi_0020868/public/auth/login'
        ];
        if (!isset($_SESSION['username']) && !in_array($_SERVER['REQUEST_URI'], $publicPages)) {
            header('Location: /QLSINHVIEN/public/home/login');
            exit();
        }
    }
}
?>