<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180901090355 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE template (id INT AUTO_INCREMENT NOT NULL, brand_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, html_code LONGTEXT NOT NULL, INDEX IDX_97601F8344F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, from_name VARCHAR(255) NOT NULL, from_email VARCHAR(255) NOT NULL, reply_to_email VARCHAR(255) NOT NULL, allowed_attachments_file_types VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, url_query_string VARCHAR(255) NOT NULL, campaign_sent_notifications TINYINT(1) NOT NULL, monthly_limit INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE campaign (id INT AUTO_INCREMENT NOT NULL, brand_id INT DEFAULT NULL, subject VARCHAR(255) NOT NULL, from_name VARCHAR(255) NOT NULL, from_email VARCHAR(255) NOT NULL, reply_to_email VARCHAR(255) NOT NULL, query_string VARCHAR(255) DEFAULT NULL, html_code LONGTEXT NOT NULL, track_opens TINYINT(1) DEFAULT NULL, track_clicks TINYINT(1) DEFAULT NULL, INDEX IDX_1F1512DD44F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE settings (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, timezone VARCHAR(255) DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, access_key_id VARCHAR(255) DEFAULT NULL, secret_access_key VARCHAR(255) DEFAULT NULL, ses_region VARCHAR(255) DEFAULT NULL, sending_rate INT DEFAULT NULL, system_api_key VARCHAR(255) DEFAULT NULL, api_credentials_profile VARCHAR(255) DEFAULT NULL, api_credentials_path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE template ADD CONSTRAINT FK_97601F8344F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE campaign ADD CONSTRAINT FK_1F1512DD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE template DROP FOREIGN KEY FK_97601F8344F5D008');
        $this->addSql('ALTER TABLE campaign DROP FOREIGN KEY FK_1F1512DD44F5D008');
        $this->addSql('DROP TABLE template');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE campaign');
        $this->addSql('DROP TABLE settings');
    }
}
