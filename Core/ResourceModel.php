<?php
namespace Core;

use Config\Db;
use Core\ResourceModelInterface;
use PDO;

class ResourceModel implements ResourceModelInterface
{
    protected $table;
    protected $id;
    protected $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function save($model)
    {
        $attributes = "";
        $values = "";
        $ars = $model->getProperties();
        if ($model->getId() == null) {
            foreach ($ars as $ar => $va){
                if ($ar != $this->id) {
                    $attributes = $attributes.$ar.", ";
                    $values = $values.":".$ar.", ";
                }
            }
            $sql = "INSERT INTO ".$this->table." (".$attributes."created_at, updated_at) VALUES (".$values.":created_at, :updated_at)";
            $req = Db::getBdd()->prepare($sql);
            $params = [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            foreach ($ars as $ar => $va) {
                if ($ar != $this->id) {
                    $params[$ar] = $va;
                }
            }
            return $req->execute($params);
        } else {
            foreach ($ars as $ar => $va){
                if ($ar != $this->id) {
                    $attributes = $attributes.$ar." = :".$ar.", ";
                }
            }
            $sql = "UPDATE ".$this->table." SET ".$attributes."updated_at = :updated_at WHERE ".$this->id." = :id";

            $req = Db::getBdd()->prepare($sql);

            $params = [
                'updated_at' => date('Y-m-d H:i:s')
            ];

            foreach ($ars as $ar => $va){
                if ($ar != $this->id) {
                    $params[$ar] = $va;
                } else {
                    $params['id'] = $va;
                }
            }
            return $req->execute($params);
        }
    }

    public function delete($model)
    {
        $sql = 'DELETE FROM '.$this->table.' WHERE '.$this->id.' = ?';
        $req = Db::getBdd()->prepare($sql);
        return $req->execute([$model->getId()]);
    }

    public function get($id = null)
    {
        if ($id == null) {
            try {
                $db = Db::getBdd();
                $stmt = $db->query('SELECT * FROM '.$this->table);
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            $sql = "SELECT * FROM ".$this->table." WHERE ".$this->id." =" . $id;
            $req = Db::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetch();
        }
    }
}