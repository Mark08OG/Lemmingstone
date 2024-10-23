<?php

class DB {
    private $pdo;

    function __construct() {
        $host = 'localhost';
        $port = '3306';
        $user = 'root';
        $pass = 'root';
        $db = 'lemmings';
        $connect = "mysql:host=$host;port=$port;dbname=$db;charset=utf8";
        //$this->pdo = new PDO($connect, $user, $pass);
    }

    public function __destruct() {
        $this->pdo = null;
    }

    // выполнить запрос без возвращения данных
    private function execute($sql, $params = []) {
        $sth = $this->pdo->prepare($sql);
        return $sth->execute($params);
    }

    // получение ОДНОЙ записи
    private function query($sql, $params = []) {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($params);
        return $sth->fetch(PDO::FETCH_OBJ);
    }

    // получение НЕСКОЛЬКИХ записей
    private function queryAll($sql, $params = []) {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserByLogin($login) {
        $user = new stdClass();
        $user->id = 1;
        $user->password = md5('vasya'.'111');
        $user->name = 'Vasya Pupkin';
        return $user;
        //return $this->query("SELECT * FROM users WHERE login=?", [$login]);
    }

    public function getUserByToken($token) {
        $user = new stdClass();
        $user->id = 1;
        return $user;
        //return $this->query("SELECT * FROM users WHERE token=?", [$token]);
    }

    public function updateToken($userId, $token) {
       //$this->execute("UPDATE users SET token=? WHERE id=?", [$token, $userId]);
    }

    public function registration($login, $password, $name) {
        $this->execute("INSERT INTO users (login,password,name) VALUES (?, ?, ?)",[$login, $hash, $name]);
    }

    public function changeName($userId, $name){
        //$this->execute("UPDATE users SET name=? WHERE id=?", [$name, $userId]);
        $user->name = $name;
        return $name;
    }

    public function getChatHash() {
        return $this->query("SELECT * FROM hashes WHERE id=1");
    }

    public function updateChatHash($hash) {
        $this->execute("UPDATE hashes SET chat_hash=? WHERE id=1", [$hash]);
    }

    public function addMessage($userId, $message) {
        $this->execute('INSERT INTO messages (user_id, message, created) VALUES (?,?, now())', [$userId, $message]);
    }

    public function getMessages() {
        return $this->queryAll("SELECT u.name AS author, m.message AS message,
                                to_char(m.created, 'yyyy-mm-dd hh24:mi:ss') AS created FROM messages as m 
                                LEFT JOIN users as u on u.id = m.user_id 
                                ORDER BY m.created DESC"
        );
    }

    public function getLemmings() {
        $lem1 = new stdClass();
        $lem1->id = 1;
        $lem1->name = 'Разведчик';
        $lem1->hp = 100;
        $lem1->speed = 3;
        $lem1->slots = 1;

        $lem2 = new stdClass();
        $lem2->id = 2;
        $lem2->name = 'Силач';
        $lem2->hp = 101;
        $lem2->speed = 1;
        $lem2->slots = 2;
        return [$lem1, $lem2];
    }

    public function setLemmingForUser($userId, $lemmingId) {
        return true;
    }
}