<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Category;
use App\Entity\Note;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create($fakerLocale = 'fr_FR');
        
        $objectUser = [];
        // Les user
        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->setUsername($faker->userName())
                ->setPassword($faker->password())
                ->setRoles([]);
            // On ajout l'objet user dans le tableau
            array_push($objectUser, $user);
            // On persiste l'objet user
            $manager->persist($user);
        }

        $categories = [
            'Travail',
            'Bricolage',
            'Achats',
            'Administratif',
            'Formation',
        ];

        $objectCategory = [];

        for ($i = 0; $i < count($categories); $i++) {
            $category = new Category;
            $category->setName($categories[$i])
            ->setUser($objectUser[rand(0,99)]);

            array_push($objectCategory, $category);
          
            $manager->persist($category);
        }
       

        $objectNote = [];
        // Les Notes
        for ($i = 0; $i < 100; $i++) {
            $note = new Note();
            $note->setTitle($faker->sentence(2))
                ->setContent($faker->sentence(5))
                ->setCategory($objectCategory[rand(0,4)])
                ->setUser($objectUser[rand(0,99)]);
            
            array_push($objectNote, $note);
            
            $manager->persist($note);
        }
        $manager->flush();
    }
}
