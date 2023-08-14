<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230811090249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2719EB6921');
        $this->addSql('DROP INDEX IDX_29A5EC2719EB6921 ON produit');
        $this->addSql('ALTER TABLE produit DROP client_id');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD219EB6921');
        $this->addSql('DROP INDEX IDX_E19D9AD219EB6921 ON service');
        $this->addSql('ALTER TABLE service DROP client_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD219EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E19D9AD219EB6921 ON service (client_id)');
        $this->addSql('ALTER TABLE produit ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2719EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_29A5EC2719EB6921 ON produit (client_id)');
    }
}