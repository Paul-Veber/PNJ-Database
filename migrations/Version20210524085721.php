<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210524085721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campaign (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, game VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, age INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, faction VARCHAR(255) NOT NULL, occupation VARCHAR(255) NOT NULL, INDEX IDX_937AB034F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, scenario_id INT DEFAULT NULL, campaign_id INT DEFAULT NULL, character_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_CFBDFA14E04E49DF (scenario_id), INDEX IDX_CFBDFA14F639F774 (campaign_id), INDEX IDX_CFBDFA141136BE75 (character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, character_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_98197A651136BE75 (character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relation (id INT AUTO_INCREMENT NOT NULL, character1_id INT DEFAULT NULL, character2_id INT DEFAULT NULL, score INT NOT NULL, type VARCHAR(255) NOT NULL, note LONGTEXT NOT NULL, INDEX IDX_62894749F6129E9E (character1_id), INDEX IDX_62894749E4A73170 (character2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_3E45C8D8F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14E04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA141136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A651136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE relation ADD CONSTRAINT FK_62894749F6129E9E FOREIGN KEY (character1_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE relation ADD CONSTRAINT FK_62894749E4A73170 FOREIGN KEY (character2_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034F639F774');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14F639F774');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8F639F774');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA141136BE75');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A651136BE75');
        $this->addSql('ALTER TABLE relation DROP FOREIGN KEY FK_62894749F6129E9E');
        $this->addSql('ALTER TABLE relation DROP FOREIGN KEY FK_62894749E4A73170');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14E04E49DF');
        $this->addSql('DROP TABLE campaign');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE relation');
        $this->addSql('DROP TABLE scenario');
    }
}
