<?php

class Database {

    public static function getDB() {
        static $dbh = null;

        if ($dbh === null) {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->query("SET NAMES 'UTF8'");
        }

        return $dbh;
    }

    /**
     * Insert into a table
     * @param string $table Name of the table to insert into
     * @param array $data An associative array
     */
    public static function insert($table, $data) {
        ksort($data);
        
        $fieldNames = implode(", ", array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($fieldNames) VALUES ($fieldValues)";
        $query = Database::getDB()->prepare($sql);

        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }

        return $query->execute();
    }

    /**
     * 
     * @param string $sql SQL statement
     * @param array $data possible bind parameters
     * @return type sql query from which you can fetch with your desired fetch method
     */
    public static function select($sql, $data = array()) {
        $query = Database::getDB()->prepare($sql);

        foreach ($data as $key => $value) {
            $query->bindValue($key, $value);
        }

        $query->execute();

        return $query;
    }

    /**
     * Update table
     * @param string $table Name of the table to update
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public static function update($table, $data, $where, $whereValue) {
        ksort($data);

        $fieldDetails = null;
        foreach ($data as $key => $value) {
            $fieldDetails .= "$key = :$key, ";
        }
        // Remove the last , from the fieldDetails field
        $fieldDetails = rtrim($fieldDetails, ', ');

        $sql = "UPDATE $table SET $fieldDetails WHERE $where";
        $query = Database::getDB()->prepare($sql);

        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }
        $where = explode(' ', $where);
        $where = array_pop($where);
        $query->bindParam($where, $whereValue);

        return $query->execute();
    }
    
    public static function updateMul($table, $data, $where, $whereData) {
        ksort($data);
        ksort($whereData);

        $fieldDetails = null;
        foreach ($data as $key => $value) {
            $fieldDetails .= "$key = :$key, ";
        }
        // Remove the last , from the fieldDetails field
        $fieldDetails = rtrim($fieldDetails, ', ');

        $sql = "UPDATE $table SET $fieldDetails WHERE $where";
        $query = Database::getDB()->prepare($sql);

        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }
        
        foreach ($whereData as $key => $value) {
            $query->bindValue("$key", $value);
        }

        return $query->execute();
    }
    
}
