<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class User extends Model
{
    public function create(
        string $email,
        string $name,
        bool $isActive = true
    ): int {
        $newUserStmt = $this->db->prepare(
            "INSERT INTO users (email, full_name, is_active, created_at)
                VALUES (:email, :full_name, :is_active, NOW())"
        );

        $newUserStmt->bindValue(":email", $email);
        $newUserStmt->bindValue(":full_name", $name);
        $newUserStmt->bindValue(":is_active", $isActive);

        $newUserStmt->execute();

        return (int) $this->db->lastInsertId();
    }
}
