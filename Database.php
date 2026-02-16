<?php

// Connect to database and execute a query.
class Database
{
    public PDO $connection;
    public false|PDOStatement $statement;

    public function __construct($config, $username = 'root', $password = '', $dbtype = 'mysql')
    {
        $dsn = $dbtype . ":" . http_build_query($config, '', ";"); // example.com?host='localhost'&port=3306&dbname=formyapp&charset=urf8mb4

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]); // php database object
    }

    public function query(string $query, array $params = []): self
    {
        // сказали объекту с помощью которого управляем ДБ приготовить query
        $this->statement = $this->connection->prepare($query);

        // сказали его исполнить
        $this->statement->execute($params);

        // вернули объект класса Database
        return $this;
    }

    public function find(): mixed
    {
        return $this->statement->fetch();
    }

    public function findAll(): array
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail(): array
    {
        $result = $this->find();

        if (!$result) {
            abort(Response::FORBIDDEN);
        }
        return $result;
    }

}