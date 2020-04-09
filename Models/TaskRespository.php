<?php
namespace Models;

use Config\Db;
use Models\TaskModel;
use Models\TaskResourceModel;
use PDO;

class TaskRespository
{
    public function add($model)
    {
        $task = new TaskModel();
        $task->setTitle($model['title']);
        $task->setDescription($model['description']);
        $taskRM = new TaskResourceModel();
        $taskRM->save($task);
    }

    public function update($model)
    {
        $task = new TaskModel();
        $task->setId($model['id']);
        $task->setTitle($model['title']);
        $task->setDescription($model['description']);
        $taskRM = new TaskResourceModel();
        $taskRM->save($task);
    }

    public function get($id)
    {
        $taskRM = new TaskResourceModel();
        $result = $taskRM->get($id);
        return $result;
    }

    public function getAll()
    {
        $taskRM = new TaskResourceModel();
        $result = $taskRM->get();
        return $result;
    }

    public function delete($model)
    {
        $task = new TaskModel();
        $task->setId($model['id']);
        $taskRM = new TaskResourceModel();
        $taskRM->delete($task);
    }
}
