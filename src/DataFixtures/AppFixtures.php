<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $a1 = new Aliment();
        $a1->setNom("carotte")
        ->setCalorie(36)
        ->setPrix(1.80)
        ->setImage("legumes/carotte.png")
        ->setProteine(0.77)
        ->setGlucide(6.88)
        ->setLipide(5.45);
        $manager->persist($a1);

        $a2 = new Aliment();
        $a2->setNom("patate")
        ->setCalorie(80)
        ->setPrix(1.50)
        ->setImage("legumes/patate.png")
        ->setProteine(1.80)
        ->setGlucide(16.7)
        ->setLipide(0.45);
        $manager->persist($a2);

        $a3 = new Aliment();
        $a3->setNom("tommate")
        ->setCalorie(6)
        ->setPrix(1.00)
        ->setImage("legumes/tomate.png")
        ->setProteine(0.77)
        ->setGlucide(6.88)
        ->setLipide(0.45);
        $manager->persist($a3);

        $a4 = new Aliment();
        $a4->setNom("pomme")
        ->setCalorie(36)
        ->setPrix(7.77)
        ->setImage("legumes/pomme.png")
        ->setProteine(0.77)
        ->setGlucide(6.88)
        ->setLipide(4.45);
        $manager->persist($a4);

     
        $manager->flush();
    }
}
