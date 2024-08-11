<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240811060524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("CREATE TABLE products (
            id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title varchar(255) NOT NULL,
            description longtext DEFAULT NULL,
            image varchar(255) DEFAULT NULL,
            price decimal(10,2) NOT NULL,
            create_date datetime NOT NULL
        )");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql("DROP TABLE products");
    }
}
