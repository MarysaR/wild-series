<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public const SEASONS = [

    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SEASONS as $key => $listSeason) {
            $season = new Season();
            $season->setNumber($listSeason['number']);
            $season->setYear(" ");
            $season->setDescription($listSeason['description']);
            $season->setProgram($this->getReference($listSeason['program_']));
            $manager->persist($season);
            $this->addReference('season_' . $key, $season);
        }
        $manager->flush();
    }
    
    public function getDependencies()
    {
        return [
            ProgramFixtures::class
        ];
    }
}