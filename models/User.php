<?php
class User
{
    static public function login($data)
    {
        $username = $data["username"];
        try {
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username" => $username));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
        } catch (PDOException $ex) {
            echo "error : " . $ex->getMessage();
        }
    }

    static public function createUser($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO users (fullname
        ,username,email,password) 
        VALUES (:fullname,:username,:email,:password)');
        $stmt->bindParam(':fullname', $data['fullname']);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        // $stmt->close();
        $stmt = null;
    }
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM users');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }
    static public function getUserById($data)
    {
        $stmt = DB::connect()->prepare('SELECT * FROM users WHERE user_id = :id');
        $stmt->bindParam(':id', $data['id']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    static public function deleteUser($data)
    {
        $stmt = DB::connect()->prepare('DELETE FROM users WHERE user_id = :id');
        $stmt->bindParam(':id', $data['id']);
}
}
