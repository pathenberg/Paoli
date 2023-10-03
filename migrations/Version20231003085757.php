<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231003085757 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE wishlist_item DROP FOREIGN KEY FK_6424F4E8CD11A2CF');
        $this->addSql('ALTER TABLE wishlist_item DROP FOREIGN KEY FK_6424F4E8FB8E54CD');
        $this->addSql('DROP INDEX IDX_6424F4E8FB8E54CD ON wishlist_item');
        $this->addSql('DROP INDEX IDX_6424F4E8CD11A2CF ON wishlist_item');
        $this->addSql('ALTER TABLE wishlist_item ADD product_id INT NOT NULL, ADD order_ref_id INT NOT NULL, DROP produits_id, DROP wishlist_id');
        $this->addSql('ALTER TABLE wishlist_item ADD CONSTRAINT FK_6424F4E84584665A FOREIGN KEY (product_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE wishlist_item ADD CONSTRAINT FK_6424F4E8E238517C FOREIGN KEY (order_ref_id) REFERENCES wishlist (id)');
        $this->addSql('CREATE INDEX IDX_6424F4E84584665A ON wishlist_item (product_id)');
        $this->addSql('CREATE INDEX IDX_6424F4E8E238517C ON wishlist_item (order_ref_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP nom');
        $this->addSql('ALTER TABLE wishlist_item DROP FOREIGN KEY FK_6424F4E84584665A');
        $this->addSql('ALTER TABLE wishlist_item DROP FOREIGN KEY FK_6424F4E8E238517C');
        $this->addSql('DROP INDEX IDX_6424F4E84584665A ON wishlist_item');
        $this->addSql('DROP INDEX IDX_6424F4E8E238517C ON wishlist_item');
        $this->addSql('ALTER TABLE wishlist_item ADD produits_id INT DEFAULT NULL, ADD wishlist_id INT DEFAULT NULL, DROP product_id, DROP order_ref_id');
        $this->addSql('ALTER TABLE wishlist_item ADD CONSTRAINT FK_6424F4E8CD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE wishlist_item ADD CONSTRAINT FK_6424F4E8FB8E54CD FOREIGN KEY (wishlist_id) REFERENCES wishlist (id)');
        $this->addSql('CREATE INDEX IDX_6424F4E8FB8E54CD ON wishlist_item (wishlist_id)');
        $this->addSql('CREATE INDEX IDX_6424F4E8CD11A2CF ON wishlist_item (produits_id)');
    }
}
