<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
        
    }
    public function load(ObjectManager $manager): void
    {
        $parent = new Categories();
        $parent->setName('Homme');
        $parent->setSlug($this->slugger->slug($parent->getName()));
        $manager->persist($parent);

        $category = new Categories();
        $category->setName('Nike');
        $category->setSlug($this->slugger->slug($category->getName()));
        $category->setParent($parent);
        $manager->persist($category);

        $manager->flush();
    }
}