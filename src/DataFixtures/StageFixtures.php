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
            $informatique = new Category();
            $informatique->setName("Informatique");
            $chimie = new Category();
            $chimie->setName("Chimie");

            $stage = new Internship();
            $stage->setAuthor($utilisateur)
                  ->setCategory($physique)
                  ->setTitle("racket de collégiens pour la levée de fonds du labo")
                  ->setDescription("<p> c'était bien lol</p>")
                  ->setCity("Marseille")
                  ->setCountry("France")
                  ->setCompany("psi_racket")
                  ->setStartedOn(new DateTime())
                  ->setFinishedOn(new DateTime());

            for ($i=1; $i <= 20; $i++) {
                $utilisateur = new User();
                $nom = "";
                $prenom = "";
                $pseudo = "";
                for ($j = 1; $j <= 7; $j++) {
                    $cp = chr(mt . rand(97, 122));
                    $cn = chr(mt . rand(97, 122));
                    if ($j = 1) {
                        $pseudo = $cp;
                    }
                    $nom = $nom . $cp;
                    $prenom = $prenom . $cn;
                    $pseudo = $pseudo . $cn;
                }
                $mail = $prenom . "." . $nom . "@ec-m.fr";
                $prenom = ucfirst($prenom);
                $nom = ucfirst($nom);
                $utilisateur->setUsername($pseudo)
                    ->setEmail($mail)
                    ->setPassword("012345")
                    ->setFirstName($prenom)
                    ->setLastName($nom)
                    ->setPromo(2023);





            $manager->persist($utilisateur);
            $manager->persist($stage);
            $manager->persist($physique);
            $manager->persist($informatique);
            $manager->perist($chimie);

        $manager->flush();
    }
}
