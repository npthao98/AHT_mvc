<?php
namespace Controllers;

use Core\Controller;
use Models\TaskRespository;

class tasksController extends Controller
{
    function index()
    {
        $tasks = new TaskRespository();
        $d['tasks'] = $tasks->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            $task= new TaskRespository();
            $model = [
                'title' => $_POST["title"],
                'description' => $_POST["description"]
            ];

            if ($task->add($model))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $task= new TaskRespository();

            $d["task"] = $task->get($id);

            if (isset($_POST["title"]))
            {
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
