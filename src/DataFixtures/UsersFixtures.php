<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class UsersFixtures extends Fixture
{

    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
        
    ){}
    public function load(ObjectManager $manager): void
    {
        //Ici on créé notre admin
        $admin = new Users();
        $admin->setEmail('admin@chauss.fr');
        $admin->setLastname('Lagant');
        $admin->setFirstname('Lucas');
        $admin->setAddress('12 rue des test');
        $admin->setZipcode('80700');
        $admin->setCity('Amiens');
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, 'admin'));
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        //On utilise Faker pour créé de faux users afin de remplir un peu la bdd

        //Ici fr_FR permet d'avoir des fausses donnés en Français
        $faker = Faker\Factory::create('fr_FR');

        //On va créé 5 users avec faker
        for ($usr = 1; $usr <= 5  ; $usr++) { 
            $user = new Users();
            $user->setEmail($faker->email);
            $user->setLastname($faker->lastName);
            $user->setFirstname($faker->firstName);
            $user->setAddress($faker->streetAddress);
            //Avec str_replace ont indiques qu'on remplace les espaces par rien car dans la création du dernier user le code postal est écrit avec un espace
            $user->setZipcode(str_replace(' ','', $faker->postcode));
            $user->setCity($faker->city);
            $user->setPassword($this->passwordEncoder->hashPassword($user, 'secret'));
    
            $manager->persist($user);
        }

        $manager->flush();
    }
}
