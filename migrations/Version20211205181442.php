<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205181442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE character_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE classe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE item_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE item_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE race_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE skill_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE statistique_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE character (id INT NOT NULL, owner_id INT NOT NULL, race_id INT NOT NULL, classe_id INT NOT NULL, name VARCHAR(255) NOT NULL, sexe VARCHAR(1) DEFAULT NULL, age INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_937AB0347E3C61F9 ON character (owner_id)');
        $this->addSql('CREATE INDEX IDX_937AB0346E59D40D ON character (race_id)');
        $this->addSql('CREATE INDEX IDX_937AB0348F5EA509 ON character (classe_id)');
        $this->addSql('CREATE TABLE character_skill (character_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(character_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_A0FE03151136BE75 ON character_skill (character_id)');
        $this->addSql('CREATE INDEX IDX_A0FE03155585C142 ON character_skill (skill_id)');
        $this->addSql('CREATE TABLE character_item (character_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(character_id, item_id))');
        $this->addSql('CREATE INDEX IDX_8E731861136BE75 ON character_item (character_id)');
        $this->addSql('CREATE INDEX IDX_8E73186126F525E ON character_item (item_id)');
        $this->addSql('CREATE TABLE classe (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE classe_skill (classe_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(classe_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_174AB04F8F5EA509 ON classe_skill (classe_id)');
        $this->addSql('CREATE INDEX IDX_174AB04F5585C142 ON classe_skill (skill_id)');
        $this->addSql('CREATE TABLE item (id INT NOT NULL, type_id INT NOT NULL, statistique_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1F1B251EC54C8C93 ON item (type_id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E76A81463 ON item (statistique_id)');
        $this->addSql('CREATE TABLE item_type (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE race (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE race_skill (race_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(race_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_B803C5666E59D40D ON race_skill (race_id)');
        $this->addSql('CREATE INDEX IDX_B803C5665585C142 ON race_skill (skill_id)');
        $this->addSql('CREATE TABLE skill (id INT NOT NULL, statistique_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5E3DE47776A81463 ON skill (statistique_id)');
        $this->addSql('CREATE TABLE statistique (id INT NOT NULL, operator VARCHAR(1) NOT NULL, value DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('ALTER TABLE character ADD CONSTRAINT FK_937AB0347E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character ADD CONSTRAINT FK_937AB0346E59D40D FOREIGN KEY (race_id) REFERENCES race (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character ADD CONSTRAINT FK_937AB0348F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_skill ADD CONSTRAINT FK_A0FE03151136BE75 FOREIGN KEY (character_id) REFERENCES character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_skill ADD CONSTRAINT FK_A0FE03155585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT FK_8E731861136BE75 FOREIGN KEY (character_id) REFERENCES character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT FK_8E73186126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classe_skill ADD CONSTRAINT FK_174AB04F8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classe_skill ADD CONSTRAINT FK_174AB04F5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EC54C8C93 FOREIGN KEY (type_id) REFERENCES item_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E76A81463 FOREIGN KEY (statistique_id) REFERENCES statistique (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE race_skill ADD CONSTRAINT FK_B803C5666E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE race_skill ADD CONSTRAINT FK_B803C5665585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE47776A81463 FOREIGN KEY (statistique_id) REFERENCES statistique (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
	}

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE character_skill DROP CONSTRAINT FK_A0FE03151136BE75');
        $this->addSql('ALTER TABLE character_item DROP CONSTRAINT FK_8E731861136BE75');
        $this->addSql('ALTER TABLE character DROP CONSTRAINT FK_937AB0348F5EA509');
        $this->addSql('ALTER TABLE classe_skill DROP CONSTRAINT FK_174AB04F8F5EA509');
        $this->addSql('ALTER TABLE character_item DROP CONSTRAINT FK_8E73186126F525E');
        $this->addSql('ALTER TABLE item DROP CONSTRAINT FK_1F1B251EC54C8C93');
        $this->addSql('ALTER TABLE character DROP CONSTRAINT FK_937AB0346E59D40D');
        $this->addSql('ALTER TABLE race_skill DROP CONSTRAINT FK_B803C5666E59D40D');
        $this->addSql('ALTER TABLE character_skill DROP CONSTRAINT FK_A0FE03155585C142');
        $this->addSql('ALTER TABLE classe_skill DROP CONSTRAINT FK_174AB04F5585C142');
        $this->addSql('ALTER TABLE race_skill DROP CONSTRAINT FK_B803C5665585C142');
        $this->addSql('ALTER TABLE item DROP CONSTRAINT FK_1F1B251E76A81463');
        $this->addSql('ALTER TABLE skill DROP CONSTRAINT FK_5E3DE47776A81463');
        $this->addSql('ALTER TABLE character DROP CONSTRAINT FK_937AB0347E3C61F9');
        $this->addSql('DROP SEQUENCE character_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE classe_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE item_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE item_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE race_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE skill_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE statistique_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE character');
        $this->addSql('DROP TABLE character_skill');
        $this->addSql('DROP TABLE character_item');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE classe_skill');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_type');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE race_skill');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE statistique');
        $this->addSql('DROP TABLE "user"');
    }
}
