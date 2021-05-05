<?php

namespace coursegator\classes;

class Db
{
    private $conn;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$this->conn) {
            die('Connection Failed :' . mysqli_connect_error());
        }
    }

    function insert($table, $fields, $values)
    {
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        $result = mysqli_query($this->conn, $sql);

        return $result;
    }
    function update($table, $set, $condition)
    {
        $sql = "UPDATE $table SET $set WHERE $condition ";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    function delete($table, $condition)
    {
        $sql = "DELETE from $table WHERE $condition";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }


    function select($fields, $table, $other = null)
    {
        $sql = "SELECT $fields FROM $table";
        if ($other != null) {
            $sql .= "$other";
        }

        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            $rows = [];
        }
        return $rows;
    }


    function selectOne($fields, $table, $other = null)
    {

        $sql = "SELECT $fields  FROM   $table ";

        if ($other !== null) {
            $sql .= "$other";
        }

        //  $sql .= "LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        } else {
            $row = [];
        }

        return  $row;
    }

    function selectJoin($fields, $tables, $on, $other = null)
    {

        $sql = "SELECT $fields  FROM   $tables  ON $on";

        if ($other !== null) {
            $sql .= "$other";
        }
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {

            $rows = [];
        }

        return  $rows;
    }


    function selectJoinOne($fields, $table, $on, $other = null)
    {

        $sql = "SELECT $fields  FROM   $table ON $on ";

        if ($other !== null) {
            $sql .= "$other";
        }

        //  $sql .= "LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        } else {
            $row = [];
        }

        return  $row;
    }



    public function __destruct()
    {
        mysqli_close($this->conn);
    }

    public function  getConn()
    {
        return $this->conn;
    }
}
