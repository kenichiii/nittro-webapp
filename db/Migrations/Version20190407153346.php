<?php

declare(strict_types=1);

namespace Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190407153346 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysqll\'.');


        $this->addSql("CREATE TABLE `user` (
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`email` VARCHAR(255) NULL DEFAULT NULL,
		`name` VARCHAR(255) NULL DEFAULT NULL,
		`photo` VARCHAR(255) NULL DEFAULT NULL,
		`phone` VARCHAR(255) NULL DEFAULT NULL,
		`password` VARCHAR(255) NULL DEFAULT NULL,
		`active` TINYINT(4) NULL DEFAULT '0',
		`roles` TEXT NULL DEFAULT NULL,
		`role` VARCHAR(255) NULL DEFAULT NULL,
		`forgottenpasswordtoken` VARCHAR(255) NULL DEFAULT NULL,
		`forgottenpasswordtokenexpiration` INT(11) NULL DEFAULT NULL,
		`deleted` TINYINT(4) NOT NULL DEFAULT '0',
		PRIMARY KEY (`id`),
		UNIQUE INDEX `uni-email` (`email`),
		INDEX `key-active` (`active`),
		INDEX `key-deleted` (`deleted`)
		)");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `user`');
    }
}
