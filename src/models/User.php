<?php

namespace App\Models;

use App\Core\Model;
use PDO;
use PDOException;
use Exception;

class User  extends Model
{
    public function createUser(string $username, string $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function userExists(string $username)
    {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = :username");

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function verifyUser(string $username, string $password)
    {
        $stmt = $this->db->prepare("SELECT password FROM users WHERE username = :username");

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result && password_verify($password, $result['password']);
    }

    public function getAllUsers()
    {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateRoleUser($id, $data)
    {
        try {
            $stmt = $this->db->prepare("
                UPDATE users 
                SET 
                    updated_at = :updated_at, 
                    role = :role 
                WHERE 
                    id = :id
            ");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $currentTimestamp = date('Y-m-d H:i:s');
            $stmt->bindParam(':updated_at', $currentTimestamp);
            $stmt->bindParam(':role', $data['role'], PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception('Error updating user: ' . $e->getMessage());
        }
    }

    public function deleteUser($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception('Error deleting user: ' . $e->getMessage());
        }
    }

    public function getTotalUsers()
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM users");
        return $stmt->fetchColumn();
    }
}
