<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240226213540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jeux_promotions (id INT AUTO_INCREMENT NOT NULL, jeux_video_id INT DEFAULT NULL, promotion_id INT DEFAULT NULL, INDEX IDX_9DD6936BCA8BBF (jeux_video_id), INDEX IDX_9DD6936B139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jeux_promotions ADD CONSTRAINT FK_9DD6936BCA8BBF FOREIGN KEY (jeux_video_id) REFERENCES JeuxVideo (id)');
        $this->addSql('ALTER TABLE jeux_promotions ADD CONSTRAINT FK_9DD6936B139DF194 FOREIGN KEY (promotion_id) REFERENCES promotions (id)');
        $this->addSql('ALTER TABLE client CHANGE photo photo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE menu CHANGE icon icon VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux_promotions DROP FOREIGN KEY FK_9DD6936BCA8BBF');
        $this->addSql('ALTER TABLE jeux_promotions DROP FOREIGN KEY FK_9DD6936B139DF194');
        $this->addSql('DROP TABLE jeux_promotions');
        $this->addSql('ALTER TABLE client CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE menu CHANGE icon icon VARCHAR(50) DEFAULT NULL');
    }
}
