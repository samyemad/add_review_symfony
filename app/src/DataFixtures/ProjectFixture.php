<?php

namespace App\DataFixtures;

use App\Entity\Construction\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Construction\Vico;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class ProjectFixture extends Fixture implements FixtureGroupInterface
{
    /**
     *
     * load Project Fixture and Insert It to Our system
     * @param ObjectManager $manager
     *
     */
    public function load(ObjectManager $manager)
    {
        $dateTime = new \DateTime('NOW');
        /* add vico item  */
        $vico = new Vico();
        $vico->setName('Circle Design');
        $vico->setCreated($dateTime);
        /* add project item  */
        $project= new Project();
        $project->setTitle('Build A Site With Appointment');
        $project->setCreated($dateTime);
        $vico->addProject($project);
        $manager->persist($vico);
        $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['projects'];
    }
}
