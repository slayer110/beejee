<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {

        $page = 1;
        $order = ['field' => 'user', 'type' => 'ASC'];
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if (isset($_GET['field']) && $_GET['type']) {
            $order = ['field' => $_GET['field'], 'type' => $_GET['type']];
        }
        $arr = $this->model->getTasks($order, $page);
        $result = $arr['result'];
        $countOfRecords = $arr['count'];
        $countPages = ceil($countOfRecords / 3);
        $vars = [
            'countPages' => $countPages,
            'field' => $order['field'],
            'type' => $order['type'],
            'tasks' => $result
        ];
        $this->view->render('Главная страница', $vars);
    }

    public function addAction()
    {
        if (!empty($_POST['name']) and !empty($_POST['email']) and $_POST['task']) {
            $status = $_POST['status'];
            if ($status === 'true') {
                $status = 1;
            } else {
                $status = 0;
            }

            $result = $this->model->addTask($_POST['name'], $_POST['email'], $_POST['task'], $status);
            if ($result) {
                echo 'success';
                return true;
            } else {
                echo 'failed';
                return true;
            }
        }

        echo 'failed';
        return true;

    }

    public function editAction()
    {
        $edited = 0;
        $taskText = $_POST['task'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $status = $_POST['status'];
        $id = $_POST['id'];
        $task = $this->model->getTask($id);
        if ($taskText != $task['task']) {
            $edited = 1;
        }
        if ($status === 'true') {
            $status = 1;
        } else {
            $status = 0;
        }


        if (!isset($_SESSION['login']) || $_SESSION['login'] != 'admin') {
            echo 'user is not logged in';
            return false;
        }


        $result = $this->model->editTask($name, $email, $taskText, $id, $status, $edited);


        echo 'success';
        return true;
    }

}
