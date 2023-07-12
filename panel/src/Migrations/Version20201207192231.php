<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201207192231 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE noticias ADD usuario_id INT NOT NULL, DROP id_temporada, DROP id_partido, DROP id_local, DROP id_visitante, DROP id_comunidad, DROP id_division, DROP id_usuario, DROP portada, DROP posicion, DROP usuario, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE fecha fecha DATETIME NOT NULL, CHANGE estado estado SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE noticias ADD CONSTRAINT FK_253D925DB38439E FOREIGN KEY (usuario_id) REFERENCES users (id)');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

    }
}
