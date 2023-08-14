<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230810131952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE service_cible (service_id INT NOT NULL, cible_id INT NOT NULL, INDEX IDX_482F01DCED5CA9E6 (service_id), INDEX IDX_482F01DCA96E5E09 (cible_id), PRIMARY KEY(service_id, cible_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE service_cible ADD CONSTRAINT FK_482F01DCED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_cible ADD CONSTRAINT FK_482F01DCA96E5E09 FOREIGN KEY (cible_id) REFERENCES cible (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service_cible DROP FOREIGN KEY FK_482F01DCED5CA9E6');
        $this->addSql('ALTER TABLE service_cible DROP FOREIGN KEY FK_482F01DCA96E5E09');
        $this->addSql('DROP TABLE service_cible');
    }
}
