<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240304162337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE JeuxVideo (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, plateforme VARCHAR(50) NOT NULL, genre VARCHAR(50) NOT NULL, prix NUMERIC(10, 2) NOT NULL, stock NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse_livraison (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, adresse VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, code_postal INT DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, INDEX IDX_B0B09C919EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories_jeux (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, date_commande DATETIME NOT NULL, INDEX IDX_35D4282C19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_commande (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, jeux_video_id INT DEFAULT NULL, quantite INT NOT NULL, prix_unitaire NUMERIC(10, 2) NOT NULL, INDEX IDX_98344FA682EA2E54 (commande_id), INDEX IDX_98344FA6CA8BBF (jeux_video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluation (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, jeux_video_id INT DEFAULT NULL, note VARCHAR(40) DEFAULT NULL, commentaire VARCHAR(1000) DEFAULT NULL, date_evaluation DATETIME DEFAULT NULL, INDEX IDX_1323A57519EB6921 (client_id), INDEX IDX_1323A575CA8BBF (jeux_video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement_speciaux (id INT AUTO_INCREMENT NOT NULL, nom_evenement VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, date_debut DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux_categories (id INT AUTO_INCREMENT NOT NULL, jeux_video_id INT DEFAULT NULL, INDEX IDX_4D3EE537CA8BBF (jeux_video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux_evenement (id INT AUTO_INCREMENT NOT NULL, jeux_video_id INT DEFAULT NULL, evenement_speciaux_id INT DEFAULT NULL, INDEX IDX_C1B5A11FCA8BBF (jeux_video_id), INDEX IDX_C1B5A11FF8345B39 (evenement_speciaux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux_promotions (id INT AUTO_INCREMENT NOT NULL, jeux_video_id INT DEFAULT NULL, promotion_id INT DEFAULT NULL, INDEX IDX_9DD6936BCA8BBF (jeux_video_id), INDEX IDX_9DD6936B139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateformes (id INT AUTO_INCREMENT NOT NULL, nom_plateform VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotions (id INT AUTO_INCREMENT NOT NULL, nom_promotion VARCHAR(255) DEFAULT NULL, taux_reduction VARCHAR(20) DEFAULT NULL, date_debut DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, montant NUMERIC(10, 2) NOT NULL, date_transaction DATETIME NOT NULL, INDEX IDX_723705D119EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse_livraison ADD CONSTRAINT FK_B0B09C919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA682EA2E54 FOREIGN KEY (commande_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA6CA8BBF FOREIGN KEY (jeux_video_id) REFERENCES JeuxVideo (id)');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A57519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A575CA8BBF FOREIGN KEY (jeux_video_id) REFERENCES JeuxVideo (id)');
        $this->addSql('ALTER TABLE jeux_categories ADD CONSTRAINT FK_4D3EE537CA8BBF FOREIGN KEY (jeux_video_id) REFERENCES JeuxVideo (id)');
        $this->addSql('ALTER TABLE jeux_evenement ADD CONSTRAINT FK_C1B5A11FCA8BBF FOREIGN KEY (jeux_video_id) REFERENCES JeuxVideo (id)');
        $this->addSql('ALTER TABLE jeux_evenement ADD CONSTRAINT FK_C1B5A11FF8345B39 FOREIGN KEY (evenement_speciaux_id) REFERENCES evenement_speciaux (id)');
        $this->addSql('ALTER TABLE jeux_promotions ADD CONSTRAINT FK_9DD6936BCA8BBF FOREIGN KEY (jeux_video_id) REFERENCES JeuxVideo (id)');
        $this->addSql('ALTER TABLE jeux_promotions ADD CONSTRAINT FK_9DD6936B139DF194 FOREIGN KEY (promotion_id) REFERENCES promotions (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D119EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE client CHANGE photo photo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE menu CHANGE icon icon VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse_livraison DROP FOREIGN KEY FK_B0B09C919EB6921');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C19EB6921');
        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA682EA2E54');
        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA6CA8BBF');
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A57519EB6921');
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A575CA8BBF');
        $this->addSql('ALTER TABLE jeux_categories DROP FOREIGN KEY FK_4D3EE537CA8BBF');
        $this->addSql('ALTER TABLE jeux_evenement DROP FOREIGN KEY FK_C1B5A11FCA8BBF');
        $this->addSql('ALTER TABLE jeux_evenement DROP FOREIGN KEY FK_C1B5A11FF8345B39');
        $this->addSql('ALTER TABLE jeux_promotions DROP FOREIGN KEY FK_9DD6936BCA8BBF');
        $this->addSql('ALTER TABLE jeux_promotions DROP FOREIGN KEY FK_9DD6936B139DF194');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D119EB6921');
        $this->addSql('DROP TABLE JeuxVideo');
        $this->addSql('DROP TABLE adresse_livraison');
        $this->addSql('DROP TABLE categories_jeux');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE detail_commande');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE evaluation');
        $this->addSql('DROP TABLE evenement_speciaux');
        $this->addSql('DROP TABLE jeux_categories');
        $this->addSql('DROP TABLE jeux_evenement');
        $this->addSql('DROP TABLE jeux_promotions');
        $this->addSql('DROP TABLE plateformes');
        $this->addSql('DROP TABLE promotions');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('ALTER TABLE client CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE menu CHANGE icon icon VARCHAR(50) DEFAULT \'\'');
    }
}
