<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230918094242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits ADD small_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C3040A14D FOREIGN KEY (small_category_id) REFERENCES small_categories (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C3040A14D ON produits (small_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C3040A14D');
        $this->addSql('DROP INDEX IDX_BE2DDF8C3040A14D ON produits');
        $this->addSql('ALTER TABLE produits DROP small_category_id');
    }
}
