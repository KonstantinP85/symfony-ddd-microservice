<?php

declare(strict_types=1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230123153245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE ehd_route ADD nsi_organization_id INT UNSIGNED DEFAULT NULL COMMENT \'Уникальный идентификатор организации в НСИ\', ADD nsi_partner_id INT UNSIGNED DEFAULT NULL COMMENT \'Уникальный идентификатор партнера в НСИ\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE ehd_route DROP nsi_organization_id, DROP nsi_partner_id');
    }
}
