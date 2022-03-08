<?php
namespace Database;


class DBWrapper
{
    private $pdo;
    public $table_name;

    public function __construct($table_name)
    {
        $this->pdo = DBConnect::connect();
        $this->table_name = $table_name;
    }

    public function selectAll()
    {
        $query = $this->pdo->query("select * from " . $this->table_name);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectForPagination($numberPerPage,$offset)
    {
        $query = $this->pdo->query("select * from ". $this->table_name . " limit $numberPerPage offset $offset");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}