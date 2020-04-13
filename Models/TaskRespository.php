<?php
namespace Models;

//use Models\Task;

class TaskRespository
{
    public function add($model)
    {
        require_once "../bootstrap.php";
        $task = new Task();
        $task->setTitle($model['title']);
        $task->setDescription($model['description']);
        $entity_manager->persist($task);
        $entity_manager->flush();
    }

    public function update($model)
    {
        require "../bootstrap.php";
        $task = $entity_manager->find("Models\Task", $model['id']);

        if ($task === null) {
            echo "Task ".$model['id']." does not exist.\n";
            exit(1);
        }

        $task->setTitle($model['title']);
        $task->setDescription($model['description']);
        $entity_manager->flush();
    }

    public function get($id)
    {
        require "../bootstrap.php";
        $task = $entity_manager->find("Models\Task", $id);
        return $task;
    }

    public function getAll()
    {
        require_once "../bootstrap.php";
        $records = $entity_manager->getRepository("Models\Task")->findAll();
        return $records;
    }

    public function delete($model)
    {
        require "../bootstrap.php";
        $task = $entity_manager->find("Models\Task", $model[id]);
        $entity_manager->remove($task);
        $entity_manager->flush();
    }
}
