<?php
function db_get_pdo() {
    $host = 'cloud.swdev.kr';
    $port = '4030';
    $dbname = 'community';
    $charset = 'utf8';
    $username = 'gosegu';
    $password = "dod54321##";

    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

    $pdo = new PDO($dsn, $username, $password);

    return $pdo;
}

function db_select($query, $param = array()) {
    $pdo = db_get_pdo();
    try {
        $st = $pdo->prepare($query);
        $st->execute($param);
        $result = $st->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        return $result;
    } catch (PDOException $ex) {
        return false;
    } finally {
        $pdo = null;
    }
}

function db_insert($query, $param = array()) {
    $pdo = db_get_pdo();
    try {
        $st = $pdo->prepare($query);
        $result = $st->execute($param);
        // $last_id = $pdo->lastInsertId();
        $pdo = null;
        if($result) {
            return $result;
        } else {
            return false;
        }
    } catch (PDOException $ex) {
        return false;
    } finally {
        $pdo = null;
    }
}

function db_update_delete($query, $param = array()) {
    $pdo = db_get_pdo();
    try {
        $st = $pdo->prepare($query);
        $result = $st->execute($param);
        $pdo = null;
        return $result;
    } catch (PDOException $ex) {
        return false;
    } finally {
        $pdo = null;
    }
}

?>