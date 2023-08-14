<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230810095644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cannaux_cible (cannaux_id INT NOT NULL, cible_id INT NOT NULL, INDEX IDX_68BE6CD349BBE0C2 (cannaux_id), INDEX IDX_68BE6CD3A96E5E09 (cible_id), PRIMARY KEY(cannaux_id, cible_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cannaux_cible ADD CONSTRAINT FK_68BE6CD349BBE0C2 FOREIGN KEY (cannaux_id) REFERENCES cannaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cannaux_cible ADD CONSTRAINT FK_68BE6CD3A96E5E09 FOREIGN KEY (cible_id) REFERENCES cible (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cannaux_cible DROP FOREIGN KEY FK_68BE6CD349BBE0C2');
        $this->addSql('ALTER TABLE cannaux_cible DROP FOREIGN KEY FK_68BE6CD3A96E5E09');
        $this->addSql('DROP TABLE cannaux_cible');
    }
}
