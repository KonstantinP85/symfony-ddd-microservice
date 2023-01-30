<?php

namespace App\DataFixtures;

use App\Domain\Entity\Connection\BaseProfile;
use App\Domain\Entity\Connection\Ehd;
use App\Domain\Entity\ValueObject\AuthParams;
use App\Domain\Repository\Connection\ProfileRepositoryInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ConnectionProfileFixtures extends Fixture
{
    /**
     * @var string
     */
    private string  $ehdSystem;

    public function __construct(private readonly ProfileRepositoryInterface $profileRepository, string $ehdSystem)
    {
        $this->ehdSystem = $ehdSystem;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $connectionProfiles = [
            Ehd::class =>
                [
                    'name' => 'Ehd',
                    'url' => 'https://ehd.permkrai.ru',
                    'login' => null,
                    'password' => null,
                    'api_key' => null,
                    'additional_info' => [
                        'dictionary_action' => '/API2/dictionary/get',
                        'catalog_action' => '/API2/catalog/get',
                        'city_dictionary_id' => 131,
                        'station_catalog_id' => 7225,
                        'route_catalog_id' => 47646
                    ],
                    'headers' => ['ehd-system' => $this->ehdSystem],
                    'is_active' => true,
                ],
        ];

        foreach ($connectionProfiles as $className => $item) {
            if (is_null($this->profileRepository->findByProfile($className))) {

                $manager->persist(
                    new $className(
                        $item['name'],
                        $item['url'],
                        new AuthParams($item['login'], $item['password'], $item['api_key']),
                        $item['additional_info'],
                        $item['headers'],
                        $item['is_active']
                    )
                );
            }
        }

        $manager->flush();
    }
}