<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220527151851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD private_coahing_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455C555D586 FOREIGN KEY (private_coahing_id) REFERENCES private_coaching (id)');
        $this->addSql('CREATE INDEX IDX_C7440455C555D586 ON client (private_coahing_id)');
        $this->addSql('ALTER TABLE membership CHANGE price price NUMERIC(4, 2) NOT NULL');
        $this->addSql('ALTER TABLE private_coaching DROP FOREIGN KEY FK_6D28D7633C105691');
        $this->addSql('DROP INDEX IDX_6D28D7633C105691 ON private_coaching');
        $this->addSql('DROP INDEX IDX_6D28D76319EB6921 ON private_coaching');
        $this->addSql('ALTER TABLE private_coaching DROP coach_id, DROP client_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455C555D586');
        $this->addSql('DROP INDEX IDX_C7440455C555D586 ON client');
        $this->addSql('ALTER TABLE client DROP private_coahing_id');
        $this->addSql('ALTER TABLE membership CHANGE price price NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE private_coaching ADD coach_id INT DEFAULT NULL, ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE private_coaching ADD CONSTRAINT FK_6D28D7633C105691 FOREIGN KEY (coach_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6D28D7633C105691 ON private_coaching (coach_id)');
        $this->addSql('CREATE INDEX IDX_6D28D76319EB6921 ON private_coaching (client_id)');
    }
}
