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

//    public static function save($model)
//    {
//        if ($model->getId() == null) {
//            $sql = "INSERT INTO tasks (title, description, created_at, updated_at) VALUES (:title, :description, :created_at, :updated_at)";
//
//            $req = Db::getBdd()->prepare($sql);
//
//            return $req->execute([
//                'title' => $model->getTitle(),
//                'description' => $model->getDescription(),
//                'created_at' => date('Y-m-d H:i:s'),
//                'updated_at' => date('Y-m-d H:i:s')
//
//            ]);
//        } else {
//            $sql = "UPDATE tasks SET title = :title, description = :description , updated_at = :updated_at WHERE id = :id";
//
//            $req = Db::getBdd()->prepare($sql);
//
//            return $req->execute([
//                'id' => $model->getId(),
//                'title' => $model->getTitle(),
//                'description' => $model->getDescription,
//                'updated_at' => date('Y-m-d H:i:s')
//
//            ]);
//        }
//    }

//    public function delete($model)
//    {
//        $sql = 'DELETE FROM tasks WHERE id = ?';
//        $req = Db::getBdd()->prepare($sql);
//        return $req->execute([$model->getId()]);
//    }

//    public function get($id = null)
//    {
//        if ($id == null) {
//            try {
//                $db = Db::getBdd();
//                $stmt = $db->query('SELECT * FROM tasks');
//                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//                return $results;
//
//            } catch (PDOException $e) {
//                echo $e->getMessage();
//            }
//        } else {
//            $sql = "SELECT * FROM tasks WHERE id =" . $id;
//            $req = Db::getBdd()->prepare($sql);
//            $req->execute();
//            return $req->fetch();
//        }
//    }
}