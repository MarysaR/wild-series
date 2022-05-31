<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public const EPISODE = [

    ];
    
    public function load(ObjectManager $manager) 
    {
        foreach (self::EPISODE as $key => $listEpisode) {
            $episode = new Episode();
            $episode->setTitle($listEpisode['title']);
            $episode->setNumber($listEpisode['number']);
            $episode->setSynopsis($listEpisode['synopsis']);
            $episode->setSeason($this->getReference('season_show'));
            $manager->persist($episode);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}