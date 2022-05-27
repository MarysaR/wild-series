<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAMS = [

        // C-Drama
        ['title' => 'The Autumn Ballad', 'poster' => 'autumn.jpg', 'category' => 'category_C-Drama', 'country' => 'China',],
        ['title' => 'Immortality', 'poster' => 'immortality.jpg', 'category' => 'category_C-Drama', 'country' => 'China',],
        ['title' => 'World of Honor', 'poster' => 'worldofhonor.jpg', 'category' => 'category_C-Drama', 'country' => 'China',],

        // J-Drama
        ['title' => 'Isekai Izakaya Nobu', 'poster' => 'izakaya.jpg', 'category' => 'category_J-Drama', 'country' => 'Japan',],
        ['title' => 'Youkai Sharehouse ~ Kaette Kitan', 'poster' => 'youkai.jpg', 'category' => 'category_J-Drama', 'country' => 'Japan',],
        ['title' => 'Invisible', 'poster' => 'invisible.jpg', 'category' => 'category_J-Drama', 'country' => 'Japan',],

        // K-Drama
        ['title' => 'All of Us Are Dead', 'poster' => 'dead.jpg', 'category' => 'category_K-Drama', 'country' => 'Korea',],
        ['title' => 'Grid', 'poster' => 'grid.jpg', 'category' => 'category_K-Drama', 'country' => 'Korea',],
        ['title' => 'Monstrous', 'poster' => 'monstrous.jpg', 'category' => 'category_K-Drama', 'country' => 'Korea',],

        // T-Drama
        ['title' => 'Wanabe', 'poster' => 'wanabe.jpg', 'category' => 'category_T-Drama', 'country' => 'Thaïlande',],
        ['title' => 'The giver', 'poster' => 'giver.jpg', 'category' => 'category_T-Drama', 'country' => 'Thaïlande',],
        ['title' => 'YinYang', 'poster' => 'yinyang.jpg', 'category' => 'category_T-Drama', 'country' => 'Thaïlande',],

        // Josei
        ['title' => '7 Seeds', 'poster' => 'seeds.jpg', 'category' => 'category_Josei', 'country' => 'Japan',],
        ['title' => 'Claymore', 'poster' => 'claymore.jpg', 'category' => 'category_Josei', 'country' => 'Japan',],
        ['title' => 'Night Head 2041', 'poster' => 'nighthead.jpg', 'category' => 'category_Josei', 'country' => 'Japan',],

        // Isekaï
        ['title' => 'Re:Zero', 'poster' => 'rezero.jpg', 'category' => 'category_Isekaï', 'country' => 'Japan',],
        ['title' => 'The Rising of the Shield Hero', 'poster' => 'shieldhero.jpg', 'category' => 'category_Isekaï', 'country' => 'Japan',],
        ['title' => 'Youjo Senki : Saga of the Tanya the Evil', 'poster' => 'tanyaevil.jpg', 'category' => 'category_Isekaï', 'country' => 'Japan',],

        // Seinen
        ['title' => 'Berserk', 'poster' => 'berserk.jpg', 'category' => 'category_Seinen', 'country' => 'Japan',],
        ['title' => 'Monster', 'poster' => 'monster.jpg', 'category' => 'category_Seinen', 'country' => 'Japan',],
        ['title' => 'Gunnm', 'poster' => 'gunnm.jpg', 'category' => 'category_Seinen', 'country' => 'Japan',],

        // Shônen
        ['title' => 'Black Clover', 'poster' => 'blackclover.jpg', 'category' => 'category_Shônen', 'country' => 'Japan',],
        ['title' => 'Death Note', 'poster' => 'deathnote.jpg', 'category' => 'category_Shônen', 'country' => 'Japan',],
        ['title' => 'The Promised Neverland', 'poster' => 'promisednerver.jpg', 'category' => 'category_Shônen', 'country' => 'Japan',],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMS as $key => $programName) {
            $program = new Program();
            $program->setTitle($programName['title']);
            $program->setSynopsis(" ");
            $program->setPoster($programName['poster']);
            $program->setCountry($programName['country']);
            $program->setCategory($this->getReference($programName['category']));
            $manager->persist($program);
            $this->addReference('program_' . $key, $program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
          ];
    }
}
