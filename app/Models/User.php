<?php
namespace Models;

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

public function authenticate($email, $password) {
    $result = $this->db->exec('SELECT * FROM users WHERE email = ?', [$email]);
    if (!$result || count($result) === 0) {
        echo 'No user found with that email';
        return [false];
    }


    $storedPassword = $result[0]['password'];
    $userName = $result[0]['username'];
    if ($password === $storedPassword) {
        return [true, ['name' => $userName]];
    } else {
        echo 'Incorrect password' . ' '. $storedPassword;
        echo $userName;
        return [false];
    }

    // $hashedPassword = $result[0]['password'];
    // if (password_verify($password, $hashedPassword)) {
    //     echo 'Password is correct';
    //     return true;
    // } else {
    //     echo 'Incorrect password'. ' '. $hashedPassword;
    //     return false;
    // }
}


    public function create($name, $email, $password) {
        $this->db->exec('INSERT INTO users (username, email, password) VALUES (?, ?, ?)', [$name, $email, $password]);
    }
}
