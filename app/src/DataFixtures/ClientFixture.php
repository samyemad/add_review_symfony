<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Client\Client;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class ClientFixture extends Fixture implements FixtureGroupInterface
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->encoder = $passwordEncoder;
    }

    /**
     *
     * load Client Fixture and Insert It to Our system
     * @param ObjectManager $manager
     *
     */
    public function load(ObjectManager $manager)
    {
        $client = new Client();
        $client->setUserName('samyemad4@gmail.com');
        $client->setApiToken('token');
        $client->setRoles(['ROLE_USER']);
        $client->setPassword($this->encoder->encodePassword(
            $client,
            '123456'
        ));
        $client->setFirstName('samy');
        $client->setLastName('emad');
        $manager->persist($client);
        $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['projects'];
    }
}
