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
        $parent = $this->createCategory('Homme', null, $manager);

        $this->createCategory('Nike', $parent, $manager);
        $this->createCategory('Adidas', $parent, $manager);
        $this->createCategory('Puma', $parent, $manager);
        $this->createCategory('New Balance', $parent, $manager);
        
        $parent = $this->createCategory('Femme', null, $manager);

        $this->createCategory('Nike', $parent, $manager);
        $this->createCategory('Adidas', $parent, $manager);
        $this->createCategory('Puma', $parent, $manager);
        $this->createCategory('New Balance', $parent, $manager);

        $manager->flush();
    }
    
    public function createCategory(string $name, Categories $parent = null, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        return $category;
    }
}