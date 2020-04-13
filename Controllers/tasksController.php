<?php
namespace Controllers;

use Core\Controller;
use Models\TaskRespository;

class tasksController extends Controller
{
    function index()
    {
        $tasks = new TaskRespository();
        $tasks = $tasks->getAll();
        $ar = [];
        foreach ($tasks as $task) {
            $ar1['id'] = $task->getId();
            $ar1['title'] = $task->getTitle();
            $ar1['description'] = $task->getDescription();
            $ar[] = $ar1;
        }
        $d['tasks'] = $ar;
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            $task= new TaskRespository();
            $model = [
                'title' => $_POST["title"],
                'description' => $_POST["description"]
            ];
            $task->add($model);
            header("Location: " . WEBROOT . "tasks/index");
        }
        $this->render("create");
    }

    function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $task= new TaskRespository();
            $item = $task->get($id);
            $d["task"]['id'] = $item->getId();
            $d["task"]['title'] = $item->getTitle();
            $d["task"]['description'] = $item->getDescription();
            if (isset($_POST["title"])) {
                $model = [
                    "id" => $id,
                    "title" => $_POST["title"],
                    "description" => $_POST["description"]
                ];
                $task->update($model);
                header("Location: " . WEBROOT . "tasks/index");
            }
            $this->set($d);
            $this->render("edit");
        } else {
            echo "Page not found";
        }
    }

    function delete()
    {
        if (isset($_GET['id'])) {
            $model['id'] = $_GET['id'];

            $task = new TaskRespository();
            $task->delete($model);
            header("Location: " . WEBROOT . "tasks/index");
        } else {
            echo "Page not found";
        }
    }
}
