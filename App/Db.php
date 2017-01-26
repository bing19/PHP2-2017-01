<?php

namespace App;

use App\Exceptions\DbException;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $config = new Config();
        $dsn = 'mysql:host=localhost;dbname=' . $config->data['db']['dbname'];
        $user = $config->data['db']['user'];
        $password = $config->data['db']['password'];
        try {
            $this->dbh = new \PDO($dsn, $user, $password);
        } catch (\PDOException $e) {
            throw new DbException($e->getMessage());
        }
    }

    public function query($sql, $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (false === $res) {
            throw new \Exception('DB error in ' . $sql);
        }
        if (null === $class) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    public function execute($sql, $data = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}