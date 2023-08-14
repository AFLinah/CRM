<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230811103048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_produit (client_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_7B98A85A19EB6921 (client_id), INDEX IDX_7B98A85AF347EFB (produit_id), PRIMARY KEY(client_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_service (client_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_B3A0DEAF19EB6921 (client_id), INDEX IDX_B3A0DEAFED5CA9E6 (service_id), PRIMARY KEY(client_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_produit ADD CONSTRAINT FK_7B98A85A19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_produit ADD CONSTRAINT FK_7B98A85AF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_service ADD CONSTRAINT FK_B3A0DEAF19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_service ADD CONSTRAINT FK_B3A0DEAFED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_produit DROP FOREIGN KEY FK_7B98A85A19EB6921');
        $this->addSql('ALTER TABLE client_produit DROP FOREIGN KEY FK_7B98A85AF347EFB');
        $this->addSql('ALTER TABLE client_service DROP FOREIGN KEY FK_B3A0DEAF19EB6921');
        $this->addSql('ALTER TABLE client_service DROP FOREIGN KEY FK_B3A0DEAFED5CA9E6');
        $this->addSql('DROP TABLE client_produit');
        $this->addSql('DROP TABLE client_service');
    }
}
