<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230803133032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achat_produit (achat_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_C26FA378FE95D117 (achat_id), INDEX IDX_C26FA378F347EFB (produit_id), PRIMARY KEY(achat_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achat_produit ADD CONSTRAINT FK_C26FA378FE95D117 FOREIGN KEY (achat_id) REFERENCES achat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE achat_produit ADD CONSTRAINT FK_C26FA378F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A98456F347EFB');
        $this->addSql('DROP INDEX IDX_26A98456F347EFB ON achat');
        $this->addSql('ALTER TABLE achat DROP produit_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achat_produit DROP FOREIGN KEY FK_C26FA378FE95D117');
        $this->addSql('ALTER TABLE achat_produit DROP FOREIGN KEY FK_C26FA378F347EFB');
        $this->addSql('DROP TABLE achat_produit');
        $this->addSql('ALTER TABLE achat ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A98456F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_26A98456F347EFB ON achat (produit_id)');
    }
}
