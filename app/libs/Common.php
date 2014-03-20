<?php

function getDB() {
    static $dbh = null;

    if ($dbh === null) {
        $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->query("SET NAMES 'UTF8'");
    }

    return $dbh;
}
