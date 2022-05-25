<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    
    public function load(ObjectManager $manager)
    {
        $program = new Program();
        $program->setTitle('Death Note');
        $program->setSynopsis('Light Yagami est un lycéen surdoué. Sa vie change le jour où il ramasse un mystérieux cahier intitulé « Death Note ».');
        $program->setCategory($this->getReference('category_Shônen'));
        $manager->persist($program);
        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
          ];
    }
}
