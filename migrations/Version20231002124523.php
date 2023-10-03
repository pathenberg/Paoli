<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231002124523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wishlist (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wishlist_item (id INT AUTO_INCREMENT NOT NULL, produits_id INT DEFAULT NULL, wishlist_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_6424F4E8CD11A2CF (produits_id), INDEX IDX_6424F4E8FB8E54CD (wishlist_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wishlist_item ADD CONSTRAINT FK_6424F4E8CD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE wishlist_item ADD CONSTRAINT FK_6424F4E8FB8E54CD FOREIGN KEY (wishlist_id) REFERENCES wishlist (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wishlist_item DROP FOREIGN KEY FK_6424F4E8CD11A2CF');
        $this->addSql('ALTER TABLE wishlist_item DROP FOREIGN KEY FK_6424F4E8FB8E54CD');
        $this->addSql('DROP TABLE wishlist');
        $this->addSql('DROP TABLE wishlist_item');
    }
}
