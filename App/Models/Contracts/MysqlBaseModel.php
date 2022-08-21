<?php

namespace App\Models\Contracts;

use Medoo\Medoo;

class MysqlBaseModel extends BaseModel
{


    public function __construct()
    {

        // Connect the database.
        $this->connection = new Medoo([
            'type' => 'mysql',
            'host' => 'localhost',
            'database' => 'e_commerce',
            'username' => 'root',
            'password' => ''
        ]);

    }


    public function create(array $data): int
    {
        $this->connection->insert($this->table, $data);
        return 1;
    }


    public function find($id): object
    {
        $record = $this->connection->get($this->table, '*', [$this->primaryKey => $id]);
        return (object)$record;
    }
    public function get(): array
    {
        $record = $this->connection->select($this->table, '*');
        return $record;
    }


    public function update(array $data, array $where): int
    {
        return 1;
    }


    public function delete(array $where): int
    {
        return 1;
    }
}
