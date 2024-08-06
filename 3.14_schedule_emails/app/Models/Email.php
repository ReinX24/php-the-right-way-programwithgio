<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use App\Enums\EmailStatus;
use Symfony\Component\Mime\Address;
use PDO;

class Email extends Model
{
    public function queue(
        Address $to,
        Address $from,
        string $subject,
        string $html,
        ?string $text = null
    ) {
        $stmt = $this->db->prepare(
            "INSERT INTO 
                emails (subject, status, html_body, text_body, meta, created_at)
            VALUES
                (:subject, :status, :html_body, :text_body, :meta, NOW())"
        );

        $meta["to"] = $to->toString();
        $meta["from"] = $from->toString();

        $stmt->bindValue(":subject", $subject);
        $stmt->bindValue(":status", EmailStatus::Queue->value);
        $stmt->bindValue(":html_body", $html);
        $stmt->bindValue(":text_body", $text);
        $stmt->bindValue(":meta", json_encode($meta));

        $stmt->execute();
    }

    public function getEmailByStatus(EmailStatus $status): array
    {
        $stmt = $this->db->prepare(
            "SELECT *
            FROM emails
            WHERE status = :status"
        );

        $stmt->bindValue(":status", $status->value);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function markEmailSent(int $id): void
    {
        $stmt = $this->db->prepare(
            "UPDATE emails
            SET status = :status, sent_at = NOW()
            WHERE id = :id"
        );

        $stmt->bindValue(":status", EmailStatus::Sent->value);
        $stmt->bindValue(":id", $id);

        $stmt->execute();
    }
}
