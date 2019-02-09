<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190209124117 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job CHANGE company_id company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE application CHANGE user_id user_id INT DEFAULT NULL, CHANGE job_id job_id INT DEFAULT NULL, CHANGE cv_id cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE company CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cv CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE education CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE cv_id cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE expererience CHANGE cv_id cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE language CHANGE cv_id cv_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE application CHANGE cv_id cv_id INT NOT NULL, CHANGE job_id job_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE company CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE cv CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE education CHANGE id id INT NOT NULL, CHANGE cv_id cv_id INT NOT NULL');
        $this->addSql('ALTER TABLE expererience CHANGE cv_id cv_id INT NOT NULL');
        $this->addSql('ALTER TABLE job CHANGE company_id company_id INT NOT NULL');
        $this->addSql('ALTER TABLE language CHANGE cv_id cv_id INT NOT NULL');
    }
}
