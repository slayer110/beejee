<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{

    public function loginAction()
    {
        $login = '';
        $pass = '';
        $note='';
        if (isset($_GET['login']) && isset($_GET['pass'])) {
            $login = $_GET['login'];
            $pass = $_GET['pass'];
//            var_dump([$login,$pass]);
            if ($login == 'admin' && $pass == '123') {

                $_SESSION['login'] = 'admin';
                header('Location: /');
                exit();
            } else {
                $note='<p class="error">Неверно введён логин или пароль</p>';
            }
        }
        $this->view->render('Вход', ['status' => $note,'login'=>$login,'pass'=>$pass]);
    }

    public function exitAction()
    {


        unset($_SESSION['login']);
        session_destroy();
        header('Location: /');
        exit();
    }


}
