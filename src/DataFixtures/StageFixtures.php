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
    {
        $utilisateur = new User();
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
            ->setCity("Marseille BBB")
            ->setCountry("France")
            ->setCompany("psi_racket")
            ->setStartedOn(new \DateTime())
            ->setFinishedOn(new \DateTime());

        $manager->persist($utilisateur);
        $manager->persist($stage);
        $manager->persist($physique);
        $manager->persist($informatique);
        $manager->persist($chimie);

        for ($i = 1; $i <= 3; $i++) {
            $utilisateur2 = new User();
            $nom = "";
            $prenom = "";
            $pseudo = "";
            for ($j = 1; $j <= 7; $j++) {
                $cp = chr(rand(97, 122));
                $cn = chr(rand(97, 122));
                if ($j == 1) {
                    $pseudo = $cp;
                }
                $nom = $nom.$cp;
                $prenom = $prenom.$cn;
                $pseudo = $pseudo.$cn;
            }
            $mail = $prenom.".".$nom."@ec-m.fr";
            $prenom = ucfirst($prenom);
            $nom = ucfirst($nom);
            $utilisateur2->setUsername($pseudo)
                ->setEmail($mail)
                ->setPassword("012345")
                ->setFirstName($prenom)
                ->setLastName($nom)
                ->setPromo(2023);

            $stage2 = new Internship();
            $stage2->setAuthor($utilisateur2);

            $matn = rand(0,2);
            if ($matn == 0) {
                $stage2->setCategory($physique);
            } elseif ($matn == 1) {
                $stage2->setCategory($informatique);
            } else {
                $stage2->setCategory($chimie);
            }

            $stage2->setTitle("Stage n°".$i)
                ->setDescription("<p> c'était bien lol</p>")
                ->setCity("Marseille BBB")
                ->setCountry("France");
            $comp = "";
            for ($j = 1; $j <= 7; $j++) {
                $ccomp = chr(rand(97, 122));
                $comp = $comp.$ccomp;
            }

            $stage2->setCompany($comp)
                ->setStartedOn(new \DateTime())
                ->setFinishedOn(new \DateTime());

            $manager->persist($utilisateur2);
            $manager->persist($stage2);
        }


        $manager->flush();

    }


}