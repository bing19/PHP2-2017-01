<?php

namespace App;

abstract class Model
{

    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function findOneById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        return $db->query($sql, [':id' => $id], static::class)[0];
    }

    public static function countAll()
    {
        $db = new Db();
        $sql = 'SELECT COUNT(*) AS num FROM ' . static::$table;
        return (int)$db->query($sql, [], static::class)[0]->num;
    }

    public function isNew()
    {
        return null === $this->id;
    }

    public function update()
    {
        if ($this->isNew()) {
            return false;
        }
        $sets = [];
        $data = [];
        foreach ($this as $key => $value) {
            $data[':' . $key] = $value;
            if ('id' == $key) {
                continue;
            }
            $sets[] = $key . '=:' . $key;
        }

        $db = new Db();
        $sql = 'UPDATE ' . static::$table . ' 
        SET ' . implode(',', $sets) . ' 
        WHERE id=:id';
        return $db->execute($sql, $data);
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return false;
        }
        $keys = [];
        $vals = [];
        $data = [];
        foreach ($this as $key => $value) {
            if ('id' == $key) {
                continue;
            }
            $data[':' . $key] = $value;
            $keys[] = $key;
            $vals[] = ':' . $key;
        }

        $db = new Db();
        $sql = 'INSERT INTO ' . static::$table . '
         (' . implode(',', $keys) . ')
         VALUES 
         (' . implode(',', $vals) . ')';
        $res = $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
        return $res;
    }

    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
        }
    }

}