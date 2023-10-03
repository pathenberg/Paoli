<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231003094135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wishlist_item DROP FOREIGN KEY FK_6424F4E8E238517C');
        $this->addSql('DROP INDEX IDX_6424F4E8E238517C ON wishlist_item');
        $this->addSql('ALTER TABLE wishlist_item CHANGE order_ref_id order_id INT NOT NULL');
        $this->addSql('ALTER TABLE wishlist_item ADD CONSTRAINT FK_6424F4E88D9F6D38 FOREIGN KEY (order_id) REFERENCES wishlist (id)');
        $this->addSql('CREATE INDEX IDX_6424F4E88D9F6D38 ON wishlist_item (order_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wishlist_item DROP FOREIGN KEY FK_6424F4E88D9F6D38');
        $this->addSql('DROP INDEX IDX_6424F4E88D9F6D38 ON wishlist_item');
        $this->addSql('ALTER TABLE wishlist_item CHANGE order_id order_ref_id INT NOT NULL');
        $this->addSql('ALTER TABLE wishlist_item ADD CONSTRAINT FK_6424F4E8E238517C FOREIGN KEY (order_ref_id) REFERENCES wishlist (id)');
        $this->addSql('CREATE INDEX IDX_6424F4E8E238517C ON wishlist_item (order_ref_id)');
    }
}
