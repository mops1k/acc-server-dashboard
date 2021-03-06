<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200313141751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add use ssl option';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'sqlite',
            'Migration can only be executed safely on \'sqlite\'.'
        );

        $this->addSql('ALTER TABLE ftp_server ADD COLUMN use_ssl BOOLEAN DEFAULT \'0\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'sqlite',
            'Migration can only be executed safely on \'sqlite\'.'
        );

        $this->addSql(
            'CREATE TEMPORARY TABLE __temp__ftp_server AS SELECT id, title, ip, port, username, password, path FROM ftp_server'
        );
        $this->addSql('DROP TABLE ftp_server');
        $this->addSql(
            'CREATE TABLE ftp_server (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, ip VARCHAR(255) NOT NULL, port INTEGER NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) DEFAULT NULL, path VARCHAR(255) DEFAULT NULL)'
        );
        $this->addSql(
            'INSERT INTO ftp_server (id, title, ip, port, username, password, path) SELECT id, title, ip, port, username, password, path FROM __temp__ftp_server'
        );
        $this->addSql('DROP TABLE __temp__ftp_server');
    }
}
