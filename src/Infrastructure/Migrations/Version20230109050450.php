<?php

declare(strict_types=1);

namespace  App\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230109050450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE ehd_city (id INT UNSIGNED AUTO_INCREMENT NOT NULL COMMENT \'Уникальный идентификатор\', city_id INT UNSIGNED NOT NULL COMMENT \'Уникальный идентификатор в ЕХД\', name VARCHAR(255) NOT NULL COMMENT \'Название города\', nsi_city_id INT UNSIGNED DEFAULT NULL COMMENT \'Уникальный идентификатор в НСИ\', is_deleted TINYINT(1) NOT NULL COMMENT \'Признак удаления\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ehd_route (id INT UNSIGNED AUTO_INCREMENT NOT NULL COMMENT \'Уникальный идентификатор\', route_id INT UNSIGNED NOT NULL COMMENT \'Уникальный идентификатор в ЕХД\', transport_count INT UNSIGNED DEFAULT NULL COMMENT \'Общее количество всех транспортых средств на маршруте\', route_number VARCHAR(128) NOT NULL COMMENT \'Номер муниципального маршрута\', name VARCHAR(512) NOT NULL COMMENT \'Название маршрута\', direct_stop_name LONGTEXT DEFAULT NULL COMMENT \'Наименование остановочных пунктов в прямом направлении\', back_stop_name LONGTEXT DEFAULT NULL COMMENT \'Наименование остановочных пунктов в обратном направлении\', organization_name VARCHAR(512) NOT NULL COMMENT \'Название организации\', nsi_route_id INT UNSIGNED DEFAULT NULL COMMENT \'Уникальный идентификатор в НСИ\', is_deleted TINYINT(1) NOT NULL COMMENT \'Признак удаления\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ehd_station (id INT UNSIGNED AUTO_INCREMENT NOT NULL COMMENT \'Уникальный идентификатор\', ehd_city_id INT UNSIGNED DEFAULT NULL COMMENT \'Уникальный идентификатор\', station_id INT UNSIGNED NOT NULL COMMENT \'Уникальный идентификатор в ЕХД\', name VARCHAR(512) NOT NULL COMMENT \'Название станции\', transport_number VARCHAR(512) NOT NULL COMMENT \'Номера останавливающихся транспортных средств через точку с запятой\', address VARCHAR(512) NOT NULL COMMENT \'Адрес\', lng VARCHAR(128) NOT NULL COMMENT \'Долгота\', lat VARCHAR(128) NOT NULL COMMENT \'Широта\', nsi_station_id INT UNSIGNED DEFAULT NULL COMMENT \'Уникальный идентификатор в НСИ\', is_deleted TINYINT(1) NOT NULL COMMENT \'Признак удаления\', INDEX IDX_7E8D91F137D4301 (ehd_city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE integration_profiles (id INT UNSIGNED AUTO_INCREMENT NOT NULL COMMENT \'Уникальный идентификатор\', name VARCHAR(255) NOT NULL COMMENT \'Название подключения\', url VARCHAR(255) NOT NULL COMMENT \'Базовый URL\', headers JSON DEFAULT NULL COMMENT \'Необходимые заголовки\', additional_info JSON DEFAULT NULL COMMENT \'Дополнительная информация\', is_active TINYINT(1) NOT NULL COMMENT \'Активен или нет\', auth_params_login VARCHAR(255) DEFAULT NULL COMMENT \'Логин\', auth_params_password VARCHAR(255) DEFAULT NULL COMMENT \'Пароль\', auth_params_api_key VARCHAR(255) DEFAULT NULL COMMENT \'Апи ключ\', type VARCHAR(255) NOT NULL, UNIQUE INDEX name_unique (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ehd_station ADD CONSTRAINT FK_7E8D91F137D4301 FOREIGN KEY (ehd_city_id) REFERENCES ehd_city (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE ehd_station DROP FOREIGN KEY FK_7E8D91F137D4301');
        $this->addSql('DROP TABLE ehd_city');
        $this->addSql('DROP TABLE ehd_route');
        $this->addSql('DROP TABLE ehd_station');
        $this->addSql('DROP TABLE integration_profiles');
    }
}
