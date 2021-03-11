<?php

namespace SamplitsApp;

class UserController
{
    static function  goback()
    {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    function login() {
        if (isset($_POST["login"])) {
            /** @var User $user */
            $user = User::getOne(['email' => $_POST["login"]["email"]]);
            if ($user && $user->getHashedPassword() === md5($_POST["login"]["password"])) {
                $_SESSION["user_id"] = $user->getId();
                $_SESSION["user_role"] = !$user->getUserRole();
                $items = Item::get();
                $_SESSION['items'] = $items;  
                header("Location: /");
            } else {
                $_SESSION["error"] = "No such combination of login and password was found";
                self::goback();
            }

        } else {
            require_once "Views/login.php";
        }
        return null;
    }

    function logout() {
        $_SESSION["user_id"] = "";
        $_SESSION["user_role"] = "";
        session_destroy();
        header("Location: /login");
    }

    function register() {
        if (isset($_POST["register"])) {
            /** @var User $user */
            $user = User::getOne(['username' => $_POST["register"]["username"]]);
            if ($user) {
                $_SESSION["error"] = "session error";
                self::goback();
            }
            $user = User::getOne(['email' => $_POST["register"]["email"]]);
            if ($user) {
                $_SESSION["error"] = "session getone error";
                self::goback();
            }
            $user = new User();
            $user->saveAttributes($_POST["register"]);
            $user->setHashedPassword(md5($_POST["register"]['password']));
            // $user->setUserRole(1);
            $user->save();
            header("Location: /login");
        } else {
            require_once "Views/register.php";
        }
        return null;
    }

    function items() {
       require_once "Views/useritems.php";
    }
    function index() {
        if (isset($_POST["index"])) {
            /** @var User $user */
            $user = User::getOne(['id' => $_SESSION["user_id"]]);
            $user->saveAttributes($_POST["index"]);
            $user->setHashedPassword(md5($_POST["index"]['password']));
            $user->save();
            self::goback();
        } else {
             $items = Item::get();
                $_SESSION['items'] = $items; 
            require_once "Views/index.php";
        }
        return null;
    }
    
}