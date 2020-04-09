<?php
namespace Models;

use Core\ResourceModel;
use Config\Db;
use PDO;
use Models\TaskModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        $model = new TaskModel();
        $this->_init("tasks", "id", $model);
    }
}