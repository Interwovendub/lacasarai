<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190628093309 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, gebruikersnaam VARCHAR(255) NOT NULL, wachtwoord VARCHAR(255) NOT NULL, rol VARCHAR(255) NOT NULL, banknummer VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE betaling (id INT AUTO_INCREMENT NOT NULL, betaal_nummer_id INT NOT NULL, betaal_methode VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4DD0001859DA66A (betaal_nummer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kamer (id INT AUTO_INCREMENT NOT NULL, kamer_nummer_id INT NOT NULL, kamer_naam VARCHAR(255) NOT NULL, kamer_beschrijving VARCHAR(255) NOT NULL, kamer_prijs VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4DD4F6A66A4A6101 (kamer_nummer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservering (id INT AUTO_INCREMENT NOT NULL, account_nummer_id INT NOT NULL, reserveringsnummer_id INT NOT NULL, aanmaak_datum DATE NOT NULL, aankomst_datum DATE NOT NULL, vertrek_datum DATE NOT NULL, kinderen VARCHAR(255) NOT NULL, volwassenen VARCHAR(255) NOT NULL, INDEX IDX_F2E439ACE38DB49E (account_nummer_id), UNIQUE INDEX UNIQ_F2E439AC1C87B23B (reserveringsnummer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seizoen (id INT AUTO_INCREMENT NOT NULL, begin_date VARCHAR(255) NOT NULL, end_date VARCHAR(255) NOT NULL, naam_seizoen VARCHAR(255) NOT NULL, korting VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tussen_tabel (id INT AUTO_INCREMENT NOT NULL, aantal VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE betaling ADD CONSTRAINT FK_4DD0001859DA66A FOREIGN KEY (betaal_nummer_id) REFERENCES reservering (id)');
        $this->addSql('ALTER TABLE kamer ADD CONSTRAINT FK_4DD4F6A66A4A6101 FOREIGN KEY (kamer_nummer_id) REFERENCES tussen_tabel (id)');
        $this->addSql('ALTER TABLE reservering ADD CONSTRAINT FK_F2E439ACE38DB49E FOREIGN KEY (account_nummer_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE reservering ADD CONSTRAINT FK_F2E439AC1C87B23B FOREIGN KEY (reserveringsnummer_id) REFERENCES tussen_tabel (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservering DROP FOREIGN KEY FK_F2E439ACE38DB49E');
        $this->addSql('ALTER TABLE betaling DROP FOREIGN KEY FK_4DD0001859DA66A');
        $this->addSql('ALTER TABLE kamer DROP FOREIGN KEY FK_4DD4F6A66A4A6101');
        $this->addSql('ALTER TABLE reservering DROP FOREIGN KEY FK_F2E439AC1C87B23B');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE betaling');
        $this->addSql('DROP TABLE kamer');
        $this->addSql('DROP TABLE reservering');
        $this->addSql('DROP TABLE seizoen');
        $this->addSql('DROP TABLE tussen_tabel');
    }
}
