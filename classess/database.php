<?php
 
class database{
    function opencon(): PDO{
        return new PDO(
            dsn: 'mysql:host=localhost;dbname=dbs_app_v2',
            username: 'root',
            password: '');
    }
    function signupUser($firstname, $lastname, $username, $password){
        $con = $this->opencon();
        try{
            $con->beginTransaction();
 
            $stmt = $con->prepare("INSERT INTO Admin (admin_FN, admin_LN, admin_username, admin_password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$firstname, $lastname, $username, $password]);
            $userID = $con->lastInsertID();
            $con->commit();
            return $userID;
        } catch (PDOException $e) {
            $con->rollback();
            return false;
        }
 
    }
}