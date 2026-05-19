<?php
require_once'../app/core/App.php';
session_start();
    class middeleware{
        function checklogin(){
            if(!isset($_SESSION['username'])){
                header('Location:/home/login');
            }
        }
}