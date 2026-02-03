<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class AuthController
{
    public function index()
    {
        return view('site/login');
    }

    public function login() {
        if(isset($_POST["email"]) && isset($_POST["password"])) {
            $logged = App::get('database')->check('users', $_POST["email"], $_POST["password"]);
    
            if (!empty($logged)) {
                $_SESSION['auth'] = $logged;
                $_SESSION['login'] = true;
                $_SESSION['email'] = $_POST["email"];
    
                header('Location: /area-administrativa');
                exit;
            } else {
                $message = "Email ou senha incorretos!";
                return view('site/login', ['message' => $message]);
            }
        } else {
            header('Location: /login');
            exit;
        }
    }
    
    public function logout()
    {
        session_start();

        unset($_SESSION['email']);
        unset($_SESSION['login']);
        
        header('Location: /');
    }
}

?>