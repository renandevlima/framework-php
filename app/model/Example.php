<?php

namespace Model;

use Database\Connection;

class Example
{
    private $example;

    public function setExample($example)
    {
        $this->example = $example;
    }

    public function getExample()
    {
        return $this->example;
    }

    public function insert()
    {
        //put your insert method using Connection class, like example below
        $conn = Connection::getConn();
        $sql = "YOUR_SQL";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            if ($id = $conn->lastInsertId()) {
                return "Your return or whatever you want";
            }
        } else {
            throw new \Exception("Your error message");
        }
    }

    public function update()
    {
        //put your update method using Connection class, like example below
        $conn = Connection::getConn();
        $sql = "YOUR_SQL";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            if ($id = $conn->lastInsertId()) {
                return "Your return or whatever you want";
            }
        } else {
            throw new \Exception("Your error message");
        }
    }


    public function get()
    {
        //put your get method using Connection class, like example below
        $conn = Connection::getConn();
        $sql = "YOUR_SQL";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount()) {
            $result = $stmt->fetch();
            return $result;
        }
        throw new \Exception("Your error message");
    }
}
