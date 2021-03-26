<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Internship;


class StageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {       $utilisateur = new User();
            $utilisateur->setUsername("martin_guillon")
                        ->setEmail("martin.guillon@ec-m.fr")
                        ->setPassword("012345")
                        ->setFirstName("Martin")
                        ->setLastName("Guillon")
                        ->setPromo(2023);

            $stage = new Internship();
            $stage->setAuthor("martin_guillon")
                  ->setCategory("Physique")
                  ->setTitle("racket de collégiens pour la levée de fonds du labo")
                  ->setDescription("<p> c'était bien lol</p>")
                  ->setCity("Marseille")
                  ->setCountry("France")
                  ->setCompany("psi_racket")
                  ->setStartedOn(new \Date())
                  ->setFinishedOn(new \Date());

            $manager->persist($stage);

        $manager->flush();
    }
}
