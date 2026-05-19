<?php

class auth {
    protected $user = [
        'admin' => 'admin123',
        'user1' => 'password1',
        'user2' => 'password2'
    ];

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username']; 
            $password = $_POST['password'];
            if (isset($this->user[$username]) && $this->user[$username] == $password) 
            {
               header('Location: /QLSV/public/home/index');
               exit;
            } else {
               header('Location: /QLSV/public/home/login');
               exit;
            }
        } 
    }
}
?>