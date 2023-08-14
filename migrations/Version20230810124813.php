<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230810124813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_cible (produit_id INT NOT NULL, cible_id INT NOT NULL, INDEX IDX_D1C18BAFF347EFB (produit_id), INDEX IDX_D1C18BAFA96E5E09 (cible_id), PRIMARY KEY(produit_id, cible_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit_cible ADD CONSTRAINT FK_D1C18BAFF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_cible ADD CONSTRAINT FK_D1C18BAFA96E5E09 FOREIGN KEY (cible_id) REFERENCES cible (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_cible DROP FOREIGN KEY FK_D1C18BAFF347EFB');
        $this->addSql('ALTER TABLE produit_cible DROP FOREIGN KEY FK_D1C18BAFA96E5E09');
        $this->addSql('DROP TABLE produit_cible');
    }
}
