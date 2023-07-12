<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201207191607 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users_new_password (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, token VARCHAR(254) DEFAULT NULL, `generated` DATETIME NOT NULL, INDEX IDX_21EFECF5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noticias_temporada (noticias_id INT NOT NULL, temporada_id INT NOT NULL, INDEX IDX_8A11A55AFA5F3F21 (noticias_id), INDEX IDX_8A11A55A6E1CF8A8 (temporada_id), PRIMARY KEY(noticias_id, temporada_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noticias_partido (noticias_id INT NOT NULL, partido_id INT NOT NULL, INDEX IDX_452697EBFA5F3F21 (noticias_id), INDEX IDX_452697EB11856EB4 (partido_id), PRIMARY KEY(noticias_id, partido_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noticias_equipos (noticias_id INT NOT NULL, equipos_id INT NOT NULL, INDEX IDX_87476830FA5F3F21 (noticias_id), INDEX IDX_8747683039C8181B (equipos_id), PRIMARY KEY(noticias_id, equipos_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noticias_comunidad (noticias_id INT NOT NULL, comunidad_id INT NOT NULL, INDEX IDX_32133C96FA5F3F21 (noticias_id), INDEX IDX_32133C96B824C74B (comunidad_id), PRIMARY KEY(noticias_id, comunidad_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noticias_division (noticias_id INT NOT NULL, division_id INT NOT NULL, INDEX IDX_B016FA8EFA5F3F21 (noticias_id), INDEX IDX_B016FA8E41859289 (division_id), PRIMARY KEY(noticias_id, division_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipos (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_new_password ADD CONSTRAINT FK_21EFECF5A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE noticias_temporada ADD CONSTRAINT FK_8A11A55AFA5F3F21 FOREIGN KEY (noticias_id) REFERENCES noticias (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE noticias_temporada ADD CONSTRAINT FK_8A11A55A6E1CF8A8 FOREIGN KEY (temporada_id) REFERENCES temporada (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE noticias_partido ADD CONSTRAINT FK_452697EBFA5F3F21 FOREIGN KEY (noticias_id) REFERENCES noticias (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE noticias_partido ADD CONSTRAINT FK_452697EB11856EB4 FOREIGN KEY (partido_id) REFERENCES partido (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE noticias_equipos ADD CONSTRAINT FK_87476830FA5F3F21 FOREIGN KEY (noticias_id) REFERENCES noticias (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE noticias_equipos ADD CONSTRAINT FK_8747683039C8181B FOREIGN KEY (equipos_id) REFERENCES equipos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE noticias_comunidad ADD CONSTRAINT FK_32133C96FA5F3F21 FOREIGN KEY (noticias_id) REFERENCES noticias (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE noticias_comunidad ADD CONSTRAINT FK_32133C96B824C74B FOREIGN KEY (comunidad_id) REFERENCES comunidad (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE noticias_division ADD CONSTRAINT FK_B016FA8EFA5F3F21 FOREIGN KEY (noticias_id) REFERENCES noticias (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE noticias_division ADD CONSTRAINT FK_B016FA8E41859289 FOREIGN KEY (division_id) REFERENCES division (id) ON DELETE CASCADE');

        $this->addSql('ALTER TABLE noticias ADD CONSTRAINT FK_253D925DB38439E FOREIGN KEY (usuario_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_253D925DB38439E ON noticias (usuario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

    }
}
