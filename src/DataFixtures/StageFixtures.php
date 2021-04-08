<?php

namespace App\DataFixtures;

use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;
use App\Entity\User;
use App\Entity\Internship;
use App\Entity\Category;

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

            $physique = new Category();
            $physique->setName("Physique");

            $stage = new Internship();
            $stage->setAuthor($utilisateur)
                  ->setCategory($physique)
                  ->setTitle("racket de collégiens pour la levée de fonds du labo")
                  ->setDescription("<p> c'était bien lol</p>")
                  ->setCity("Marseille")
                  ->setCountry("France")
                  ->setCompany("psi_racket")
                  ->setStartedOn(new DateTime()) #erreur 'must implement interface DateTimeInterface'
                  ->setFinishedOn(new DateTime());
            $manager->persist($utilisateur);
            $manager->persist($stage);
            $manager->persist($physique);

        $manager->flush();
    }
}
