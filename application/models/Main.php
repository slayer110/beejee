<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{

    public function getTasks($order, $page)
    {
        $names = [];
        $num = 3;
        $art = ($page * $num) - $num;
        $result = $this->db->row("SELECT id, task, email,user,status,editionable FROM tasks ORDER BY " . $order['field'] . " " . $order['type'] . " " . "LIMIT" . " " . $art . "," . $num);
        $countOfRecords = $this->db->row("SELECT COUNT(*) FROM tasks");
        $arr = ['result' => $result, 'count' => $countOfRecords[0]["COUNT(*)"]];
        return $arr;
    }

    public function getTask($id)
    {
        $result = $this->db->row("SELECT id, task, email,user,status FROM tasks WHERE id=$id");
        return $result[0];
    }

    public function addTask($user, $email, $task, $status)
    {
        $result = $this->db->query('INSERT INTO `tasks` SET `task` = :task, `email` = :email,`user`=:user, `status`=:status', ['task' => $task, 'email' => $email, 'user' => $user, 'status' => $status]);
        return $result;
    }

    public function editTask($user, $email, $task, $id, $status,$edited)
    {
        $result = $this->db->query('UPDATE `tasks` SET `task`=:task,`email`=:email,`status`=:status, `user`=:user,`editionable`=:edited WHERE `id`=:id', ['task' => $task, 'email' => $email, 'user' => $user, 'status' => $status, 'id' => $id,'edited'=>$edited]);
        return $result;
    }
}
